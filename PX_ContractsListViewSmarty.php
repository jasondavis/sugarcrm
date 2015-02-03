<?php
require_once('include/ListView/ListViewSmarty.php');
require_once('custom/include/CustomMassUpdate.php');
class PX_ContractsListViewSmarty extends ListViewSmarty
{

	function __construct()
	{
		parent::ListViewSmarty();
	}

//<px_change author="Demydenko" date="2014-07-29" desc="NewPost:#3786">
	protected function getMassUpdate()
	{
		return new CustomMassUpdate();
	}
//</px_change>

}
