<?php

$module_name = 'PX_AddressDirectory';
$viewdefs[$module_name]['DetailView'] = array(
	'templateMeta' => array(
		'form' => array(
			'buttons' => array(
				'EDIT',
				'DUPLICATE',
//				'DELETE',
				//переопределить кнопки
				array(
					'customCode' => '<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="px_check_delete();" type="button" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" >'
				),
				'FIND_DUPLICATES',
			)
		),
		'maxColumns' => '2',
		'widths' => array(
			array(
				'label' => '10',
				'field' => '30'
			),
			array(
				'label' => '10',
				'field' => '30'
			)
		),
		//подключить js  на DetailView
		'includes' => array(
			array('file' => 'modules/PX_Orders/js/DetailView.js'),
		),
	),

	'panels' => array(

		array('post_code', 'px_countries_name'),
		array('px_provinces_name', 'px_districts_name'),
		array('px_settlements_name', 'px_settlementdistricts_name'),
		array('px_microdistricts_name', ''),
		array('street_type', 'px_streets_name'),
		array('px_buildingnumbers_name', 'px_housingnumbers_name'),
		array('px_apartmentnumbers_name', ''),
		array('description',),
		array('assigned_user_name', 'team_name'),
		array(
			//вывести значение дропдауна
			'customCode' => '{$fields.px_birth_day.options[$fields.px_birth_day.value]} {$fields.px_birth_month.options[$fields.px_birth_month.value]}',

		),
		array(
			array(
				'name' => 'date_entered',
				'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
				'label' => 'LBL_DATE_ENTERED',
			),
			array(
				'name' => 'date_modified',
				'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
				'label' => 'LBL_DATE_MODIFIED',
			),
		),
	)
);






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



