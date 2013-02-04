<?php 
 class Endereco{
 
	private $_cep;
	private $_logradouro;
	private $_numeroCasa;
	private $_complemento;
	private $_bairro;
	private $_cidade;
	private $_uf;
	private $_referencia;
	
        function __construct($logradouro="",$cep="",$bairro="",$cidade="",$complemento="",$numero="",$uf="",$referencia="") {
            $this->_cep = $cep;
            $this->_logradouro = $logradouro;
            $this->_numeroCasa = $numero;
            $this->_complemento = $complemento;
            $this->_bairro = $bairro;
            $this->_cidade = $cidade;
            $this->_uf = $uf;
            $this->_referencia = $referencia;
        }

	 
	public function getUf()
	{
	    return $this->_uf;
	}
	public function getCep()
	{
		return $this->_cep;
	}
	
	public function getLogradouro()
	{
		return $this->_logradouro;
	}
	
	public function getNumeroCasa()
	{
		return $this->_numeroCasa;
	}
	
	public function getComplemento()
	{
		return $this->_complemento;
	}
	
	public function getBairro()
	{
		return $this->_bairro;
	}
	
	public function getCidade()
	{
		return $this->_cidade;
	}
	
	public function getReferencia()
	{
		return $this->_referencia;
	}
 }


?>