<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
	require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/AlunoCtrl.php';
        
    $AlunoCtrl = new AlunoCrtl();
    $res = $AlunoCtrl->listarAlunoAjax($_GET["alunoID"]); 
    
    if(isset($_POST['excluir'])){
        $retorno = $AlunoCtrl->apagarAluno($_GET["alunoID"]);
        if($retorno>1){
            $resposta = "<font color=green><b>Aluno deletado com sucesso!</b></font>";
        }
    }
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
  </head>

<body>
    <form name="form1" action="ListarAlunoAjax.php" method="post">
        <b>Nome:</b> <span id="consNome"> <?php echo $res['nome'] ?> </span> 
        <br/>
        <b>Sexo:</b> <span id="consSex"> <?php echo $res['sexo'] ?> </span>
        <br/>
        <b>Data de nascimento:</b> <span id="consData"> <?php echo $res['dataNascimento'] ?> </span>
        <br/>
        <b>Email:</b> <span id="consMail"> <?php echo $res['dataNascimento'] ?> </span>
        <br/>
        <b>Tel. Residencial:</b> <span id="consTelRes"> <?php echo $res['telefoneResidencial'] ?> </span>
        <br/>
        <b>Tel. Celular:</b> <span id="consTelCel"> <?php echo $res['telefoneCelular'] ?> </span>
        <br/>
        <b>Ano Escolar:</b> <span id="consAno"> <?php echo $res['anoEscolar'] ?> </span>
        <br/>
        <b>Escola:</b> <span id="consEscola"> <?php echo $res['escola'] ?> </span>
        <br/>
        <b>Logradouro:</b> <span id="consLogradouro"> <?php echo $res['logradouro'] ?> </span>
        <br/>
        <b>Nº:</b> <span id="consN"> <?php echo $res['numero'] ?> </span>
        <br/>
        <b>Complemento:</b> <span id="consComp"> <?php echo $res['complemento'] ?> </span>
        <br/>
        <b>Bairro:</b> <span id="consBairro"> <?php echo $res['bairro'] ?> </span>
        <br/>
        <b>Cidade:</b> <span id="consCidade"> <?php echo $res['cidade'] ?> </span>
        <br/>
        <b>UF:</b><span id="consUF"> <?php echo $res['uf'] ?> </span> <b>CEP:</b> <span id="consCEP"> <?php echo $res['cep'] ?> </span>
        <br/>
        <b>Referência:</b> <span id="consRef"> <?php echo $res['referencia'] ?> </span>
        <br/><br/>
        <b>Dados do responsável</b>
        <hr/>
        <b>Nome:</b> <span id="consNomeRes"> Jose </span> 
        <br/>
        <b>Sexo:</b> <span id="consSexRes"> M </span>
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
        <input type="button" name="editar" id="editar" value="Editar" />
        <input type="button" name="excluir" id="excluir" value="Excluir" />
    </form>
</body>
</html>