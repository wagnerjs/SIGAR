<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/ProfessorCtrl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Pesquisar Professor</title>
  <meta name="description" content="" />

  <meta name="viewport" content="width=device-width; initial-scale=1.0" />

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="../img/favicon.ico" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="../css/estilo.css" rel="stylesheet" media="screen">
  <script src="../js/jquery-latest.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.valid8.js" type="text/javascript" charset="utf-8"></script>
  <script src="../js/jquery.maskedinput-1.3.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="../js/jquery.quicksearch.js"></script>
  <script src="../js/base.js"></script>
  <link href="../css/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
    <div id="boxes">
    <div id="dialog" class="window">
        <a href="#" class="close" />Fechar</a>
        <div id="ajaxContainer">
        </div>
    </div>
<div id="mask"></div>
</div>
        <div class="container">
            <a href="../TelaPrincipal.php"><img src="../img/logo.png" vspace="50"/></a>
            <p class="status">Logado como:<b> <?php echo $ObjSessao->getUsuario();?> | <a href= "../Logoff.php" >Sair</b></a></p>
            <div id="sysBox">
                <div class="inner">
                    <br/>
                    <a href="CadastroProfessor.php"><span class="normal">Cadastrar Professor</span></a>
                    <a href="#"><span class="selected">Pesquisar Professor</span></a>
                    <div class="content">
                        <div>
                            Pesquisar professor: 
                            <form action="#">
                                <fieldset>
                                    <input type="text" name="search" value="" id="id_search" placeholder="Search" autofocus />
                                </fieldset>
                            </form>
                            <table border="1" id="table_example">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Cpf</th>
                                        
                                        <th>Email</th>
                                        <th>Meio de Transporte</th>

                                        <th>Data Nascimento</th>
                                        <th>Sexo</th>
                                        <th>Telefone Residencial</th>
                                        <th colspan='2'>Opções</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                    $professorCtrl = new ProfessorCtrl();
                                    $professorCtrl->listarTodosProfessores();
                                        

                                    if(@mysql_num_rows($professorCtrl->getResposta())>0){
                                        for($i=0; $i<mysql_num_rows($professorCtrl->getResposta());$i++){

                                    ?>
                                    <tr>
                                        <td><a href="http://localhost/SIGAR/codigo/SIGAR/src/view/ViewAluno/ListarDadosProfessor.php?professorID=<?php echo mysql_result($professorCtrl->getResposta(),$i,'idProfessor');?>">
                                        <?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'nome'));?></a></td>
                                        <td><?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'cpf')); ?></td>
                                        <td><?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'email')); ?></td>
                                        <td><?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'meioTransporte'));?></td>
                                        <td><?php $dataProfessorRecebida=utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'dataNascimento'));
                                                  $dataProfessor = implode("/",array_reverse(explode("-",$dataProfessorRecebida)));
                                                  echo $dataProfessor;
                                                    ?></td>
                                        <td><?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'sexo')); ?></td>
                                        <td><?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'telefoneResidencial'));?></td>
                                        <td style='cursor: pointer'><a href="http://localhost/SIGAR/codigo/SIGAR/src/view/ViewProfessor/AlterarProfessor.php?professorID=<?php echo mysql_result($professorCtrl->getResposta(),$i,'idProfessor');?>"><img src='../img/edit.png' onClick="" alt="Editar"></a></td>
                                        <td style='cursor: pointer'><a href="#"><img src='../img/del.png' onClick="" alt="Deletar"></a></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    else{ ?>
                                        <tr>
                                             <td colspan="7"><?php echo "<center>Nenhum registro encontrado!</center>" ?></td>   
                                        </tr>
                                    <?php
                                    }
                                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>