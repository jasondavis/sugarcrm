<?php
//custom/Extension/modules/<module>/Ext/Layoutdefs/<somefile>.php 
$layout_defs['Tasks']['subpanel_setup']['calls'] = array(
	'order' => 10,
	'module' => 'Calls',
	'title_key' => 'LBL_CALLS',
	'subpanel_name' => 'default',
	'get_subpanel_data' => 'calls',
	'top_buttons' => array(
		array(
			'widget_class' => 'SubPanelTopCreateButton',
			'view' => 'QuickCreateDivision',
		),
	),
);


$layout_defs['<<module name of parent module>>']['subpanel_setup']['<<subpanel name>>'] = array(
// numeric order position of subpanel by default ( lowest number comes first )
'order' => 10,
'sort_by' => '<<default sort field>>',
'sort_order' => '<<default sort order>>',
'title_key' => '<<LBL_SUBPANEL_TITLE>>',
'subpanel_name' => 'default',
'module' => '<<module name of subpanel module>>',
// Specify the custom function to call
'get_subpanel_data' => 'function:getSubpanelQueryParts',
// Set to true to indicate we are building a custom SQL query
'generate_select' => true,
'function_parameters' => array(
// File where the above function is defined at
'import_function_file' => 'custom/application/Ext/Utils/custom_utils.ext.php',
),
); 

//описание самой субпанели

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$subpanel_layout = array(
	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateButton'),
		array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'Accounts'),
	),

	'where' => '',

	'list_fields' => array(
		'name' => array(
			'vname' => 'LBL_LIST_ACCOUNT_NAME',
			'widget_class' => 'SubPanelDetailViewLink',
			'width' => '45%',
			'default' => true,
		),

		//parent_name
		'parent_name' => array(
			'vname' => 'LBL_LIST_RELATED_TO',
			'width' => '22%',
			'target_record_key' => 'parent_id',
			'target_module_key' => 'parent_type',
			'widget_class' => 'SubPanelDetailViewLink',
			'sortable' => false,
		),
		'parent_id' => array(
			'usage' => 'query_only',
		),
		'parent_type' => array(
			'usage' => 'query_only',
		),

		//contact_name
		'contact_name' => array(
			'widget_class' => 'SubPanelDetailViewLink',
			'target_record_key' => 'contact_id',
			'target_module' => 'Contacts',
			'module' => 'Contacts',
			'vname' => 'LBL_LIST_CONTACT',
			'width' => '11%',
			'sortable' => false,
		),
		'contact_id' => array(
			'usage' => 'query_only',
		),

		'date_entered'=>array(
			'vname' => 'LBL_DATE_ENTERED',
			'width' => '12%',
		),
		'created_by_name'=>array(
			'vname' => 'LBL_CREATED',
			'width' => '12%',
		),
		'date_modified' => array(
			'vname' => 'LBL_DATE_MODIFIED',
			'width' => '25%',
		),
		'modified_by_name' => array(
			'vname' => 'LBL_MODIFIED',
			'width' => '25%',
		),

		'edit_button' => array(
			'vname' => 'LBL_EDIT_BUTTON',
			'widget_class' => 'SubPanelEditButton',
			'width' => '4%',
			'default' => true,
		),
		'remove_button' => array(
			'vname' => 'LBL_REMOVE',
			//обновление страницы сразу после удаления записи
			'refresh_page' => 1,
			'widget_class' => 'SubPanelRemoveButtonAccount',
			'width' => '4%',
			'default' => true,
		),
	)
);
