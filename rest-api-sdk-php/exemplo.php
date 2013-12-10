<?php
/**
 * Arquivo de exemplo da API
 * 
 * 1. 
 * 2.
 * 3.
 * 4.
 * 
 * @author Iuri Andreazza <iuri.andreazza@gruporbs.com.br>
 */
header('Content-Type: text/html; charset=iso-UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './rbs/api/carros/PenseApi.php';

$api = new com\rbs\api\carros\PenseApi("ca33047954ee200802367300798f23b59705966c", "http://www.blucarros.com.br/URLQUEQUISERCOMOREFERER", "186.202.143.42");
$api->setLogLevel(com\rbs\api\carros\PenseApi::LOG_LEVEL_FULL);
$api->setVersion("1.0.1-rc1");


echo '--- Executando a chamada de validação da resposta da API';
var_dump($api->send("dummy", new stdClass()));

//echo '--- Exemplo de passando um AnuncioTO';
$anuncioTO = new \com\rbs\api\carros\to\AnuncioTO();
$opcional1 = new \com\rbs\api\carros\to\AnuncioOpcionalItemTO();
$opcional1->opcional = "air-bag";
$opcional1->value = 1;
$anuncioTO->opcionais[] = $opcional1;
//var_dump($api->send("UpdateAnuncio", $anuncioTO));