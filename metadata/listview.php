<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$module_name = 'PX_MicroDistricts';
$listViewDefs[$module_name] = array(
	'EDIT_BUTTON' => array(
		'label' => '',
		'width' => '2%',
		'default' => true,
		'sortable' => false,
		'customCode' => '<a title="Правка" id="edit-{$ID}" href="index.php?module=' . $module_name . '&action=EditView&record={$ID}" class="listViewTdLinkS1"><img src="themes/Sugar/images/edit_inline.png"></a>'
	),
	'MICRODISTRICTS' => array(
		'width' => '32',
		'label' => 'LBL_MICRODISTRICTS',
		'default' => true,
		'link' => true
	),
	'PX_SETTLEMENTDISTRICTS_NAME' => array(
		'width' => '30',
		'label' => 'LBL_PX_SETTLEMENTDISTRICTS_NAME',
		'link' => true,
		'sortable'=> true,
		'id' =>'PX_SETTLEMENTDISTRICTS_ID',
		'module' => 'PX_SettlementDistricts',
		'ACLTag' => 'PX_SETTLEMENTDISTRICTS',
		'related_fields' => array(
			'px_settlementdistricts_id',
		),
		'default' => true,
	),

	'PARENT_NAME'        => array(
		'width'          => '20%',
		'label'          => 'LBL_LIST_RELATED_TO',
		'dynamic_module' => 'PARENT_TYPE',
		'id'             => 'PARENT_ID',
		'link'           => true,
		'default'        => true,
		'sortable'       => false,
		'ACLTag'         => 'PARENT',
		'related_fields' => array(
			0 => 'parent_id',
			1 => 'parent_type',
		),
	),


	'TEAM_NAME' => array(
		'width' => '9',
		'label' => 'LBL_TEAM',
		'default' => true
	),
	'ASSIGNED_USER_NAME' => array(
		'width' => '9',
		'label' => 'LBL_ASSIGNED_TO_NAME',
		'module' => 'Employees',
		'id' => 'ASSIGNED_USER_ID',
		'default' => true
	),
	'DATE_ENTERED' => array(
		'width' => '5%',
		'label' => 'LBL_DATE_ENTERED',
		'default' => true,
	),
	'DATE_MODIFIED' => array(
		'width' => '5%',
		'label' => 'LBL_DATE_MODIFIED',
		'default' => true,
	),
	'DESCRIPTION' => array(
		'width' => '5%',
		'label' => 'LBL_DESCRIPTION',
		'default' => false,
	),

);
