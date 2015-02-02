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
}
