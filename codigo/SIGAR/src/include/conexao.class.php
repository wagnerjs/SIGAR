<?php
//Classe de conexão com o banco de dados
class bd
{
	//Atributos privados da classe bd
	private $_host = 'localhost';
	private $_usuario = 'root';
	private $_senha = '';
	private $_bd = 'sigar';
	private $_conexao;

	//Método de conexão com o banco de dados
	public function conecta(){
		$this->_conexao = mysql_connect($this->_host,$this->_usuario,$this->_senha);
	}

	//Método de seleção do banco de dados
	public function seleciona_bd(){
		mysql_select_db($this->_bd,$this->_conexao);
	}

	//Método que fecha a conexão com o banco de dados
	public function fechaConexao(){
		mysql_close($this->_conexao);
	}
}
?>