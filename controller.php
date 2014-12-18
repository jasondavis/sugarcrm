<?php
if( ! defined( 'sugarEntry' ) || ! sugarEntry ) {
	die( 'Not A Valid Entry Point' );
}

class AccountsController extends SugarController
{
	/** @var PX_CustomAccount */
	public $bean;


	//если обращаемся к модели из браузера, можно использовать свой кастомный класс
	public function loadBean() {
		require_once('custom/modules/Accounts/PX_CustomAccount.php');
		$this->bean = new PX_CustomAccount();
		if(!empty($this->record)){
			$this->bean->retrieve($this->record);
			if($this->bean)
				$GLOBALS['FOCUS'] = $this->bean;
		}
	}


	//если есть связанные объекты с определенными атрибутами
	function action_px_checkAllowInformal(){
		global $mod_strings;
		$px_contractss = BeanFactory::getBean('PX_Contracts')->get_full_list("","account_id='{$this->bean->id}' and px_contract_type in ('Типовой','Нетиповой') and px_status in ('Подписан','Действует')");
		$data = array(
			'result'=>true,
			'msg'=>'',
		);
		if(!empty($px_contractss)){
			$data['result']=false;
			$data['msg']=$mod_strings['NTC_PX_DENY_INFORMAL_CONTRACTS'];
		}
		echo json_encode($data);
	}

	//обновить страницу,
	//например когда при добавлении елемента на субпанель, елементы конкатенирутся в поле на форме просмотра
	//или например обновить другие субпанели, showSubPanel("px_contractsstatushistory",null,true)
	public function action_SubPanelViewer()
	{
		require_once 'include/SubPanel/SubPanelViewer.php';
		if ( in_array($_REQUEST['subpanel'], array('px_brands', 'px_accountwebsites', ))) {
			echo "<script type='text/javascript'>window.location.reload();</script>";
		}
	}




}
