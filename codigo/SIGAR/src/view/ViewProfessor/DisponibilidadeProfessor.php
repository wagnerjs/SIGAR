<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require_once $url.'/view/ValidaSession.php';
    require_once $url.'/controller/DisponibilidadeCtrl.php';
    
    require_once $url.'/controller/ProfessorCtrl.php';
    
    $idProfessor = unserialize(base64_decode(addslashes($_GET["professorID"])));
    $objCtrlDisp = new DisponibilidadeCtrl();
    $resultado = $objCtrlDisp->listarHorariosDisponiveis($idProfessor);
    
    if (isset($_POST['btnEnviar'])) {
        @$_dia = $_POST['dia'];
        @$_horario = $_POST['horario'];
        $res = null;
        $tam = count($_horario);
        $objCtrlDisp->deletarDisponibilidadeCascata($idProfessor);
        for($i=0;$i<$tam;$i++){
            $objCtrlDisp->adicionarDisponibilidade($idProfessor, utf8_decode($_dia[$i]), utf8_decode($_horario[$i]));
        }
         
        
        if($tam)
            $res = "<font color=green><b>Disponibilidade Cadastrado com sucesso!</b></font><br/>";
        else
            $res = "<font color=red><b>Disponibilidade não! Cadastrado com sucesso!</b></font><br/>";
        
        if ($res == "<font color=green><b>Disponibilidade Cadastrado com sucesso!</b></font><br/>")
            echo "<script type='text/javascript'>alert('Disponibilidade Cadastrado com sucesso!');</script>";
        else
            echo "<script type='text/javascript'>alert('Erro na realização do cadastro!');</script>";
        
        //print_r($_horario);
        
        //print_r($_dia);
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
                    <a href="CadastroProfessor.php"><span class="normal"> Cadastrar Professor</span></a>
                    <a href="PesquisaProfessor.php"><span class="selected"> Pesquisar Professor</span></a>
                    <div class="content">
                        <div class="spaces">
                            <form id="DispTest" name="form1" action="DisponibilidadeProfessor.php?professorID=<?php echo $idProfessor; ?>" method="post">
                            <?php echo @$res; ?>
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
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou1 = 0;
                                            
                                            if($criou1==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="08:00-09:00"){
                                                            echo "<td name='segunda' class='selection'>08:00-09:00</td>";
                                                            $criou1++;
                                                    }
                                                }
                                                if($criou1==0)
                                                    echo "<td name='segunda'>08:00-09:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou2 = 0;
                                            
                                            if($criou2==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="08:00-09:00"){
                                                            echo "<td name='terça' class='selection'>08:00-09:00</td>";
                                                            $criou2++;
                                                    }
                                                }
                                                if($criou2==0)
                                                    echo "<td name='terça'>08:00-09:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou3 = 0;
                                            
                                            if($criou3==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="08:00-09:00"){
                                                            echo "<td name='quarta' class='selection'>08:00-09:00</td>";
                                                            $criou3++;
                                                    }
                                                }
                                                if($criou3==0)
                                                    echo "<td name='quarta'>08:00-09:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou4 = 0;
                                            
                                            if($criou4==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="08:00-09:00"){
                                                            echo "<td name='quinta' class='selection'>08:00-09:00</td>";
                                                            $criou4++;
                                                    }
                                                }
                                                if($criou4==0)
                                                    echo "<td name='quinta'>08:00-09:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou5 = 0;
                                            
                                            if($criou5==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="08:00-09:00"){
                                                            echo "<td name='sexta' class='selection'>08:00-09:00</td>";
                                                            $criou5++;
                                                    }
                                                }
                                                if($criou5==0)
                                                    echo "<td name='sexta'>08:00-09:00</td>";
                                            }?>
                                            
                                        </tr>
                                        <tr>
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou6 = 0;
                                            
                                            if($criou6==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="09:00-10:00"){
                                                            echo "<td name='segunda' class='selection'>09:00-10:00</td>";
                                                            $criou6++;
                                                    }
                                                }
                                                if($criou6==0)
                                                    echo "<td name='segunda'>09:00-10:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou7 = 0;
                                            
                                            if($criou7==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="09:00-10:00"){
                                                            echo "<td name='terça' class='selection'>09:00-10:00</td>";
                                                            $criou7++;
                                                    }
                                                }
                                                if($criou7==0)
                                                    echo "<td name='terça'>09:00-10:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou8 = 0;
                                            
                                            if($criou8==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="09:00-10:00"){
                                                            echo "<td name='quarta' class='selection'>09:00-10:00</td>";
                                                            $criou8++;
                                                    }
                                                }
                                                if($criou8==0)
                                                    echo "<td name='quarta'>09:00-10:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou9 = 0;
                                            
                                            if($criou9==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="09:00-10:00"){
                                                            echo "<td name='quinta' class='selection'>09:00-10:00</td>";
                                                            $criou9++;
                                                    }
                                                }
                                                if($criou9==0)
                                                    echo "<td name='quinta'>09:00-10:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou10 = 0;
                                            
                                            if($criou10==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="09:00-10:00"){
                                                            echo "<td name='sexta' class='selection'>09:00-10:00</td>";
                                                            $criou10++;
                                                    }
                                                }
                                                if($criou10==0)
                                                    echo "<td name='sexta'>09:00-10:00</td>";
                                            }?>
                                        </tr>
                                        <tr>
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou11 = 0;
                                            
                                            if($criou11==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="10:00-11:00"){
                                                            echo "<td name='segunda' class='selection'>10:00-11:00</td>";
                                                            $criou11++;
                                                    }
                                                }
                                                if($criou11==0)
                                                    echo "<td name='segunda'>10:00-11:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou12 = 0;
                                            
                                            if($criou12==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="10:00-11:00"){
                                                            echo "<td name='terça' class='selection'>10:00-11:00</td>";
                                                            $criou12++;
                                                    }
                                                }
                                                if($criou12==0)
                                                    echo "<td name='terça'>10:00-11:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou13 = 0;
                                            
                                            if($criou13==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="10:00-11:00"){
                                                            echo "<td name='quarta' class='selection'>10:00-11:00</td>";
                                                            $criou13++;
                                                    }
                                                }
                                                if($criou13==0)
                                                    echo "<td name='quarta'>10:00-11:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou14 = 0;
                                            
                                            if($criou14==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="10:00-11:00"){
                                                            echo "<td name='quinta' class='selection'>10:00-11:00</td>";
                                                            $criou14++;
                                                    }
                                                }
                                                if($criou14==0)
                                                    echo "<td name='quinta'>10:00-11:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou15 = 0;
                                            
                                            if($criou15==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="10:00-11:00"){
                                                            echo "<td name='sexta' class='selection'>10:00-11:00</td>";
                                                            $criou15++;
                                                    }
                                                }
                                                if($criou15==0)
                                                    echo "<td name='sexta'>10:00-11:00</td>";
                                            }?>
                                        </tr>
                                        <tr>
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou16 = 0;
                                            
                                            if($criou16==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="11:00-12:00"){
                                                            echo "<td name='segunda' class='selection'>11:00-12:00</td>";
                                                            $criou16++;
                                                    }
                                                }
                                                if($criou16==0)
                                                    echo "<td name='segunda'>11:00-12:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou17 = 0;
                                            
                                            if($criou17==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="11:00-12:00"){
                                                            echo "<td name='terça' class='selection'>11:00-12:00</td>";
                                                            $criou17++;
                                                    }
                                                }
                                                if($criou17==0)
                                                    echo "<td name='terça'>11:00-12:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou18 = 0;
                                            
                                            if($criou18==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="11:00-12:00"){
                                                            echo "<td name='quarta' class='selection'>11:00-12:00</td>";
                                                            $criou18++;
                                                    }
                                                }
                                                if($criou18==0)
                                                    echo "<td name='quarta'>11:00-12:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou19 = 0;
                                            
                                            if($criou19==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="11:00-12:00"){
                                                            echo "<td name='quinta' class='selection'>11:00-12:00</td>";
                                                            $criou19++;
                                                    }
                                                }
                                                if($criou19==0)
                                                    echo "<td name='quinta'>11:00-12:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou20 = 0;
                                            
                                            if($criou20==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="11:00-12:00"){
                                                            echo "<td name='sexta' class='selection'>11:00-12:00</td>";
                                                            $criou20++;
                                                    }
                                                }
                                                if($criou20==0)
                                                    echo "<td name='sexta'>11:00-12:00</td>";
                                            }?>
                                        </tr>
                                        <tr>
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou21 = 0;
                                            
                                            if($criou21==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="14:00-15:00"){
                                                            echo "<td name='segunda' class='selection'>14:00-15:00</td>";
                                                            $criou21++;
                                                    }
                                                }
                                                if($criou21==0)
                                                    echo "<td name='segunda'>14:00-15:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou22 = 0;
                                            
                                            if($criou22==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="14:00-15:00"){
                                                            echo "<td name='terça' class='selection'>14:00-15:00</td>";
                                                            $criou22++;
                                                    }
                                                }
                                                if($criou22==0)
                                                    echo "<td name='terça'>14:00-15:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou23 = 0;
                                            
                                            if($criou23==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="14:00-15:00"){
                                                            echo "<td name='quarta' class='selection'>14:00-15:00</td>";
                                                            $criou23++;
                                                    }
                                                }
                                                if($criou23==0)
                                                    echo "<td name='quarta'>14:00-15:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou24 = 0;
                                            
                                            if($criou24==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="14:00-15:00"){
                                                            echo "<td name='quinta' class='selection'>14:00-15:00</td>";
                                                            $criou24++;
                                                    }
                                                }
                                                if($criou24==0)
                                                    echo "<td name='quinta'>14:00-15:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou25 = 0;
                                            
                                            if($criou25==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="14:00-15:00"){
                                                            echo "<td name='sexta' class='selection'>14:00-15:00</td>";
                                                            $criou25++;
                                                    }
                                                }
                                                if($criou25==0)
                                                    echo "<td name='sexta'>14:00-15:00</td>";
                                            }?>
                                        </tr>
                                        <tr>
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou26 = 0;
                                            
                                            if($criou26==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="15:00-16:00"){
                                                            echo "<td name='segunda' class='selection'>15:00-16:00</td>";
                                                            $criou26++;
                                                    }
                                                }
                                                if($criou26==0)
                                                    echo "<td name='segunda'>15:00-16:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou27 = 0;
                                            
                                            if($criou27==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="15:00-16:00"){
                                                            echo "<td name='terça' class='selection'>15:00-16:00</td>";
                                                            $criou27++;
                                                    }
                                                }
                                                if($criou27==0)
                                                    echo "<td name='terça'>15:00-16:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou28 = 0;
                                            
                                            if($criou28==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="15:00-16:00"){
                                                            echo "<td name='quarta' class='selection'>15:00-16:00</td>";
                                                            $criou28++;
                                                    }
                                                }
                                                if($criou28==0)
                                                    echo "<td name='quarta'>15:00-16:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou29 = 0;
                                            
                                            if($criou29==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="15:00-16:00"){
                                                            echo "<td name='quinta' class='selection'>15:00-16:00</td>";
                                                            $criou29++;
                                                    }
                                                }
                                                if($criou29==0)
                                                    echo "<td name='quinta'>15:00-16:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou30 = 0;
                                            
                                            if($criou30==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="15:00-16:00"){
                                                            echo "<td name='sexta' class='selection'>15:00-16:00</td>";
                                                            $criou30++;
                                                    }
                                                }
                                                if($criou30==0)
                                                    echo "<td name='sexta'>15:00-16:00</td>";
                                            }?>
                                        </tr>
                                        <tr>
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou31 = 0;
                                            
                                            if($criou31==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="16:00-17:00"){
                                                            echo "<td name='segunda' class='selection'>16:00-17:00</td>";
                                                            $criou31++;
                                                    }
                                                }
                                                if($criou31==0)
                                                    echo "<td name='segunda'>16:00-17:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou32 = 0;
                                            
                                            if($criou32==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="16:00-17:00"){
                                                            echo "<td name='terça' class='selection'>16:00-17:00</td>";
                                                            $criou32++;
                                                    }
                                                }
                                                if($criou32==0)
                                                    echo "<td name='terça'>16:00-17:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou33 = 0;
                                            
                                            if($criou33==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="16:00-17:00"){
                                                            echo "<td name='quarta' class='selection'>16:00-17:00</td>";
                                                            $criou33++;
                                                    }
                                                }
                                                if($criou33==0)
                                                    echo "<td name='quarta'>16:00-17:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou34 = 0;
                                            
                                            if($criou34==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="16:00-17:00"){
                                                            echo "<td name='quinta' class='selection'>16:00-17:00</td>";
                                                            $criou34++;
                                                    }
                                                }
                                                if($criou34==0)
                                                    echo "<td name='quinta'>16:00-17:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou35 = 0;
                                            
                                            if($criou35==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="16:00-17:00"){
                                                            echo "<td name='sexta' class='selection'>16:00-17:00</td>";
                                                            $criou35++;
                                                    }
                                                }
                                                if($criou35==0)
                                                    echo "<td name='sexta'>16:00-17:00</td>";
                                            }?>
                                        </tr>
                                        <tr>
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou36 = 0;
                                            
                                            if($criou36==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="17:00-18:00"){
                                                            echo "<td name='segunda' class='selection'>17:00-18:00</td>";
                                                            $criou36++;
                                                    }
                                                }
                                                if($criou36==0)
                                                    echo "<td name='segunda'>17:00-18:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou37 = 0;
                                            
                                            if($criou37==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="17:00-18:00"){
                                                            echo "<td name='terça' class='selection'>17:00-18:00</td>";
                                                            $criou37++;
                                                    }
                                                }
                                                if($criou37==0)
                                                    echo "<td name='terça'>17:00-18:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou38 = 0;
                                            
                                            if($criou38==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="17:00-18:00"){
                                                            echo "<td name='quarta' class='selection'>17:00-18:00</td>";
                                                            $criou38++;
                                                    }
                                                }
                                                if($criou38==0)
                                                    echo "<td name='quarta'>17:00-18:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou39 = 0;
                                            
                                            if($criou39==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="17:00-18:00"){
                                                            echo "<td name='quinta' class='selection'>17:00-18:00</td>";
                                                            $criou39++;
                                                    }
                                                }
                                                if($criou39==0)
                                                    echo "<td name='quinta'>17:00-18:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou40 = 0;
                                            
                                            if($criou40==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="17:00-18:00"){
                                                            echo "<td name='sexta' class='selection'>17:00-18:00</td>";
                                                            $criou40++;
                                                    }
                                                }
                                                if($criou40==0)
                                                    echo "<td name='sexta'>17:00-18:00</td>";
                                            }?>
                                        </tr>
                                        <tr>
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou41 = 0;
                                            
                                            if($criou41==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="18:00-19:00"){
                                                            echo "<td name='segunda' class='selection'>18:00-19:00</td>";
                                                            $criou41++;
                                                    }
                                                }
                                                if($criou41==0)
                                                    echo "<td name='segunda'>18:00-19:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou42 = 0;
                                            
                                            if($criou42==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="18:00-19:00"){
                                                            echo "<td name='terça' class='selection'>18:00-19:00</td>";
                                                            $criou42++;
                                                    }
                                                }
                                                if($criou42==0)
                                                    echo "<td name='terça'>18:00-19:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou43 = 0;
                                            
                                            if($criou43==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="18:00-19:00"){
                                                            echo "<td name='quarta' class='selection'>18:00-19:00</td>";
                                                            $criou43++;
                                                    }
                                                }
                                                if($criou43==0)
                                                    echo "<td name='quarta'>18:00-19:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou44 = 0;
                                            
                                            if($criou44==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="18:00-19:00"){
                                                            echo "<td name='quinta' class='selection'>18:00-19:00</td>";
                                                            $criou44++;
                                                    }
                                                }
                                                if($criou44==0)
                                                    echo "<td name='quinta'>18:00-19:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou45 = 0;
                                            
                                            if($criou45==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="18:00-19:00"){
                                                            echo "<td name='sexta' class='selection'>18:00-19:00</td>";
                                                            $criou45++;
                                                    }
                                                }
                                                if($criou45==0)
                                                    echo "<td name='sexta'>18:00-19:00</td>";
                                            }?>
                                        </tr>
                                        <tr>
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou46 = 0;
                                            
                                            if($criou46==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="segunda" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="19:00-20:00"){
                                                            echo "<td name='segunda' class='selection'>19:00-20:00</td>";
                                                            $criou46++;
                                                    }
                                                }
                                                if($criou46==0)
                                                    echo "<td name='segunda'>19:00-20:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou47 = 0;
                                            
                                            if($criou47==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="terça" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="19:00-20:00"){
                                                            echo "<td name='terça' class='selection'>19:00-20:00</td>";
                                                            $criou47++;
                                                    }
                                                }
                                                if($criou47==0)
                                                    echo "<td name='terça'>19:00-20:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou48 = 0;
                                            
                                            if($criou48==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quarta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="19:00-20:00"){
                                                            echo "<td name='quarta' class='selection'>19:00-20:00</td>";
                                                            $criou48++;
                                                    }
                                                }
                                                if($criou48==0)
                                                    echo "<td name='quarta'>19:00-20:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou49 = 0;
                                            
                                            if($criou49==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="quinta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="19:00-20:00"){
                                                            echo "<td name='quinta' class='selection'>19:00-20:00</td>";
                                                            $criou49++;
                                                    }
                                                }
                                                if($criou49==0)
                                                    echo "<td name='quinta'>19:00-20:00</td>";
                                            }?>
                                            
                                            <?php
                                            //se criou = 0 , tem liberdade para criar com ou sem selection dependendo da condição if
                                            $criou50 = 0;
                                            
                                            if($criou50==0){
                                                for($i=0; $i<@mysql_num_rows($objCtrlDisp->getResposta());$i++){
                                                    if(utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'diaDaSemana'))=="sexta" && 
                                                        utf8_encode(mysql_result($objCtrlDisp->getResposta(),$i,'descricao'))=="19:00-20:00"){
                                                            echo "<td name='sexta' class='selection'>19:00-20:00</td>";
                                                            $criou50++;
                                                    }
                                                }
                                                if($criou50==0)
                                                    echo "<td name='sexta'>19:00-20:00</td>";
                                            }?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                                <input id="cadEnvDisp" type="submit" name="btnEnviar" value="Enviar" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>