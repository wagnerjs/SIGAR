<?php
//Classe login
class Login
{
	// Declara��o de vari�veis da classes
	protected $_idUsuario;
	protected $_login;
	protected $_senha;
	protected $_resposta;

	// M�todo construtor - executado sempre e antes de tudo.
	public function __construct()
	{
		$this->_idUsuario  = 0;
		$this->_login = null;
		$this->_senha    = null;
		$this->_resposta = null;
	}

	//M�todo para autenticar/verificar login do usu�rio no sistema
	public function autentica()
	{
		//Verificando os valores no banco
		$sql = "SELECT idUsuario, login, senha, idPessoa
		FROM usuario
		where login = '$this->_login'";
		$resultado = mysql_query($sql);

		$linha = mysql_num_rows( $resultado );

		//Limpando vari�veis
		$this->_idUsuario = 0;
		$this->_resposta = NULL;

		if ($linha==0){ // Testa se a consulta retornou algum registro
			$this->_resposta="<b>Usuario/Senha nao encontrado(s)</b>";
		}
		else
		{	//verifica se a senha esta correta
			if($this->_senha != mysql_result($resultado,0,"Senha")){
				$this->_resposta="<b>Usuario/Senha nao encontrado(s)</b>";
			}
			else // usu�rio e senha corretos,captura id do usuario
			{
				$this->_idUsuario = mysql_result($resultado,0,"idUsuario");
                                //$this->_resposta="<b>Usuario/Senha encontrado(s)</b>";
			}
		}
            
	}
	
	//M�todo para sair/efetuar logoff do sistema
	public function logoff(){
		session_start();
		//metodo para destruir a sessao
		session_destroy();
		//envia o usuaria para a pagina de login
		header("location: Login.php");
	}
	
	//M�todos SETS atribuindo valor a uma vari�vel
	public function setUsuario($login){
		$this->_login=$login;
	}

	public function setResposta($erro){
		$this->_resposta = $erro;
	}

    	public function setSenha($senha){
    	$this->_senha=md5($senha);
    	}

	public function setIdLogin($idUsuario){
		$this->_idUsuario=$idUsuario;
	}

	//M�todos GETS enviando valores para p�gina
	public function getResposta(){
		return $this->_resposta;
	}
	public function getUsuario(){
		return $this->_login;
	}
	public function getNome(){
		return $this->_nome;
	}
	public function getIdLogin(){
		return $this->_idUsuario;
	}

	//M�todo para verificar se o usu�rio esta logado no sistema
	public function estaLogado()
	{
		return ($this->_idUsuario > 0);
	}
}
?>