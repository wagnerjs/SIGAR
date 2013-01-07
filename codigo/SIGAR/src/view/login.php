<?php
	include 'validaSession.php';
	include_once '../utils/conexao.class.php';

	if(isset($_POST['enviar'])){
		$obj_conecta = new bd;
			$obj_conecta->conecta();
			$obj_conecta->seleciona_bd();

		$ObjSessao->setUsuario($_POST['login']);
		$ObjSessao->setSenha($_POST['senha']);
		$ObjSessao->autentica();

		$obj_conecta->fechaConexao();

		if($ObjSessao->getResposta()==null)
			header("location: telaLogado.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Login</title>
  <meta name="description" content="" />
  <meta name="author" content="Fellype" />

  <meta name="viewport" content="width=device-width; initial-scale=1.0" />

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/estilo.css" rel="stylesheet" media="screen">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/base.js"></script>
</head>

<body>
  <div class="container">
    <div id="logo">
    	<img src="img/bright.png" id="bright"/>
    	<img src="img/logo.png" alt="SIGAR" />
    	<p>Sistema Gerenciador de Aulas de Reforço</p>
    </div>
    <form id="login" action="login.php" method="POST">
    	<input id="userName" class="campo" type="text" value="Usuário" name="login"/>
    	<input id="passWord" class="campo" type="password" value="Senha" name="senha"/>
		<input type="submit" name="enviar" value="" id="entrar"/>
		<br>
		<?php echo $ObjSessao->getResposta(); ?>
    	<!--<a href="#"><img src="img/button.png" height="40" width="170"/></a>-->
    </form>
  </div>
</body>
</html>
