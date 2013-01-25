<?php
    require 'ValidaSession.php';
    require_once '../controller/AlunoCtrl.php';
        
    $AlunoCtrl = new AlunoCrtl();
    $res = $AlunoCtrl->listarAlunoAjax($_GET["alunoID"]);   
?>

       
    <b>Nome:</b> <span id="consNome"> <?php echo $res['nome'] ?> </span> <b>Sexo:</b> <span id="consSex"> <?php echo $res['sexo'] ?> </span>
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
    <b>Nome:</b> <span id="consNomeRes"> José </span> <b>Sexo:</b> <span id="consSexRes"> <?php echo $res['telefoneResidencial'] ?> </span>
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