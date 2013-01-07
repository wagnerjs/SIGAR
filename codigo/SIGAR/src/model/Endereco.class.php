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

        
	public function setUf( $_uf )
	{
	    $this->_uf = $_uf;
	}
	 
	public function getUf()
	{
	    return $this->_uf;
	}
	
	
	
	public function setCep( $_cep )
	{
		$this->_cep = $_cep;
	}
	
	public function setLogradouro( $_logradouro )
	{
		$this->_logradouro= $_logradouro;
	}
	
	public function setNumeroCasa( $_numeroCasa )
	{
		$this->_numeroCasa = $_numeroCasa;
	}
	
	public function setComplemento( $_complemento )
	{
		$this->_complemento = $_complemento;
	}
	
	public function setBairro( $_bairro )
	{
		$this->_bairro = $_bairro;
	}
	
	public function setCidade( $_cidade )
	{
		$this->_cidade = $_cidade;
	}
	
	public function setReferencia( $_referencia )
	{
		$this->_referencia = $_referencia;
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