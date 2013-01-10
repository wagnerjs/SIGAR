<?php
include_once '../utils/Login.class.php';
$url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src/view";

//inicializa a sessao
session_start();
//verifica se a sessao do USUARIO esta setada/criada
if( !isset($_SESSION['usuario']) )
{
	//cria uma sessao para o usuario e esta instancia a classe
	//isso faz com que toda minha classe esta disponivel na minha variavel de sessao
	$_SESSION["usuario"] = new Login();
}
//passo minha classe por referencia para a variavel $ObjSessao
$ObjSessao =& $_SESSION["usuario"];

//verifico se o atrituto da minha classe ESTA LOGADO e se o login.php esta dentro da minha variavel de ambiente
if( !$ObjSessao->estaLogado() && strpos( $_SERVER['SCRIPT_NAME'], 'login.php' ) == false )
	//caso nao esteja logado direciona para a pagina do login.php para que se efetua o login
	header("location: $url/login.php");
?>