<?php
	include "validaSession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>index</title>
  <meta name="description" content="" />

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
    	<img src="img/logo.png" alt="SIGAR" />
      </div>
    <p class="status">Logado como:<b> <?php echo $ObjSessao->getUsuario();?> | <a href= "logoff.php" >Sair</b></a></p>
    <div class="row-fluid show-grid">
        <div class="span6">
            <div class="boxMenu">
                <a href="#"><div><img src="img/icon-calendar.png" />  Agendar Aula</div></a>
                <a href="#"><div><img src="img/icon-time.png" />  Gerenciar Aulas Marcadas</div></a>
            </div>
        </div>
        <div class="span6">
            <div class="boxMenu">
                <a href="#"><div><img src="img/icon-graph.png" />  Fluxo de Caixa</div></a>
                <a href="#"><div><img src="img/icon-rh.png" />  RH</div></a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row-fluid show-grid">
        <div class="span6">
            <div class="boxMenu">
                <a href="cadastroAluno.php"><div><img src="img/icon-man.png" />  Cadastrar Alunos</div></a>
                <a href="pesquisaAluno.php"><div><img src="img/icon-find.png" />  Pesquisar Alunos</div></a>
            </div>
        </div>
        <div class="span6">
            <div class="boxMenu">
                <a href="#"><div><img src="img/icon-man.png" />  Cadastrar Professores</div></a>
                <a href="#"><div><img src="img/icon-rh.png" />  Gerenciar Professores</div></a>
            </div>
        </div>
    </div>
  </div>
</body>
</html>
