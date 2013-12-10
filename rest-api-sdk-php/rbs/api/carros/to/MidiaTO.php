<?php
namespace com\rbs\api\carros\to;
/**
 * TO de transferencia de MIDIA
 *
 * @author Iuri_Andreazza { iuri.andreazza@gruporbs.com.br }
 */
class MidiaTO {
    
    /**
     *
     * @var type ArrayOf MidiaKeyValuePair
     */
    public $fotos = array();
    
    public function add(MidiaKeyValuePair $value){
        $this->fotos[] = $value;
    }
    
    public function rem($arquivo){
        
    }
    
}

/**
 * Dicionario de item de Midia
 * 
 * @author Iuri_Andreazza { iuri.andreazza@gruporbs.com.br }
 */
class MidiaKeyValuePair {
    
    public $legenda; 
    public $arquivo;
    
}
