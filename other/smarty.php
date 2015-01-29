array(
	array(
		'name' => 'px_currency_dom',
		'customCode' => '{html_options name=px_currency_dom options=$px_currency_dom}'
	),
);

$this->ss->assign('CELL_WIDTH', "auto");
$output = $this->ss->fetch("modules/PX_Orders/tpl/table.tpl");
echo $output;
