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

  <title>Gerenciar Aulas Marcadas</title>
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
  <script src="../js/formCadastroProfessor.js"></script>
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
                    <!--<a href="CadastroProfessor.php"><span class="normal"> Cadastrar Professor</span></a>-->
                    <a href="#"><span class="selected">    Gerenciar Aulas </span></a>
                    <div class="content">
                        <div class="spaces">
                            Pesquisar aula marcada:
                            <form action="#">
                                <fieldset>
                                    <input type="text" name="search" value="" id="id_search" placeholder="Search" autofocus />
                                </fieldset>
                            </form>
                            <table border="1" id="table_example">
                                <thead>
                                    <tr>
                                        <th>Matéria</th>
                                        <!--<th>Cpf</th>-->
                                        
                                        <th>Data</th>
                                        <th>Horário</th>

                                        <th>Professor</th>
                                        <th>Aluno</th>
                                        <th style="background: #ff963a;">Status</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>