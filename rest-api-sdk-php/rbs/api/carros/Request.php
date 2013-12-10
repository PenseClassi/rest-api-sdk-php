<?php
namespace com\rbs\api\carros;
/**
 * Classe base apra tratamento do request para a API
 * 
 * @author Iuri_Andreazza { iuri.andreazza@gruporbs.com.br }
 */
class Request {
    
    public $version;
	public $action;
	public $loglevel;
	public $data;
    
    public function __construct() {
        $this->data = new \stdClass();
    }
    
}
