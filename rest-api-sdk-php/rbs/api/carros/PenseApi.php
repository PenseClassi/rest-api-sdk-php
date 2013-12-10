<?php
namespace com\rbs\api\carros;

$currDir = dirname(__FILE__) . DIRECTORY_SEPARATOR;

require_once $currDir.'/Request.php';
require_once $currDir.'/Response.php';
require_once $currDir.'/util/HttpConnect.php';
require_once $currDir.'/to/AnuncioTO.php';
require_once $currDir.'/to/ContatoTO.php';
require_once $currDir.'/to/MidiaTO.php';




/**
 * Classe base apra tratamento do request para a API
 * 
 * @author Iuri_Andreazza { iuri.andreazza@gruporbs.com.br }
 */
class PenseApi {
    
    const LOG_LEVEL_SILENT          = 0;
    const LOG_LEVEL_ERRORS          = 1;
    const LOG_LEVEL_ERROR_WARINGS   = 2;
    const LOG_LEVEL_FULL            = 3;
    
    private $__baseUrl = "http://www.pensecarros.com.br";
    private $__clientHash = "NO-HASH";
    private $__currentVersion = "1.0.0-rc1";
    private $__logLevel = 1;
    private $__postFields = array();
    
    private $__rfr = "";
    private $__s_addr = "";
    private $__c_addr = "";
    
    public function __construct($hash, $reffer, $sourceAddress){
        $this->__clientHash = $hash;
        $this->__s_addr = $sourceAddress;
        $this->__c_addr = "";
        $this->__rfr = $reffer;
        $this->initPostFields();
    }
    
    public function setVersion($version){
        $this->__currentVersion = $version;
    }
    
    /**
     * PenseApi::LOG_LEVEL_SILENT          = 0;
     * PenseApi::LOG_LEVEL_ERRORS          = 1;
     * PenseApi::LOG_LEVEL_ERROR_WARINGS   = 2;
     * PenseApi::LOG_LEVEL_FULL            = 3;
     * 
     * @param type $lvl
     */
    public function setLogLevel($lvl){
        if($lvl >= self::LOG_LEVEL_SILENT && $lvl <= self::LOG_LEVEL_FULL){
            $this->__logLevel = $lvl;
        }
    }
    
    /**
     * 
     * @param String $called Método a ser executado na API
     * @param Object $objectToSend Um dos TOs para transmissão
     */
    public function send($called, $objectToSend){
        $httpClient = new util\HttpConnect();
        $httpClient->createCurl($this->buildQueryURI($called));
        $this->__postFields['c_data'] = json_encode($this->buildRequest($called, $objectToSend));
        $httpClient->setPost($this->__postFields);
        return $this->parseResponse($httpClient->__toString());
    }
    
    //PRIVATE (Controle da base da API)
    
    private function initPostFields(){
        $this->__postFields['rfr'   ] = $this->__rfr;
        $this->__postFields['s_addr'] = $this->__s_addr;
        $this->__postFields['c_addr'] = $this->__c_addr;
        $this->__postFields['c_data'] = new \stdClass();
    }
    
    private function buildQueryURI($called){
        return "{$this->__baseUrl}/api/{$this->__currentVersion}/{$called}/{$this->__clientHash}/";
    }
    
    
    private function buildRequest($called, $objectToSend){
        $req = new Request();
        $req->action    = $called;
        $req->loglevel  = $this->__logLevel;
        $req->version   = $this->__currentVersion;
        $req->data      = $objectToSend;
        return $req;
    }
    
    private function parseResponse($responseJson){
        return json_decode($responseJson);
    }
    
}