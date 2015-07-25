<?php
//importo archivo con SDK
include_once dirname(__FILE__)."/../TodoPago/lib/Sdk.php";
use TodoPago\Sdk;
	
//común a todas los métodos

$http_header = array('Authorization'=>'PRISMA 912EC803B2CE49E4A541068D495AB570',
 'user_agent' => 'PHPSoapClient');
 	
//opciones para el método sendAuthorizeRequest
$optionsSAR_comercio = array (
	'Security'=>'1234567890ABCDEF1234567890ABCDEF',
	'EncodingMethod'=>'XML',
	'Merchant'=>305,
	'URL_OK'=>'localhost:8888/sdk-php/ejemplo/success.php',
	'URL_ERROR'=>'localhost:8888/sdk-php/ejemplo/fail.php'
);

$optionsSAR_operacion = array (
	'MERCHANT'=> "305",
	'OPERATIONID'=>"01",
	'CURRENCYCODE'=> 032,
	'AMOUNT'=>"54"
	);
 	
//opciones para el método getAuthorizeAnswer
$optionsGAA = array(	
	'Security' => '1234567890ABCDEF1234567890ABCDEF', 
	'Merchant' => "305",
	'RequestKey' => '8496472a-8c87-e35b-dcf2-94d5e31eb12f',
	'AnswerKey' => '8496472a-8c87-e35b-dcf2-94d5e31eb12f'
	);
	
//opciones para el método getAllPaymentMethods
$optionsGAMP = array("MERCHANT"=>305);
	
//opciones para el método getStatus 
$optionsGS = array('MERCHANT'=>'305', 'OPERATIONID'=>'141120084707');
	
//creo instancia de la clase TodoPago
$connector = new Sdk($http_header, "test");
	
//ejecuto los métodos
$rta = $connector->sendAuthorizeRequest($optionsSAR_comercio, $optionsSAR_operacion);
$rta2 = $connector->getAuthorizeAnswer($optionsGAA);
$rta4 = $connector->getStatus($optionsGS);    
   	 
//imprimo respuestas
echo "<h3>var_dump de la respuesta de Send Authorize Request</h3>";
var_dump($rta);
echo "<h3>var_dump de la respuesta de Get Authorize Answer</h3>";
var_dump($rta2);
echo "<h3>var_dump de la respuesta de Get Status</h3>";
var_dump($rta4);