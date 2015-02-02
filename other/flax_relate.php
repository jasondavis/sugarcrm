<?php
//Cats Field Definition
$tmp = array(
	'fields'=>array (
		'parent_name'=> array(
			'required' => false,
			'source' => 'non-db',
			'name' => 'parent_name',
			'vname' => 'LBL_FLEX_RELATE',
			'type' => 'parent',
			'massupdate' => 0,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => false,
			'reportable' => true,
			//'size' => '20',
			'studio' => 'visible',
			'type_name' => 'parent_type',
			'id_name' => 'parent_id',
			'options' => 'my_flex_relate_options_dom',
			'parent_type' => 'my_flex_relate_options_dom',
		),
		'parent_id' => array (
			'required' => false,
			'name' => 'parent_id',
			'type' => 'id',
			'massupdate' => 0,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => 0,
			'audited' => false,
			'reportable' => true,
			//'len' => 36,
			'size' => '20',
		),
		'parent_type'=> array(
			'required' => false,
			'name' => 'parent_type',
			'vname' => 'LBL_PARENT_TYPE',
			'type' => 'parent_type',
			'massupdate' => 0,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => 0,
			'audited' => false,
			'reportable' => true,
			'len' => 255,
			'size' => '20',
			'dbType' => 'varchar',
			'studio' => 'hidden',
		),
		'contacts' => array (
			'name' => 'contacts',
			'type' => 'link',
			'relationship' => 'contacts_cats_flex',
			'source' => 'non-db',
		),
		'accounts' => array (
			'name' => 'accounts',
			'type' => 'link',
			'relationship' => 'accounts_cats_flex',
			'source' => 'non-db',
		),
	),
	
	// Relationship Definition
	'relationships'=>array (
		'contact_px_regular_greetings' => array(
			'lhs_module'        => 'Contacts',
			'lhs_table'         => 'contacts',
			'lhs_key'           => 'id',
			'rhs_module'        => 'Cats',
			'rhs_table'         => 'cats',
			'rhs_key'           => 'parent_id',
			'relationship_type' => 'one-to-many',
			'relationship_role_column' => 'parent_type',
			'relationship_role_column_value' => 'Contacts',
		),
		'account_px_regulargreetings' => array(
			'lhs_module'        => 'Accounts',
			'lhs_table'         => 'accounts',
			'lhs_key'           => 'id',
			'rhs_module'        => 'Cats',
			'rhs_table'         => 'cats',
			'rhs_key'           => 'parent_id',
			'relationship_type' => 'one-to-many',
			'relationship_role_column' => 'parent_type',
			'relationship_role_column_value' => 'Accounts',
		),
	),
);
	
	// Contacts Field Definition
$dictionary['Contact']['fields']['contact_px_regulargreetings'] = array(
	'name' => 'contact_px_regulargreetings',
	'type' => 'link',
	'relationship' => 'contact_px_regular_greetings',
	'source' => 'non-db',
//	'side' => 'left',
);
	
	// Accounts Field Definition
$dictionary['Contact']['fields']['account_px_regulargreetings'] = array(
	'name' => 'account_px_regulargreetings',
	'type' => 'link',
	'relationship' => 'account_px_regular_greetings',
	'source' => 'non-db',
//	'side' => 'left',
);
	

 
// Copy to custom/Extension/application/Ext/Language/
$app_list_strings['cats_flex_relate_options_dom'] = array(
	'' => '',
	'Contacts' => 'Contacts',
	'Accounts' => 'Accounts',
);
