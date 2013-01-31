<?php
$url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
require_once $url.'/utils/Login.class.php';

//inicializa a sessao
session_start();
//verifica se a sessao do USUARIO já esta setada/criada
if( !isset($_SESSION['usuario']) )
{
	//cria uma sessao para o usuario e esta instancia a classe Login
	//isso faz com que toda a classe esteja disponivel na variavel de sessao
	$_SESSION["usuario"] = new Login();
}
//a classe é passada por referencia para a variavel $ObjSessao
$ObjSessao =& $_SESSION["usuario"];

//verifico o atrituto "EstaLogado" da classe e se o login.php esta dentro da minha variavel de ambiente
//porque caso eu não esteja logado eu tenho que ser direcionado para a página de login
if( !$ObjSessao->estaLogado() && strpos( $_SERVER['SCRIPT_NAME'], 'Login.php' ) == false )
	//caso nao esteja logado direciona para a pagina do login.php para que se efetua o login
	header("location: $url/view/Login.php");
?>