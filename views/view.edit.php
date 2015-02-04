<?php

if( ! defined( 'sugarEntry' ) || ! sugarEntry ) {die( 'Not A Valid Entry Point' );}
 
require_once( 'modules/PX_Brands/views/view.edit.php' );
 
class PX_BrandsViewEdit extends ViewEdit
{
 
//	public $useForSubpanel = true;  // Чтобы класс использовался также для субпанели
 
	function display() {
		// В process заполняется $this->ev->fieldDefs из бина и реквеста
		$this->ev->process();
 
		//<px_change author="Anton Prin" date="2014-07-08" desc="NewPost: #3305: Устранить ошибку при переходе с Быстрой формы на полную">
		$relName = $_REQUEST['relate_to'] ?: null;
 
		//Try to find the link in this bean based on the relationship
		$linkName = null;
		foreach ($this->bean->field_defs as $key => $def) {
			if (isset($def['type']) && $def['type'] == 'link' && isset($def['relationship']) && $def['relationship'] === $relName) {
				$linkName = $key;
			}
		}
 
		$relatedModule = null;
		if ($linkName) {
			$this->bean->load_relationship($linkName);
			$relatedModule = $this->bean->$linkName->getRelatedModuleName();
		}
		if ($relatedModule === 'Accounts') {
			$this->ev->fieldDefs['px_account_id']['value'] = $_REQUEST['relate_id'];
			$this->ev->fieldDefs['px_account_name']['value'] = BeanFactory::getBean('Accounts', $_REQUEST['relate_id'])->name;
		}
		//</px_change>
 
		echo $this->ev->display($this->showTitle);
	}
	
	
	//Для того что бы валидация работала правильно, нужно передать в метод display второй параметр true, таким образом обойдя баг sugar. Переопределение метода display. Если этого не сделать, то поле пометится звездочкой, но валидация работать не будет. 
   function display(){
   $this->ev->process();
   echo $this->ev->display($this->showTitle,true);
}
	
}






