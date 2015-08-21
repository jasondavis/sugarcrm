
<?php
//define ( 'sugarEntry', TRUE );
//chdir("/var/www/hosted/crm.smartline.ua/");
////require_once ('include/entryPoint.php');
//echo date("Y-m-d H:i");
//echo time();
//run system command
//system("rm -rf ".escapeshellarg('/var/www/hosted/crm75d.smartline.ua/upload'));

//$query = "select id,name from ACCOUNTS WHERE id = '4511bd52-8b07-dc34-2186-4e365c68e51c'";
//$query = "select id,name from ACCOUNTS WHERE id = ':param1'";


/** @var CustomOracleManager $db */
//$db = $GLOBALS['db'];
//
//execute_query($query,$db);
//execute_query($query2,$db);
//execute_query($query3,$db);

/**
 * @param $query
 * @param $db CustomOracleManager
 */
//function execute_query($query,$db){
//    $params=array();
//    $query_time = microtime(true);
//
//    $i=0;
//    $line = preg_replace_callback(
//        "/'[^'\\\\]*(?:\\\\.[^'\\\\]*)*'/",
//        function ($matches)use(&$i,&$params){
//            $i++;
//            $params[":param".$i] = substr(substr($matches[0],1),0,-1);
//            return ":param".$i;
//        },
//        $query
//    );
//
//    //$stmt = $db->query($query);
//
//
//    $stmt = oci_parse($db->getDatabase(), $line);
//    $err = oci_error($db->getDatabase());print_r($err);
//
//    foreach ($params as $name => $param ) {
//        oci_bind_by_name ( $stmt, $name, $params[$name], -1 );
//    }
//    $err = oci_error($db->getDatabase());print_r($err);
//
//    oci_execute($stmt);
//    $err = oci_error($db->getDatabase());print_r($err);
//
//    $query_time = microtime(true) - $query_time;
//    print_r($query_time);
//    print_r('<br>');
//
//    while($a = $db->fetchByAssoc($stmt)) {
//        $load[$a['id']] = $a;
//    }
//
//    print_r($load);
//}














if(!defined('sugarEntry'))define('sugarEntry', true);


//chdir("/var/www/hosted/crm.smartline.ua/");
require_once('include/entryPoint.php');
//include ('include/MVC/SugarApplication.php');
////require_once('include/MVC/View/views/view.edit.php');
//require_once ('modules/SL_Request_products/SL_Request_products.php');
require_once ('modules/SL_Requests/SL_Requests.php');
//
global $current_user;
$current_user->retrieve("1");


//$bean = new SL_Request_products();
//$bean->retrieve('97ba875e-85d0-c455-994d-558baa25b2f3');
//$bean->curr_of_price = '1';
//$bean->save();
//print_r($bean->toArray());

//sendEmail();


//function sendEmail($body="")
//{
	//global $current_user;
	//$current_user->retrieve("1");
	//
	//require_once('custom/include/CustomSugarPHPMailer.php');
	//$mail = new CustomSugarPHPMailer();
	//$mail->setMailer('d3ed70fc-c7ec-ef95-f7c7-522fecfb5c2g');
	//$oe=$mail->oe->retrieve('d3ed70fc-c7ec-ef95-f7c7-522fecfb5c2g');
	//$mail->From = $oe->mail_smtpuser;
	//$mail->AddAddress('d.demydenko@smart-line.com.ua');

	//if(!$mail->Send()) {
	//	echo "Mailer Error: " . $mail->ErrorInfo;
	//} else {
	//	echo "Message sent!";
	//}


//}


//function setPasswordsOutboundEmail($id,$pass){
//	global $current_user;
//	$current_user->retrieve("1");
//
//	require_once('include/SugarPHPMailer.php');
//	$mail = new SugarPHPMailer();
//	//$id = 'd3ed70fc-c7ec-ef95-f7c7-522fecfb5c2g';
//	$oe=$mail->oe->retrieve($id);
//	//$q = "SELECT * FROM outbound_email WHERE id = '{$id}'";
//	//$pass = 'P@ssw0rd';
//	$oe->mail_smtppass = $pass;
//	$oe->save();
//
//}


