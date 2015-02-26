<?php
//custom/metadata/ProjectName.php
$dictionary["px_books_users"] = array(
	'true_relationship_type' => 'many-to-many',
	'from_studio' => true,
	'relationships' =>
		array(
			'px_books_users' =>
				array(
					'lhs_module' => 'PX_Books',
					'lhs_table' => 'px_books',
					'lhs_key' => 'id',
					'rhs_module' => 'Users',
					'rhs_table' => 'users',
					'rhs_key' => 'id',
					'relationship_type' => 'many-to-many',
					'join_table' => 'px_books_users_c',
					'join_key_lhs' => 'px_books_users_px_books_ida',
					'join_key_rhs' => 'px_books_users_users_idb',
				),
		),
	'table' => 'px_books_users',
	'fields' =>
		array(
			0 => array(
				'name' => 'id',
				'type' => 'varchar',
				'len' => 36,
			),
			1 => array(
				'name' => 'date_modified',
				'type' => 'datetime',
			),
			2 => array(
				'name' => 'deleted',
				'type' => 'bool',
				'len' => '1',
				'default' => '0',
				'required' => true,
			),
			3 => array(
				'name' => 'px_books_users_px_books_ida',
				'type' => 'varchar',
				'len' => 36,
			),
			4 => array(
				'name' => 'px_books_users_users_idb',
				'type' => 'varchar',
				'len' => 36,
			),
		),
	'indices' =>
		array(
			0 => array(
				'name' => 'px_books_users_spk',
				'type' => 'primary',
				'fields' =>
					array(
						0 => 'id',
					),
			),
			1 => array(
				'name' => 'px_books_users_alt',
				'type' => 'alternate_key',
				'fields' =>
					array(
						0 => 'px_books_users_px_books_ida',
						1 => 'px_books_users_users_idb',
					),
			),
		),
);

//custom/Extension/application/Ext/TableDictionary/
include('custom/metadata/px_books_usersMetaData.php');

//custom/Extension/modules/Users/Ext/Vardefs/ProjectName.php
$dictionary["User"]["fields"]["px_books_users"] = array(
	'name' => 'px_books_users',
	'type' => 'link',
	'relationship' => 'px_books_users',
	'source' => 'non-db',
	'module' => 'PX_Books',
	'bean_name' => 'PX_Books',
	'vname' => 'LBL_PX_BOOKS_USERS_FROM_PX_BOOKS_TITLE',
);

//custom/Extension/modules/Users/Ext/Layoutdefs/ProjectName.php
$layout_defs["Users"]["subpanel_setup"]['px_books_users'] = array(
	'order' => 100,
	'module' => 'PX_Books',
	'subpanel_name' => 'default',
	'sort_order' => 'asc',
	'sort_by' => 'id',
	'title_key' => 'LBL_PX_BOOKS_USERS_FROM_PX_BOOKS_TITLE',
	'get_subpanel_data' => 'px_books_users',
	'top_buttons' =>
		array(
			0 =>
				array(
					'widget_class' => 'SubPanelTopButtonQuickCreate',
				),
			1 =>
				array(
					'widget_class' => 'SubPanelTopSelectButton',
					'mode' => 'MultiSelect',
				),
		),
);
