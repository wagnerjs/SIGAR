<?php
	require 'ValidaSession.php';
        require_once '../controller/AlunoCtrl.php';
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
  <link rel="shortcut icon" href="img/favicon.ico" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/estilo.css" rel="stylesheet" media="screen">
  <script src="js/jquery-latest.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.quicksearch.js"></script>
  <script src="js/base.js"></script>
  <link href="css/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
  <!--<script type="text/javascript" src="js/tablecloth.js"></script>-->
</head>

<body>


<a href="#dialog" name="modal">View Consulta</a>

<div id="boxes">

<div id="dialog" class="window">
    <div>
    <a href="#"class="close"/>Fechar</a>

    <b>Nome:</b> <span id="consNome"> José </span> <b>Sexo:</b> <span id="consSex"> M </span>
    <br/>
    <b>Data de nascimento:</b> <span id="consData"> 10/12/1990 </span>
    <br/>
    <b>Email:</b> <span id="consMail"> jose@gmail.com </span>
    <br/>
    <b>Tel. Residencial:</b> <span id="consTelRes"> (61)3458-8796 </span>
    <br/>
    <b>Tel. Celular:</b> <span id="consTelCel"> (61)3458-8796 </span>
    <br/>
    <b>Ano Escolar:</b> <span id="consAno"> 1º Ano do Ensino Médio </span>
    <br/>
    <b>Escola:</b> <span id="consEscola"> Leonardo da Vinci </span>
    <br/>
    <b>Logradouro:</b> <span id="consLogradouro"> Teste </span>
    <br/>
    <b>Nº:</b> <span id="consN"> 16 </span>
    <br/>
    <b>Complemento:</b> <span id="consComp"> Teste </span>
    <br/>
    <b>Bairro:</b> <span id="consBairro"> Teste </span>
    <br/>
    <b>Cidade:</b> <span id="consCidade"> Teste </span>
    <br/>
    <b>UF:</b><span id="consUF"> DF </span> <b>CEP:</b> <span id="consCEP"> 85454148 </span>
    <br/>
    <b>Referência:</b> <span id="consRef"> Teste </span>
    <br/><br/>
    <b>Dados do responsável</b>
    <hr/>
    <b>Nome:</b> <span id="consNomeRes"> José </span> <b>Sexo:</b> <span id="consSexRes"> M </span>
    <br/>
    <b>Data de nascimento:</b> <span id="consDataRes"> Teste </span>
    <br/>
    <b>Parentesco:</b> <span id="consParent"> Teste </span>
    <br/>
    <b>CPF:</b> <span id="consCPF"> Teste </span>
    <br/>
    <b>Email:</b> <span id="consMailRes"> jose@gmail.com </span>
    <br/>
    <b>Tel. Residencial:</b> <span id="consTelResRes"> (61)3458-8796 </span>
    <br/>
    <b>Tel. Celular:</b> <span id="consTelCelRes"> (61)3458-8796 </span>
    <br/>
    <b>Tel. Trabalho:</b> <span id="consTelTrab"> (61)3458-8796 </span>
    <br/>
    <br/>
    <input type="button" name="editar" id="editar" />
    <input type="button" name="excluir" id="excluir" />    
    </div>
</div>

<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>
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
                            Pesquisar aluno: 
                            <form action="#">
                                <fieldset>
                                    <input type="text" name="search" value="" id="id_search" placeholder="Search" autofocus />
                                </fieldset>
                            </form>
                            <table border="1" id="table_example">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Escola</th>
                                        <th>Escolaridade</th>
                                        <th>Data Nascimento</th>
                                        <th>Sexo</th>
                                        <th>Telefone Residencial</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php
                                    $AlunoCtrl = new AlunoCrtl();
                                        $AlunoCtrl->listarAluno();

                                    if(mysql_num_rows($AlunoCtrl->getResposta())>0){
                                        for($i=0; $i<mysql_num_rows($AlunoCtrl->getResposta());$i++){
                                    ?>
                                    <tr>
                                        <td><a href="#"><?php echo utf8_encode(mysql_result($AlunoCtrl->getResposta(),$i,'nome'));?></a></td>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>