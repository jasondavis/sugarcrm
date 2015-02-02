<?php

$module_name = 'PX_BuildingNumbers';
$searchdefs[$module_name] = array(
	'templateMeta' => array(
		'maxColumns' => '3',
		'maxColumnsBasic' => '4',
		'widths' => array('label' => '10', 'field' => '30'),
	),
	'layout' => array(
		'basic_search' => array(
			'name',
			array('name' => 'current_user_only', 'label' => 'LBL_CURRENT_USER_FILTER', 'type' => 'bool'),
			array('name' => 'favorites_only', 'label' => 'LBL_FAVORITES_FILTER', 'type' => 'bool',),
		),
		'advanced_search' => array(
			'name',

			// поиск по id для релейт полей
			'account_name' => array(
				'name' => 'account_name',
				'displayParams' => array(
					'useIdSearch' => true,
				),
			),

			array(
				'name' => 'favorites_only',
				'label' => 'LBL_FAVORITES_FILTER',
				'type' => 'bool',
			),

			'description',
			//team
			'team_name' => array(
				'name' => 'team_name',
				'label' => 'LBL_TEAMS',
				'default' => true,
				'width' => '10%',
			),
			//date_entered
			'date_entered' => array(
				'name' => 'date_entered',
				'type' => 'datetime',
				'displayParams' => array('showFormats' => $showFormats),
				'label' => 'LBL_DATE_ENTERED',
				'width' => '10%',
				'default' => true,
			),
			//date_modified
			'date_modified' => array(
				'name' => 'date_modified',
				'type' => 'datetime',
				'displayParams' => array('showFormats' => $showFormats),
				'label' => 'LBL_DATE_MODIFIED',
				'width' => '10%',
				'default' => true,
			),
			//assigned_user_id
			'assigned_user_id' => array(
				'name' => 'assigned_user_id',
				'label' => 'LBL_ASSIGNED_TO',
				'type' => 'enum',
				'function' => array(
					'name' => 'get_user_array',
					'params' => array(false))
			),





			// в поиск можно добавить поле которого нет в vardefs при этом указат параметры
			'px_accountcontacts_accounts_name' => array(
				'name' => 'px_accountcontacts_accounts_name',
				'label' => 'LBL_PX_ACCOUNTCONTACTS_ACCOUNTS_NAME',
				'type' => 'relate',
				'id_name'          => 'account_id',
				'link'             => 'accounts',
				'table'            => 'accounts',
				'module'           => 'Accounts',
				'rname'            => 'name',
			),




		),
	),
);
