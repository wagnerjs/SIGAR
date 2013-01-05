<?php

abstract class Pessoa
{
	private $_nome;
	private $_sexo;
	private $_nascimento;
	private $_email;
	private $_telefone;
	private $_celular;
	private $_endereco;
	


	
	public function setNome( $_nome )
	{
		$this->_nome = $_nome;
	}
	
	public function setSexo( $_sexo )
	{
		$this->_sexo = $_sexo;
	}
	
	public function setNascimento( $_nascimento )
	{
		$this->_nascimento = $_nascimento;
	}
	
	public function setEmail( $_email )
	{
		$this->_email = $_email;
	}
	
	public function setTelefone( $_telefone )
	{
		$this->_telefone = $_telefone;
	}
	
	public function setCelular( $_celular )
	{
		$this->_celular = $_celular;
	}
	
	public function getNome()
	{
		return $this->_nome;
	}
	
	public function getSexo()
	{
		return $this->_sexo;
	}
	
	public function getNascimento()
	{
		return $this->_nascimento;
	}
	
	public function getEmail()
	{
		return $this->_email;
	}
	
	public function getTelefone()
	{
		return $this->_telefone;
	}
	
	public function getCelular()
	{
		return $this->_celular;
	}

	
}
?>