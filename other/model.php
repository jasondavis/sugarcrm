<style>
	.list tr:nth-child(odd)  {
		background: #EFEFEF;
	}
	.list tr:nth-child(odd):hover{
		background: #a6d0ef;
	}
	.list tr:nth-child(even):hover{
		background: #a6d0ef;
	}
</style>
<?php

//вывод дополнительных полей в листвью
function get_list_view_data()
{
	$temp_array = $this->get_list_view_array();
	$temp_array['PX_ACCOUNTCONTACTS_CONTACTSCONTACTS_IDB'] = $this->px_accountcontacts_contactscontacts_idb;
	return $temp_array;
}

//получить данные из файла modules/<module>/language/<language>.lang.php
global $current_language;
$mod_strings = return_module_language($current_language, $this->module);


//подключение к базе
global $db; //$bean->db
$r = $db->query('SELECT currency_code FROM px_exchangerates WHERE deleted=0 GROUP BY currency_code');
$load=array();
while($a = $db->fetchByAssoc($r)) {
	$load[] = $a['currency_code'];
}




$datetime1 = new DateTime('2009-10-11');
$datetime2 = new DateTime('2009-10-13');
$interval = $datetime1->diff($datetime2);
$today = date("Y-m-d");


global $current_user;
$td = new TimeDate($current_user);
$date_my = $td->to_db_date(date($td->get_date_time_format()));
$date_my = $td->to_db_date(date($td->get_date_format())); //только дата

$datetime1 = date($td->get_date_format());
$datetime2 = date_create_from_format($td->get_date_format(),$this->bean->px_status_study_date);

echo $interval->format('%R%a дней'); //%R плюс минус
echo $interval->format('%a дней');

$GLOBALS['timedate']->to_db_date();
$GLOBALS['timedate']->nowDbDate();
$GLOBALS['timedate']->nowDb();//time

//debug_backtrace
$bcktrc = debug_backtrace();
$bcktrc = json_encode($bcktrc);
echo ("<script> dbg_bcktrc = {$bcktrc}; </script>");

$debug_b = json_encode(debug_backtrace());
echo ("<script> debug_b= {$debug_b}; </script>");


//'customLabel' => '{sugar_translate label=\'LBL_MODULE_NAME\' module=$fields.parent_type.value}'

//functions
set_time_limit(0);



function calc_movement_of_funds_table($px_orders){
	global $current_language,$app_list_strings;
	$mod_strings = return_module_language($current_language, $px_orders->module);

	$headers_cell = array(
		"LBL_EXCHANGE"=>$mod_strings['LBL_EXCHANGE'],
		"LBL_GROSS_PRICE"=>$mod_strings['LBL_GROSS_PRICE'],
		"LBL_NETT_PRICE"=>$mod_strings['LBL_NETT_PRICE'],
		"LBL_MARGIN"=>$mod_strings['LBL_MARGIN'],
		"LBL_INCOME"=>$mod_strings['LBL_INCOME'],
		"LBL_EXPENSES"=>$mod_strings['LBL_EXPENSES'],
		"LBL_BALANCE"=>$mod_strings['LBL_BALANCE'],
	);
	$rows_data = array();
	foreach ($app_list_strings['px_currency_dom'] as $key=>$val) {
		$rows_data[$key] = $headers_cell;
		$rows_data[$key]['LBL_EXCHANGE'] =  $app_list_strings['px_currency_dom'][$key];
	}

	$px_orders->bean->load_relationship('orderproducts');
	$orderproducts_ids = $px_orders->bean->orderproducts->get();

	/** @var $orderproducts PX_OrderProducts */
	$orderproducts = BeanFactory::getBean('PX_OrderProducts');
	foreach ($orderproducts_ids as $id) {
		$orderproducts->retrieve($id);
		if(!$orderproducts->product_currency)continue;
		$rows_data[$orderproducts->product_currency]['LBL_MARGIN'] += $orderproducts->margin;
		$rows_data[$orderproducts->product_currency]['LBL_GROSS_PRICE'] += $orderproducts->sum;
		$rows_data[$orderproducts->product_currency]['LBL_NETT_PRICE'] += $orderproducts->sum-$orderproducts->margin;
	}

//		$GLOBALS['log']->error(print_r($rows_data, 1));
	$data_array['table_name'] = $mod_strings['LBL_MOVEMENT_OF_FUNDS'];
	$data_array['headers_cell'] = $headers_cell;
	$data_array['rows_data'] = $rows_data;
	return $data_array;

}


?>

<ul>
	{foreach from=$myArray key=k item=v}
	<li>{$k}: {$v}</li>
	{/foreach}
</ul>




