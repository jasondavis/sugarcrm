<?php

require_once('include/MVC/View/views/view.detail.php');
class AccountsViewDetail extends ViewDetail
{

    function display()
    {
        //get a dropdown list value on detailview form
        global $app_list_strings;
        $px_currency_dom = $app_list_strings['px_currency_dom'];
        $this->ss->assign("px_currency_dom", $px_currency_dom);


        //fill relate field data from parent record, when create new record by subpanel 
        if (!empty($_REQUEST['account_id']) && !empty($_REQUEST['account_name'])) {
            $_REQUEST['px_account_id'] = $_REQUEST['account_id'];
            $_REQUEST['px_account_name'] = $_REQUEST['account_name'];
        }

        parent::display();

        //use smarty
        $this->ss->assign('CELL_WIDTH', "auto");
        $output = $this->ss->fetch("modules/PX_Orders/tpl/table.tpl");
        echo $output;
    }

    public function preDisplay()
    {

        //fill additionalFields
        $assigned_user = BeanFactory::getBean("Users", $this->bean->assigned_user_id);
        $this->bean->user_title = $assigned_user->title;

        //call parent
        $metadataFile = $this->getMetaDataFile();
        $this->dv = new DetailView2();
        $this->dv->ss =& $this->ss;
        $this->dv->setup($this->module, $this->bean, $metadataFile, get_custom_file_if_exists('include/DetailView/DetailView.tpl'));
    }
}









