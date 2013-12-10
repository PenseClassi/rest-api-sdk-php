<?php
namespace com\rbs\api\carros\to;
/**
 * TO para transferencia de Anuncio
 *
  * @author Iuri_Andreazza { iuri.andreazza@gruporbs.com.br }
 */
class AnuncioTO {
    public $codigo_anuncio_revenda;
	public $descricao;
	public $cidade;
	public $uf;
	public $tipo_veiculo;
	public $marca;
	public $modelo;
	public $ano_fabricacao;
	public $ano_modelo;
	public $preco;
	public $sob_consulta;
	public $placa;
	public $observacao;
	public $cor;
	public $combustivel;
	public $motor;
	public $portas;
    
    /**
     * @type ArrayOf AnuncioOpcionalItemTO
     */
	public $opcionais = array(); 
    
}

class AnuncioOpcionalItemTO{
    public $opcional;
    public $value;
}
