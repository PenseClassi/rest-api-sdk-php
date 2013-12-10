<?php

namespace com\rbs\api\carros\to;

/**
 * TO de transferencia de Contato
 *
 * @author Iuri_Andreazza { iuri.andreazza@gruporbs.com.br }
 */
class ContatoTO {
    
    public $celular;       //(99)9999-9999", //mais um numero disponivel para SP
	public $telefone1;     //(99)9999-9999", //mais um numero disponivel para SP
	public $endereco;      //Logradouro do contato
	public $cidade;        //codigo da cidade
	public $estado;        //SIGLA DO ESTADO (RS, SC ...)
	public $email1;
	public $nome;
    
}
