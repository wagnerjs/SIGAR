<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require $url.'/controller/EmailCtrl.php';
    if (isset($_POST['btnEnviar'])) {
        echo "<script type='text/javascript'>alert('E-mail enviado com sucesso!');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Enviar email</title>
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
  <script src="../js/email.js"></script>
  <script src="../js/formCadastroAluno.js"></script>
  <script src="../js/prototype.js"></script>
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
                    <div class="content">
                        <div class="spaces">
                            <form action="EnviarEmail.php" name="formEdit" id="formEdit" method="post">
                                <table border="1" id="table_example">
                                    <tr>
                                       <td align="center" rowspan="3">
                                                <div id="menu"></div>
                                                <div id="sample">
                                                    <div id="myArea1" style="width: 300px; height: 280px; border: 1px solid #000;">
                                                            Digite o conteúdo do e-mail que você deseja enviar!
                                                    </div>

                                                    <script src="nicEdit.js" type="text/javascript"></script>
                                                    <script>

                                                    var area1, area2;

                                                    function toggleArea1() {
                                                            if(!area1) {
                                                                    area1 = new nicEditor({fullPanel : true}).panelInstance('myArea1',{hasPanel : true});
                                                            } else {
                                                                    area1.removeInstance('myArea1');
                                                                    area1 = null;
                                                            }
                                                    }

                                                    function addArea2() {
                                                            area2 = new nicEditor({fullPanel : true}).panelInstance('myArea2');
                                                    }
                                                    function removeArea2() {
                                                            area2.removeInstance('myArea2');
                                                    }

                                                    bkLib.onDomLoaded(function() { toggleArea1(); });

                                                    </script>	
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <b><center>SELEÇÃO DE EMAILS</center></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" width="300"><b><center>Lista Geral</center></b></td>
                                            <td>&nbsp</td>
                                            <td align="center" width="500"><b><center>Selecionados</center></b></td>
                                        </tr>
                                        <tr align="center">
                                            <form name="frmMalaDireta" method="post" onsubmit="return gravar()" action="EnviarEmail.php">
                                            <input type="hidden" id="action" name="action" value="gravar_inscricao" />
                                            <input type="hidden" id="tt_disponiveis" name="tt_disponiveis" />
                                            <input type="hidden" id="tt_selecionadas" name="tt_selecionadas" />
                                            <td align="center">
                                                <select id="email_disponivel" multiple="multiple" size="11" style="width: 220px; height: 300px;">
                                                    <?php 
                                                    $emailCtrl = new EmailCtrl();
                                                    $emailCtrl->criarListaEmails();
                                                    
                                                    if(@mysql_num_rows($emailCtrl->getResposta())>0){
                                                        for($i=0; $i<mysql_num_rows($emailCtrl->getResposta());$i++){
                                                        ?>
                                                        <option name="emailDisponivel[]" value="<?php echo utf8_encode(mysql_result($emailCtrl->getResposta(),$i,'idPessoa'));?>"> <?php echo utf8_encode(mysql_result($emailCtrl->getResposta(),$i,'email'));?> </option>
                                                        <?php   
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td align="center">
                                                <input type="button" class="botao" id="btnIncluirSelecionados" name="btnIncluirSelecionados" onclick="incluirSelecionados()" value=">" style="width: 35px"><br><br>
                                                <input type="button" class="botao" id="btnIncluirTodos" name="btnIncluirTodos" onclick="incluirTodos()" value=">>" style="width: 35px" /><br><br>
                                                <input type="button" class="botao" id="btnExcluirTodos" name="btnExcluirTodos" onclick="excluirTodos()" value="<<" style="width: 35px" /><br><br>
                                                <input type="button" class="botao" id="btnExcluirSelecionados" name="btnExcluirSelecionados" onclick="excluirSelecionados()" value="<" style="width: 35px" />
                                            </td>
                                            <td align="center">
                                                <select id="email_selecionado" multiple="multiple" size="11" style="width: 220px; height: 300px;">
                                                    <?php  ?>
                                                    <option name="emailSelecionado[]" value=""></option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                <input type="submit" name="btnEnviar" value="Enviar" id="cadEnv" />
                            </form>
                        </div>
                    </div>
                </div>    
            </div>    
        </div>
</body>
</html>