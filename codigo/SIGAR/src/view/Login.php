<?php
	$url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
	require  'ValidaSession.php';
	require_once $url.'/utils/Conexao.class.php';
        require_once $url.'/controller/ProfessorCtrl.php';

	if(isset($_POST['enviar'])){
                @$professorCtrl = new ProfessorCtrl();
		$obj_conecta = new bd;
			$obj_conecta->conecta();
			$obj_conecta->seleciona_bd();

		$ObjSessao->setUsuario($_POST['login']);
		$ObjSessao->setSenha($_POST['senha']);
		$ObjSessao->autentica();

		$obj_conecta->fechaConexao();

		if($ObjSessao->getResposta()==null){
                    if($ObjSessao->getIdLogin()==1){
                        header("location: TelaPrincipal.php");
                    }
                    else{
                            $idProfessor = $professorCtrl->selecionarIdProfessor($ObjSessao->getIdLogin());
                            header("location: http://localhost/SIGAR/codigo/SIGAR/src/view/ViewProfessor/DisponibilidadeAcessoProfessor.php?professorID=".base64_encode(serialize($idProfessor))."");
                        }
                    }
	}
			
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Login</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0" />
  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="img/favicon.ico" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/estilo.css" rel="stylesheet" media="screen">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.valid8.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/jquery.maskedinput-1.3.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/jquery.quicksearch.js"></script>
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
    </form>
  </div>
</body>
</html>