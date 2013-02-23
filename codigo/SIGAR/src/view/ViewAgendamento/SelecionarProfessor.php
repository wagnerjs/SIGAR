<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/AgendamentoCtrl.php';
    
    $agendamentoCtrl = new AgendamentoCtrl();
    $diaDaSemana = "Segunda";
    $horario = "13:00 as 14:00";
    $materia = "Matematica";
    $data = "2013-03-04";
    $idProfessor = 1;
    
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
  <link href="../css/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
  <script>
      $(document).ready(function(){
          $('#cadEnvDisp').click(function(){
            var dia = new Array();
            var horarios = new Array();
            var i = -1;
            $('.selection').each(function(){
                i = i + 1;
                horarios[i] = $(this).attr('name');
                dia[i] = $(this).html();           
            });

            for (var e = 0; e <= i; e++) {
                var x = dia[e];
                var y = horarios[e];
                <?php
                if (isset($_POST['btnEnviar'])) {
                $dia[e] = "<script>
                            document.write(screen.width+'x'+screen.height);
                            </script>"; ?>
                
                <?php  
                $horarios[e] = "<script>document.write(y)</script>";; }?>
                                
                //$('#DispTest').append("<p>"+dia[e]+" "+horarios[e]+"</p>");
                
            } 

         });
      });
  </script>
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
                    <a href="AgendarAula.php"><span class="selected">      Agendar Aula      </span></a>
                    <!--<a href="#"><span class="selected"> Pesquisar Professor</span></a>-->
                    <div class="content">
                        <form class="spaces" name="form1" action="SelecionarProfessor.php" method="post">
                        <div class="spaces">
                            <b>Selecionar professor:</b>
                            <div class="row-fluid show-grid">
                            <div class="span6">
                            <div class="materias">
                                    <br/>
                                    <div>
                                        <b>Professores:</b><br>
                            <?php
                            //echo "Dia da Semana: ".$diaDaSemana." Horário: ".$horario." Matéria: ".$materia;
                            $agendamentoCtrl->listarProfessoresDisponiveis($diaDaSemana, $horario, $materia);
                            if(@mysql_num_rows($agendamentoCtrl->getResposta())>0){
                                for($i=0; $i<mysql_num_rows($agendamentoCtrl->getResposta());$i++){
                                    if($agendamentoCtrl->verificaAulaMarcada($idProfessor, $data) == 0){
                            ?>
                            <input name="professor" type="radio" value="<?php echo utf8_encode(mysql_result($agendamentoCtrl->getResposta(),$i,'idProfessor'));?>" /><?php echo utf8_encode(mysql_result($agendamentoCtrl->getResposta(),$i,'nome'));?><br/>
                           <?php
                                    }
                                }
                            }else{
                                ?>
                            <input name="professor" type="radio" value="Tião" />Nenhum Registro encontrado<br/>    
                            <?php
                            }
                           ?>
                            
                            
                            
                            <br/>
                                    </div>
                                </div>
                            <br/><br/>
                            <b>Conteúdo:</b>
                            <br/><br/>
                            <textarea rows="5" cols="50">
                            </textarea>
                            <br/><br/>
                            </div>
                            </div>
                            <input type="submit" name="btnEnviar" value="Enviar" id="cadEnvDisp" />
                        </div>
                            </form>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>