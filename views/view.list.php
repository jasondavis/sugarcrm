<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.list.php');
class AccountsViewList extends ViewList
{
//скрыть кнопку редактировать (редактировать)
//modules/PX_Forms/views/view.list.php
	function preDisplay(){

		//добавить javascript
		echo '<script type="text/javascript" src="custom/modules/Accounts/ListView.js"></script>';

		$this->lv = new ListViewSmarty();
		$this->lv->quickViewLinks = false;//быстрая правка
		$this->lv->showMassupdateFields = false;//массовое обновление
		$this->lv->mergeduplicates = false;//обьеденить дубликаты
		$this->lv->delete = false;
		$this->lv->export = false;
	}
	
	
	function listViewProcess() {
        global $current_user;
        $this->processSearchForm();
        if(!$current_user->is_admin) // remove this condition if you dont want admin user to view the "Closed Lost" Opportunities.
            $this->params['custom_where'] = ' AND opportunities.sales_stage <> "Closed Lost" ';
      
        if (empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false) {
            $this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
            $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
            echo $this->lv->display();
        }
    }
}
