<?php

require __DIR__ . '/../vendor/autoload.php';





    $orderId = $_POST["Xid"];
    $amount = $_POST["Amount"];
    $curreny = "TL";
    $bank_data = $_POST["BankPacket"];
    $merchantPacket = $_POST["MerchantPacket"];
    $sing = $_POST["Sign"];
    $encKey = "x,xx,xx,xxx,xx,xx,xx,xxx";

$financalArr = array(
    'enckey' => $encKey,
    'orderId' => $orderId,
    'amount' => $amount,
    'curreny' => $curreny,
    'bank_data' => $bank_data,
    'merchantPacket' => $merchantPacket,
    'sing' => $sing
);





$financal = new Qwerty\PosnetPaymentService\Financal($financalArr);




$conf = array(
    'mid' => 'xxxxxxxxxx',
    'tid' => 'xxxxxxxx',
    'clientId' => 'xxxx',
    'clientUser' => 'xxxxxxxx',
    'clientPass' => 'xxxxxxxx',
    'encKey' => 'x,xx,xx,xxx,xx,xx,xx,xxx'
);




$config = new Qwerty\PosnetPaymentService\Config($conf);




$client = new Qwerty\PosnetPaymentService\Client($config);



$seed = new Qwerty\PosnetPaymentService\SeederClass($config);




$financale = $seed->setFinancal($financal);




$xml =  $seed->getXmlSecond();



$query = new Qwerty\PosnetPaymentService\RequestClass();



$xmlUrl = 'https://posnet.yapikredi.com.tr/PosnetWebService/XML?';
$query->setXmlUrl($xmlUrl);



$cre_request = $query->xml_create_request($xml);

$reponse = new Qwerty\PosnetPaymentService\ResponseClass($cre_request);



$reponse->getRequestClassJson();
$arr = $reponse->getRequestClass();



$xmlData = $seed->getFinancalXml();





$query = new Qwerty\PosnetPaymentService\RequestClass();


$xmlUrl = 'https://posnet.yapikredi.com.tr/PosnetWebService/XML?';
$query->setXmlUrl($xmlUrl);


$cre_request = $query->xml_create_request($xmlData);




$reponse = new Qwerty\PosnetPaymentService\ResponseClass($cre_request);

//$finance_response = json_decode(json_encode(simplexml_load_string($cre_request)), true);
//print_r($finance_response);
$arr =  $reponse->getRequestClassJson();



?>