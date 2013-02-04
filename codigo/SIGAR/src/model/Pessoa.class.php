<?php

abstract class Pessoa
{
	private $_nome;
	private $_sexo;
	private $_nascimento;
	private $_email;
	private $_telefoneResidencial;
	private $_celular;
	private $_endereco;
        private $_cpf;
        
        public function setCpf($_cpf){
            $this->_cpf = $_cpf;
        }
        
        public function getCpf() {
            return $this->_cpf;
        }
        
        public function getEndereco() {
            return $this->_endereco;
        }

        public function setEndereco($_endereco) {
            $this->_endereco = $_endereco;
        }

        
	
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
	public function getTelefoneResidencial() {
            return $this->_telefoneResidencial;
        }

        public function setTelefoneResidencial($_telefoneResidencial) {
            $this->_telefoneResidencial = $_telefoneResidencial;
        }

        public function getCelular()
	{
		return $this->_celular;
	}

	
}
?>