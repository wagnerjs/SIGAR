<?php
	$url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
	require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/EstatisticaCtrl.php';
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
  <script src="../js/email.js"></script>
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
                                        <thead>
                                            <tr>
                                                <td align="rigth">
                                                    <select name="fonte" onChange="alterarFonte(this.options[this.selectedIndex].value)">
                                                        <option value="Arial">Arial</option>
                                                        <option value="Courier">Courier</option>
                                                        <option value="Sans Serif">Sans Serif</option>
                                                        <option value="Tahoma">Tahoma</option>
                                                        <option value="Times New Roman">Times New Roman</option>
                                                        <option value="Verdana">Verdana</option>
                                                    </select>
                                                    &nbsp;
                                                    <select name="tamanho" onChange="alterarTamanho(this.options[this.selectedIndex].value)">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                    <img src="../img/enviarEmail/recortar.gif" onClick="recortar()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/copiar.gif" onClick="copiar()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/colar.gif" onClick="colar()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/desfazer.gif" onClick="desfazer()" style="cursor:hand">
                                                    <br><img src="../img/enviarEmail/refazer.gif" onClick="refazer()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/negrito.gif" onClick="negrito()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/italico.gif" onClick="italico()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/sublinhado.gif" onClick="sublinhado()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/alinhamentoesquerda.gif" onClick="alinharEsquerda();" style="cursor:hand">
                                                    <img src="../img/enviarEmail/centralizado.gif" onClick="centralizado()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/alinhamentodireita.gif" onClick="alinharDireita()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/numeracao.gif" onClick="numeracao()" style="cursor:hand">
                                                    <img src="../img/enviarEmail/marcador.gif" onClick="marcadores()" style="cursor:hand">
                                                </td>
                                                <td colspan="3"><b><center>SELEÇÃO DE EMAILS</center></b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>&nbsp</td>
                                            <td align="center" width="300"><b><center>Lista Geral</center></b></td>
                                            <td>&nbsp</td>
                                            <td align="center" width="500"><b><center>Selecionados</center></b></td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <!--<iframe id="editor" name="editor" frameborder="0" style="border:1px solid; width: 300px; height:180px"></iframe>-->
                                                <textarea id="editor" name="editor" frameborder="0" style="border:1px solid; width: 300px; height:180px"></textarea>
                                            </td>
                                            <form name="frmMalaDireta" method="post" onsubmit="return gravar()" action="EnviarEmail.php">
                                                    <input type="hidden" id="action" name="action" value="gravar_inscricao" />
                                                    <input type="hidden" id="tt_disponiveis" name="tt_disponiveis" />
                                                    <input type="hidden" id="tt_selecionadas" name="tt_selecionadas" />
                                            <td align="center" width="300">
                                                    <select id="email_disponivel" multiple="multiple" size="11" style="width: 185px">
                                                            <?php ?>
                                                            <option value="lista de emails"> lista de emails </option>
                                                            	
                                                    </select>
                                            </td>
                                            <td align="center">
                                                    <input type="button" class="botao" id="btnIncluirSelecionados" name="btnIncluirSelecionados" onclick="incluirSelecionados()" value=">" style="width: 35px"><br><br>
                                                    <input type="button" class="botao" id="btnIncluirTodos" name="btnIncluirTodos" onclick="incluirTodos()" value=">>" style="width: 35px" /><br><br>
                                                    <input type="button" class="botao" id="btnExcluirTodos" name="btnExcluirTodos" onclick="excluirTodos()" value="<<" style="width: 35px" /><br><br>
                                                    <input type="button" class="botao" id="btnExcluirSelecionados" name="btnExcluirSelecionados" onclick="excluirSelecionados()" value="<" style="width: 35px" />
                                            </td>
                                            <td align="center" width="500">
                                                    <select id="email_selecionado" multiple="multiple" size="11" style="width: 180px">
                                                            <?php  ?>
                                                                    <option value=""> emais selecionados </option>
                                                            
                                                    </select>
                                            </td>
                                    </tr>
                                        </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
</body>
</html>