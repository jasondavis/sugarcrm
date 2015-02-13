<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

chdir("C:/wwwroot/SugarPro/");

include ('include/MVC/preDispatch.php');
$startTime = microtime(true);
require_once('include/entryPoint.php');
require_once('include/MVC/View/views/view.edit.php');
//ob_start();
//require_once('include/MVC/SugarApplication.php');
//$app = new SugarApplication();
//$app->startSession();
//$app->execute();


/** @var PX_AdditionalAgreements $bean */
//$bean = BeanFactory::getBean('PX_Contracts','e5a8e455-6383-8685-ee63-5489a6646f03');
$bean = BeanFactory::getBean('PX_AdditionalAgreements');
//$bean->px_status = 'Подписан';
//$bean->checkInformalContracts();
