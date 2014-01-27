<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$client = new SoapClient("http://rbsn0042:8080/pense-webservices/api/soap/v1/gerar-estatisticas/GerarEstatisticas.wsdl");
echo '<pre>';
var_dump($client->__getFunctions()); 
var_dump($client->__getTypes()); 


echo '<br />-----------------[ CALL ]-----------------<br />';
$params = array(
  "id" => 100,
  "name" => "John",
  "description" => "Barrel of Oil",
  "amount" => 500,
);
//$response = $client->__soapCall("Holiday", array($params));


class GerarEstatisticasResponse{
    public $xml;
}

class GerarEstatisticasRequest {
   public $hash = "";
   public $dataInicio = "2014-01-01";
   public $dataFim = "2014-01-01";
   public $codigoAnuncio = 0; 
}

$request = new GerarEstatisticasRequest();

var_dump($request);

$response1 = $client->__soapCall('GerarEstatisticas', array('arg0'=>$request));
echo '<br />-----------------[ RESPONSE ]-----------------<br />';
var_dump($client->__getLastRequest());
var_dump($client->__getLastResponse());
var_dump($client->__getLastRequestHeaders());
var_dump($response1);



$response2 = $client->GerarEstatisticas($request);
echo '<br />-----------------[ RESPONSE ]-----------------<br />';
var_dump($client->__getLastRequest());
var_dump($client->__getLastResponse());
var_dump($client->__getLastRequestHeaders());
var_dump($response2);


