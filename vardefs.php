<?php
//int
$dictionary['Account']['fields']['year'] = array(
	'required' => true,
	'name' => 'year',
	'vname' => 'LBL_YEAR',
	'type' => 'int',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => 0,
	'len' => '11',
	'disable_num_format' => '1',
);
//decimal
$dictionary['Account']['fields']['year'] = array(
	'required' => false,
	'name' => 'year',
	'vname' => 'LBL_YEAR',
	'dbType' => 'decimal',
	'type' => 'currency',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => 0,
	'len' => '12,2',
	'type' => 'decimal',
	'precision' => 2,
	'disable_num_format' => '1',
);
//varchar
$dictionary['Account']['fields']['px_brands_name'] = array(
	'name' => 'px_brands_name',
	'required' => false,
	'vname' => 'LBL_PX_BRANDS_NAME',
	'type' => 'varchar',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => 0,
	'len' => '255',
);

//enum
$dictionary['Account']['fields']['px_interaction'] = array(
	'name' => 'px_interaction',
	'vname' => 'LBL_PX_INTERACTION',
	'type' => 'enum',
	'len' => '255',
	'options' => 'px_interaction_dom',
	'required' => false,
	'massupdate' => 0,
	'forced_massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => 0,
);

//multienum 'displayParams'=>array('size' => 4)
$dictionary['Account']['fields']['px_markets'] = array(
	'name' => 'px_markets',
	'vname' => 'LBL_PX_MARKETS',
	'type' => 'multienum',
	'len' => '255',
	'options' => 'px_account_markets_dom',
	'required' => false,
	'massupdate' => 1,
	'isMultiSelect'=>true,
//	'forced_massupdate' => 1,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => 0,
);

//radioenum
$dictionary['PX_Orders']['fields']['customer_type'] = array (
	'required' => false,
	'name' => 'client_type',
	'vname' => 'LBL_CLIENT_TYPE',
	'type' => 'radioenum',
	'source' => 'non-db',
//	'dbType'=>'varchar',
	'massupdate' => '0',
//	'default' => 'USD',
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => true,
	'calculated' => false,
	'len' => '255',
	'size' => '20',
	'options' => 'px_customer_type_dom',
	'studio' => 'visible',
	'dependency' => NULL,
	'separator' => '<br>'
 
);

//float
$dictionary['Account']['fields']['px_turnover'] = array(
	'required' => false,
	'name' => 'px_turnover',
	'vname' => 'LBL_PX_FOOTING',
	'type' => 'float',
	'dbType' => 'double',
	'default' => '0',
	'importable' => 1,
	'massupdate' => 0,
	'comments' => '',
	'help' => 'Оборот отправителя',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => 0,
);

//bool
$dictionary['Account']['fields']['px_corporate'] = array(
	'name' => 'px_corporate',
	'vname' => 'LBL_PX_CORPORATE',
	'type' => 'bool',
	'required' => false,
	'massupdate' => 0,
	'default' => '0',
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => 0,
);

//link
$dictionary['Opportunity']['fields']['px_customer_link'] = array(
	'name' => 'px_customer_link',
	'type' => 'link',
	'relationship' => 'px_customer_opportunity',
	'source' => 'non-db',
	'side' => 'right',
);

//id
$dictionary['Opportunity']['fields']['px_customer_id'] = array(
	'required' => false,
	'name' => 'px_customer_id',
	'vname' => 'LBL_PX_CUSTOMER_NAME',
	'type' => 'id',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => 0,
	'audited' => 0,
	'reportable' => 0,
	'len' => 36,
);


//text
$dictionary['PX_Orders']['fields']['description'] = array (
	'required' => false,
	'name' => 'description',
	'vname' => 'LBL_DESCRIPTION',
	'type' => 'text',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => 0,
);


//date
$dictionary['Account']['fields']['px_foundation_date'] = array(
	'required' => false,
	'name' => 'px_foundation',
	'vname' => 'LBL_PX_FOUNDATION',
	'type' => 'date',
	'massupdate' => 0,
	'no_default' => false,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'calculated' => false,
	'size' => '20',
	'enable_range_search' => true,
	'options' => 'date_range_search_dom',
);



//relations fields
$dictionary['Opportunity']['fields']['px_employee_id'] = array(
	'type' => 'id',
	'required' => false,
	'name' => 'px_employee_id',
	'vname' => 'LBL_PX_CUSTOMER_NAME',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => 0,
	'audited' => 0,
	'reportable' => 0,
	'len' => 36,
);

$dictionary['Opportunity']['fields']['px_employee_name'] = array(
	'type' => 'relate',
	'required' => false,
	'name' => 'px_employee_name',
	'source' => 'non-db',
	'vname' => 'LBL_PX_EMPLOYEE_NAME',
	'save' => true,
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => 1,
	'reportable' => 0,
	'len' => '255',
	'quicksearch' => 'enabled',
	'id_name' => 'px_employee_id',
	'link' => 'px_employee_link',
	'table' => 'users',
	'module' => 'Users',
	'join_name' => 'px_employee_opportunity',
	'rname' => 'name',
	'populate_list' => array('name', 'id', 'settlements_type',),
	'field_list' => array('px_settlements_name', 'px_settlements_id', 'settlements_type',),
	'additionalFields' => array(
		'px_receivables_term_limit' => 'account_receivables_term_limit',
		'px_receivables_sum_limit' => 'account_receivables_limit',
		'px_receivables_term' => 'account_receivables_term',
	),
);
//link
$dictionary['Opportunity']['fields']['px_employee'] = array(
	'name' => 'px_employee',
	'type' => 'link',
	'relationship' => 'px_employee_opportunity',
	'source' => 'non-db',
	'side' => 'right',
);

$dictionary['Opportunity']['relationships']['px_employee_opportunity'] = array(
	'lhs_module'        => 'Users',
	'lhs_table'         => 'users',
	'lhs_key'           => 'id',
	'rhs_module'        => 'Opportunities',
	'rhs_table'         => 'opportunities',
	'rhs_key'           => 'px_employee_id',
	'relationship_type' => 'one-to-many',

);

//в другой модуль достаточно поместить толко линк
$dictionary['Users']['fields']['px_opportunity_employee_link'] = array(
	'name' => 'px_opportunity_employee_link',
	'type' => 'link',
	'relationship' => 'px_employee_opportunity',
	'source' => 'non-db',
	'side' => 'left',
);

$dictionary['Users']['fields']['description']['audited'] = 1;





// поле px_account_category зависит от значения поля px_account_type
$dictionary['Account']['fields']['px_account_category']['dependency'] = 'equal($px_account_type,"Client")';


$dictionary['Opportunity']['fields']['px_lead_source_type']['visibility_grid']=array (
	'trigger' => 'lead_source',
	'values' =>
		array (
			'' => array (),
			'Acquisitions' => array (
				0 => '',
				1 => 'Kuadriga',
				2 => 'Mondo',
				3 => 'SCR VC Network',
			),
			'Agents' => array (
				0 => '',
				1 => 'GOX',
				2 => 'Goal Europe',
				3 => 'Sarl Global',
			),
		),
);

$dictionary["MODULE"]["fields"]["FIELD"]["populate_list"] = array(
	"name","id", "opportunity_num",
);

$dictionary["MODULE"]["fields"]["FIELD"]["field_list"] = array(
	"opportunities_name","opportunities_id", "parent_opp_no"
);
