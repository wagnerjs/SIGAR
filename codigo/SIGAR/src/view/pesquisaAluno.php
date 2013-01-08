<?php
	include "validaSession.php";
        include_once '../controller/AlunoCtrl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Pesquisar Aluno</title>
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
            <a href="telaPrincipal.php"><img src="img/logo.png" vspace="50"/></a>
            <p class="status">Logado como:<b> <?php echo $ObjSessao->getUsuario();?> | <a href= "logoff.php" >Sair</b></a></p>
            <div id="sysBox">
                <div class="inner">
                    <br/>
                    <a href="cadastroAluno.php"><span class="normal">Cadastrar Alunos</span></a>
                    <a href="#"><span class="selected">Pesquisar Alunos</span></a>
                    <div class="content">
                        <div>
                            Pesquisar aluno: <input type="text"/>
                            <table border="1">
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Escola</th>
                                    <th>Escolaridade</th>
                                    <th>Data Nascimento</th>
                                    <th>Sexo</th>
                                    <th>Telefone Residencial</th>
                                </tr>
                                <?php
                                $AlunoCtrl = new AlunoCrtl();
                                    $AlunoCtrl->listarAluno();

                                if(mysql_num_rows($AlunoCtrl->getResposta())>0){
                                    for($i=0; $i<mysql_num_rows($AlunoCtrl->getResposta());$i++){
                                ?>
                                <tr>
                                    <td><?php echo mysql_result($AlunoCtrl->getResposta(),$i,'nome');?></td>
                                    <td><?php echo mysql_result($AlunoCtrl->getResposta(),$i,'email'); ?></td>
                                    <td><?php echo mysql_result($AlunoCtrl->getResposta(),$i,'escola');?></td>
                                    <td><?php echo mysql_result($AlunoCtrl->getResposta(),$i,'anoEscolar');?></td>
                                    <td><?php echo mysql_result($AlunoCtrl->getResposta(),$i,'dataNascimento');?></td>
                                    <td><?php echo mysql_result($AlunoCtrl->getResposta(),$i,'sexo'); ?></td>
                                    <td><?php echo mysql_result($AlunoCtrl->getResposta(),$i,'telefoneResidencial');?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>