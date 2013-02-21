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
  <script src="../js/formCadastroProfessor.js"></script>
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
                    <a href="CadastroProfessor.php"><span class="normal"> Cadastrar Professor</span></a>
                    <a href="#"><span class="selected"> Pesquisar Professor</span></a>
                    <div class="content">
                        <div class="spaces">
                            <b>Disponibilidade do professor <span id="profName"></span></b><br/>
                            Clique nos horários disponíveis deste professor.
                            Para desmarcar basta clicar novamente.
                            <br/>
                            <div class="calendario">
                                <table id="dispCalendar">
                                    <thead>
                                        <tr>
                                            <th>Segunda</th>
                                            <th>Terça</th>
                                            <th>Quarta</th>
                                            <th>Quinta</th>
                                            <th>Sexta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>08:00 às 09:00</td>
                                            <td>08:00 às 09:00</td>
                                            <td>08:00 às 09:00</td>
                                            <td>08:00 às 09:00</td>
                                            <td>08:00 às 09:00</td>
                                        </tr>
                                        <tr>
                                            <td>09:00 às 10:00</td>
                                            <td>09:00 às 10:00</td>
                                            <td>09:00 às 10:00</td>
                                            <td>09:00 às 10:00</td>
                                            <td>09:00 às 10:00</td>
                                        </tr>
                                        <tr>
                                            <td>10:00 às 11:00</td>
                                            <td>10:00 às 11:00</td>
                                            <td>10:00 às 11:00</td>
                                            <td>10:00 às 11:00</td>
                                            <td>10:00 às 11:00</td>
                                        </tr>
                                        <tr>
                                            <td>11:00 às 12:00</td>
                                            <td>11:00 às 12:00</td>
                                            <td>11:00 às 12:00</td>
                                            <td>11:00 às 12:00</td>
                                            <td>11:00 às 12:00</td>
                                        </tr>
                                        <tr>
                                            <td>14:00 às 15:00</td>
                                            <td>14:00 às 15:00</td>
                                            <td>14:00 às 15:00</td>
                                            <td>14:00 às 15:00</td>
                                            <td>14:00 às 15:00</td>
                                        </tr>
                                        <tr>
                                            <td>15:00 às 16:00</td>
                                            <td>15:00 às 16:00</td>
                                            <td>15:00 às 16:00</td>
                                            <td>15:00 às 16:00</td>
                                            <td>15:00 às 16:00</td>
                                        </tr>
                                        <tr>
                                            <td>16:00 às 17:00</td>
                                            <td>16:00 às 17:00</td>
                                            <td>16:00 às 17:00</td>
                                            <td>16:00 às 17:00</td>
                                            <td>16:00 às 17:00</td>
                                        </tr>
                                        <tr>
                                            <td>17:00 às 18:00</td>
                                            <td>17:00 às 18:00</td>
                                            <td>17:00 às 18:00</td>
                                            <td>17:00 às 18:00</td>
                                            <td>17:00 às 18:00</td>
                                        </tr>
                                        <tr>
                                            <td>18:00 às 19:00</td>
                                            <td>18:00 às 19:00</td>
                                            <td>18:00 às 19:00</td>
                                            <td>18:00 às 19:00</td>
                                            <td>18:00 às 19:00</td>
                                        </tr>
                                        <tr>
                                            <td>19:00 às 20:00</td>
                                            <td>19:00 às 20:00</td>
                                            <td>19:00 às 20:00</td>
                                            <td>19:00 às 20:00</td>
                                            <td>19:00 às 20:00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <input type="submit" name="btnEnviar" value="Enviar" id="cadEnv" />
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>