<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/AgendamentoCtrl.php';
    require_once $url.'/controller/AlunoCtrl.php';
    
    function removeAssentos($var) {

        $array1 = array( "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç" 
        , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" ); 
        $array2 = array( "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c" 
        , "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" ); 
        
        return str_replace( $array1, $array2, $var);
        return $var;
    }
    
    function diaSemana($data) {
        $ano = substr("$data", 0, 4);
        $mes = substr("$data", 5, -3);
        $dia = substr("$data", 8, 9);
        $diasemana = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
        switch ($diasemana) {
            case"0": $diasemana = "Domingo";
                break;
            case"1": $diasemana = "Segunda";
                break;
            case"2": $diasemana = "Terça";
                break;
            case"3": $diasemana = "Quarta";
                break;
            case"4": $diasemana = "Quinta";
                break;
            case"5": $diasemana = "Sexta";
                break;
            case"6": $diasemana = "Sábado";
                break;
        }
        return $diasemana;
    }
    $agendamentoCtrl = new AgendamentoCtrl();
    
    $data = $_POST['user_date'];   
    $diaDaSemana = removeAssentos(diaSemana($data));
    $materia = $_POST['materia'];   
    $materia = removeAssentos($materia);
//    $idProfessor = 1;
    @$_horario = $_POST['horario'];
    
    //print_r($_horario);
    //echo $materia;
    //echo $diaDaSemana;
    
    if (isset($_POST['btEnviar'])) {
        $conteudo = $_POST['conteudo'];
        $idProfessor = $_POST['professor'];
        $horario = $_POST['horario'];
        $idAluno = $_POST['idAluno'];
        $status = "Aula agendada";
        //echo $idAluno;
        $agendamentoCtrl->salvarAgendamento($idAluno, $idProfessor, $data, $horario,$status, $materia, utf8_decode($conteudo));
        header("location: http://localhost/SIGAR/codigo/SIGAR/src/view/ViewAgendamento/AgendarAula.php");
    }
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
                        <div class="spaces">
                            <b>Selecionar professor:</b>
                            <div class="row-fluid show-grid">
                            <div class="span6">
                            <div class="materias">
                                    <br/>
                                    <div>
                                        <b>Professores:</b><br>
                            <?php
                              $tam = count($_horario);
                            for($k=0;$k<$tam;$k++){
                                //echo $tam;
            
        
                            //echo "Dia da Semana: ".$diaDaSemana." Horário: ".$_horario[$i]." Matéria: ".$materia;
                            //echo $_horario[$k];
                            $agendamentoCtrl->listarProfessoresDisponiveis($diaDaSemana, $_horario[$k], $materia);
                            if(@mysql_num_rows($agendamentoCtrl->getResposta())>0){
                                for($i=0; $i<mysql_num_rows($agendamentoCtrl->getResposta());$i++){
                                    $j=0;
                                    $idProfessor = utf8_encode(mysql_result($agendamentoCtrl->getResposta(),$i,'idProfessor'));
                                    if($agendamentoCtrl->verificaAulaMarcada($idProfessor, $data) == 0){
                            ?>
                            <input name="professor" type="radio" value="<?php echo utf8_encode(mysql_result($agendamentoCtrl->getResposta(),$i,'idProfessor'));?>" /><?php echo utf8_encode(mysql_result($agendamentoCtrl->getResposta(),$i,'nome'));?><br/>
                           <?php
                                    }else{
                                        $j++;
                                    }
                                }
                                if(mysql_num_rows($agendamentoCtrl->getResposta())== $j){ ?>
                                <input name="professor" type="radio" value="" id="esconder">
                                    <b>Nenhum Professor encontrado </b><br/> 
                                <?php
                                
                                }
                            }else{
                                ?>
                             <input name="professor" type="radio" value="" id="esconder">
                            <b>Nenhum Professor encontrado </b><br/>    
                            <?php
                            }
                            
                           ?>
                            
                            <input name="materia" type="hidden" value="<?php echo removeAssentos($materia);?>" /> <br>
                           <input name="user_date" type="hidden" value="<?php echo $data;?>" /> <br>
                           <input name="horario" type="hidden" value="<?php echo $_horario[$k]; ?>" /> <br>
                           <?php
                           }
                           ?>
                            
                           <br/>
                            </div>
                            </div>
                            <br/><br/>
                            <b>Conteúdo:</b>
                            <br/><br/>
                            <input type="text" name="conteudo" value="">
                            <br/><br/>
                            </div>
                            </div>
                            
                        </div>
                        <form class="spaces" name="form1" action="SelecionarProfessor.php" method="post">
                            Pesquisar aluno:
                            <fieldset>
                                <input type="text" name="search" value="" id="id_search" placeholder="Search" autofocus />
                            </fieldset>
                            <table border="1" id="table_example">
                                <thead>
                                    <tr>
                                        <th>Marcar</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Data Nascimento</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                    $AlunoCtrl = new AlunoCrtl();
                                    
                                        $AlunoCtrl->listarAlunoAgendamento();

                                    if(@mysql_num_rows($AlunoCtrl->getResposta())>0){
                                        for($i=0; $i<mysql_num_rows($AlunoCtrl->getResposta());$i++){
                                    ?>
                                    <tr>
                                        <td> <input name="idAluno" type="checkbox" value="<?php echo utf8_encode(mysql_result($AlunoCtrl->getResposta(),$i,'idAluno')) ?>" /> </td>
                                        <td><?php echo utf8_encode(mysql_result($AlunoCtrl->getResposta(),$i,'nome'));?></a></td>
                                        <td><?php echo utf8_encode(mysql_result($AlunoCtrl->getResposta(),$i,'email')); ?></td>
                                        <td><?php $dataAlunoRecebida=utf8_encode(mysql_result($AlunoCtrl->getResposta(),$i,'dataNascimento'));
                                                  $dataAluno = implode("/",array_reverse(explode("-",$dataAlunoRecebida)));
                                                  echo $dataAluno;
                                                    ?></td>
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
                        
                            <input type="submit" name="btEnviar" value="Enviar" id="cadEnvDisp" />
                            </form>
                    </div>
                </div>
            </div>
            
        </div>
    
</body>

</html>

