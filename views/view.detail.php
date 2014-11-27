<?php

require_once('include/MVC/View/views/view.detail.php');
class AccountsViewDetail extends ViewDetail
{

    //получить dropdown на detailviewdefs
// modules/PX_Orders/views/view.detail.php
    function display()
    {
        global $app_list_strings;
        $px_currency_dom = $app_list_strings['px_currency_dom'];
        $this->ss->assign("px_currency_dom", $px_currency_dom);


        // Заполняем релейт-поле данными родительской записи при создании из субпанели
        if (!empty($_REQUEST['account_id']) && !empty($_REQUEST['account_name'])) {
            $_REQUEST['px_account_id'] = $_REQUEST['account_id'];
            $_REQUEST['px_account_name'] = $_REQUEST['account_name'];
        }

        parent::display();
    }

    public function preDisplay()
    {

        //заполняем additionalFields если не работает, а обычно оно и не работает)
        $assigned_user = BeanFactory::getBean("Users", $this->bean->assigned_user_id);
        $this->bean->user_title = $assigned_user->title;


        $metadataFile = $this->getMetaDataFile();
        $this->dv = new DetailView2();
        $this->dv->ss =& $this->ss;
        $this->dv->setup($this->module, $this->bean, $metadataFile, get_custom_file_if_exists('include/DetailView/DetailView.tpl'));
    }
}


// modules/PX_Orders/metadata/detailviewdefs.php
array(
    array(
        'name' => 'px_currency_dom',
        'customCode' => '{html_options name=px_currency_dom options=$px_currency_dom}'
    ),
);


$this->ss->assign('CELL_WIDTH', "auto");
$output = $this->ss->fetch("modules/PX_Orders/tpl/table.tpl");
echo $output;


//вывести  на quickqreate родительское поле если название родительского поля соотвествует шаблону
//parent_name parent_id то оно подставляется автоматически



