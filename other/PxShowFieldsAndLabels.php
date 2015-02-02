<style>
	tr:nth-child(odd)  {
		background: #EFEFEF;
	}
	tr:nth-child(odd):hover{
		background: #a6d0ef;
	}
	tr:nth-child(even):hover{
		background: #a6d0ef;
	}
</style>

<?php

//PxShowFieldsAndLabels.php?module=Accounts&view=NULL
/**
 * GET-параметры:
 * module Название модуля
 * view Представление (NULL, list, detail, search)
 */
//echo "<script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>";

if(!defined('sugarEntry'))define('sugarEntry', true);
require('include/entryPoint.php');
$moduleName = $_GET['module'];
$viewName = $_GET['view'];

// Указываем язык для вывода переводов
$sugar_config['default_language'] = 'ru_ru';

header('Content-Type: text/html; charset=utf-8');
?>
<link rel="icon" type="image/png" href="http://png-3.findicons.com/files/icons/1579/devine/256/list.png" />
<?php


if ($viewName === 'detail' || $viewName === 'edit') {
	printFieldsForDetail6($moduleName);
}
elseif ($viewName === 'list') {
	printFieldsForList($moduleName);
}
elseif ($viewName === 'search') {
	printFieldsForSearch($moduleName);
}
elseif ($viewName === 'audit') {
	printFieldsAudit($moduleName);
}
elseif ($viewName === 'import') {
	printFieldsImport($moduleName);
}
elseif ($viewName === 'lang') {
	printFieldsForLang($moduleName);
}
else {
	printFields($moduleName);
}

// Выводит все поля и соответствующие переводы
function printFieldsAudit ($moduleName) {
	$bean = BeanFactory::getBean($moduleName);
//	$st_field = array("date_entered", "date_modified", "modified_user_id", "modified_by_name",
//		"created_by","created_by_name","deleted","created_by_link","modified_user_link","team_count",
//		"team_link","team_count_link","teams","team_sets","team_name");

	$st_field = array("date_entered", "date_modified", "modified_user_id", "modified_by_name",
		"created_by", "created_by_name", "deleted", "created_by_link", "modified_user_link", "team_count",
		"team_link", "team_count_link",
//		"teams",
//		"team_sets",
//		"team_name"
	);




	echo '<table>';
	foreach ($bean->field_name_map as $field) {
		if(in_array($field['name'],$st_field))continue;

		$label = !empty($field['vname'])?translate($field['vname'], $moduleName):$label='';
		$vname = !empty($field['vname'])?$field['vname']:$label='';
		$audited = !empty($field['audited'])?$field['audited']:$audited='';

		echo "<tr>";
		echo     "<td>{$field['name']}</td>";
		echo     "<td style='overflow: hidden; text-overflow: ellipsis; max-width: 300px'>$label</td>";
		echo     "<td style='overflow: hidden; text-overflow: ellipsis; max-width: 300px'>$vname</td>";
		echo     "<td>$audited</td>";
		echo "</tr>";
	}
	echo '</table>';
}


//выводит все поля для которых разрешен импорт
function printFieldsImport ($moduleName) {
	$bean = BeanFactory::getBean($moduleName);
	echo '<table>';
	foreach ($bean->field_name_map as $field) {
		if($field['type']=='link')continue;
		$label = translate($field['vname'], $moduleName);
		echo "<tr>";
		echo     "<td>{$field['name']}</td>";
		echo     "<td style='overflow: hidden; text-overflow: ellipsis; max-width: 300px'>$label</td>";
		echo     "<td>{$field['importable']}</td>";
		echo     '<td>$dictionary[\'Account\'][\'fields\'][\''.$field['name'].'\'][\'importable\']=\''.$field['importable'].'\';</td>';
		echo "</tr>";
	}
	echo '</table>';
}


function printFields ($moduleName) {
	$bean = BeanFactory::getBean($moduleName);
	if (empty($bean))return false;
	echo '<table>';
	foreach ($bean->field_name_map as $field) {
		$label = translate($field['vname'], $moduleName);
		echo "<tr>";
		echo     "<td>{$field['name']}</td>";
		echo     "<td style='overflow: hidden; text-overflow: ellipsis; max-width: 300px'>$label</td>";
		echo     "<td style='overflow: hidden; text-overflow: ellipsis; max-width: 300px'>{$field["vname"]}</td>";
		echo     "<td>{$field['audited']}</td>";
		echo "</tr>";
	}
	echo '</table>';
}

// Выводит все поля в формате ListViewDefs
function printFieldsForList ($moduleName) {
	$bean = BeanFactory::getBean($moduleName);

	$fieldsHtml = array();
	foreach ($bean->field_name_map as $field) {
		if (in_array($field['type'], array('link', 'id'))) {
			continue;
		}
		$label = translate($field['vname'], $moduleName);
		$fieldUpper = strtoupper($field['name']);
		$fieldsHtml[] =
			<<<EOC
			    // $label
    '$fieldUpper' => array (
        'width' => '10%',
        'label' => '{$field['vname']}',
        'default' => true,
    ),
EOC;
	}
	$fieldsHtml = implode("\n", $fieldsHtml);

	echo '<pre>';
	echo htmlspecialchars("
<?php

\$listViewDefs ['$moduleName'] = array(
$fieldsHtml
);");
	echo '</pre>';
}

// Выводит все поля в формате DetailViewDefs и EditViewDefs для SugarCRM 6
function printFieldsForDetail6 ($moduleName) {
	$bean = BeanFactory::getBean($moduleName);

	$fieldsHtml = array();
	foreach ($bean->field_name_map as $field) {
		if (in_array($field['type'], array('link', 'id'))) {
			continue;
		}
		$label = translate($field['vname'], $moduleName);
		$fieldsHtml[] =
			<<<EOC
			    // $label
    array (
        '{$field['name']}',
    ),
EOC;
	}
	$fieldsHtml[] = <<<EOC
    array(
        array(
            'name'       => 'date_entered',
            'customCode' => '{\$fields.date_entered.value} {\$APP.LBL_BY} {\$fields.created_by_name.value}',
            'label'      => 'LBL_DATE_ENTERED',
        ),
        array(
            'name'       => 'date_modified',
            'customCode' => '{\$fields.date_modified.value} {\$APP.LBL_BY} {\$fields.modified_by_name.value}',
            'label'      => 'LBL_DATE_MODIFIED',
        ),
    ),
EOC;

	$fieldsHtml = implode("\n", $fieldsHtml);
	echo '<pre style="margin-left: 20px;">';
	echo htmlspecialchars($fieldsHtml);
	echo '</pre>';
}

// Выводит все поля в формате searchdefs
function printFieldsForSearch ($moduleName) {
	$bean = BeanFactory::getBean($moduleName);

	$fieldsHtml = array();
	foreach ($bean->field_name_map as $field) {
		if (in_array($field['type'], array('link', 'id'))) {
			continue;
		}
		$label = translate($field['vname'], $moduleName);
		$fieldsHtml[] =
			<<<EOC
			    // $label
    '{$field['name']}',
EOC;
	}

	$fieldsHtml = implode("\n", $fieldsHtml);
	echo '<pre style="margin-left: 20px;">';
	echo htmlspecialchars($fieldsHtml);
	echo '</pre>';
}

// Выводит все поля в формате language, заполняя значения из атрибута comments, описанного в vardefs.php
function printFieldsForLang ($moduleName) {
	global $config;
	$bean = BeanFactory::getBean($moduleName);

	$fieldsHtml = array();
	foreach ($bean->field_name_map as $field) {
		if (in_array($field['name'], $config['hiddenFields'])) {
			continue;
		}
		if (in_array($field['type'], array('link', 'id'))) {
			continue;
		}
		$fieldsHtml[] =
			<<<EOC
			  '{$field['vname']}' => '{$field['comments']}',
EOC;
	}

	$fieldsHtml = implode("\n", $fieldsHtml);
	echo '<pre style="margin-left: 20px;">';
	echo htmlspecialchars($fieldsHtml);
	echo '</pre>';
}

die;


















