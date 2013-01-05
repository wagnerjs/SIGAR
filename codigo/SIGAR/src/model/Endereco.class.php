<?php 
 class Endereco{
 
	private $_cep;
	private $_endereco;
	private $_numeroCasa;
	private $_complemento;
	private $_bairro;
	private $_cidade;
	private $_uf;
	private $_referencia;
	
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
	
	public function setEndereco( $_endereco )
	{
		$this->_endereco = $_endereco;
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
	
	public function getEndereco()
	{
		return $this->_endereco;
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