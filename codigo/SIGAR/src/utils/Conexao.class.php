<?php
//Classe de conex�o com o banco de dados
class bd
{
	//Atributos privados da classe bd
	private $_host = 'localhost';
	private $_usuario = 'root';
	private $_senha = '';
	private $_bd = 'sigar';
	private $_conexao;

	//M�todo de conex�o com o banco de dados
	public function conecta(){
		$this->_conexao = mysql_connect($this->_host,$this->_usuario,$this->_senha);
                mysql_query("SET NAMES 'utf8'");
                mysql_query('SET character_set_connection=utf8');
                mysql_query('SET character_set_client=utf8');
                mysql_query('SET character_set_results=utf8');
	}

	//M�todo de sele��o do banco de dados
	public function seleciona_bd(){
		mysql_select_db($this->_bd,$this->_conexao);
	}

	//M�todo que fecha a conex�o com o banco de dados
	public function fechaConexao(){
		mysql_close($this->_conexao);
	}
}
?>