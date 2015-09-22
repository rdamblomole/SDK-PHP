<?php 
use TodoPago\Sdk;

//importo archivo con SDK
include_once '../../vendor/autoload.php';

define('MERCHANT', 35);
define('SECURITY', '0129b065cfb744718166913eba827a2f');
$rk = $_COOKIE['RequestKey'];
$ak = $_GET['Answer'];
$operationid = $_GET['operationid'];

$optionsGAA = array (     
        'Security'   => SECURITY,      
        'Merchant'   => MERCHANT,     
        'RequestKey' => $rk,       
        'AnswerKey'  => $ak // *Importante     
);  

//común a todas los métodos
$wsdl['Authorize'] = "https://50.19.97.101:8243/services/Authorize?wsdl";
$wsdl['PaymentMethods'] = "https://50.19.97.101:8243/services/PaymentMethods?wsdl";
$wsdl['Operations'] = "https://50.19.97.101:8243/services/Operations?wsdl";
$http_header = array('Authorization'=>'TODOPAGO 0129b065cfb744718166913eba827a2f');
define('END_POINT', "https://50.19.97.101:8243/services/");

//creo instancia de la clase TodoPago
$connector = new Sdk($http_header, "test");

$rta2 = $connector->getAuthorizeAnswer($optionsGAA);

if ($rta2['StatusCode']== -1){
	echo "<h2>OPERACION :".$_GET['operationid']." exitosa</h2>";
}else{
	header("location: error.php?operationid=$operationid");
}