<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/AlunoCtrl.php';
        
    $AlunoCtrl = new AlunoCrtl();
    $res = $AlunoCtrl->listarAlunoAjax($_GET["alunoID"]); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Listar dados do Aluno</title>
  <meta name="description" content="" />
  <meta name="author" content="Fellype" />

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
  <script src="../js/base.js"></script>
  <script src="../js/formCadastroAluno.js"></script>
</head>
<body>
        <div class="container">
            <a href="../TelaPrincipal.php"><img src="../img/logo.png" vspace="50"/></a>
            <p class="status">Logado como:<b> <?php echo $ObjSessao->getUsuario();?> | <a href= "../Logoff.php" >Sair</b></a></p>
            <div id="sysBox">
                <div class="inner">
                    <br/>
                    <a href="#"><span class="selected">Cadastrar Alunos</span></a>
                    <a href="PesquisaAluno.php"><span class="normal">Pesquisar Alunos</span></a>
                    <div class="content">
                        <div>                           
                            <form name="form1" action="CadastroAluno.php" method="post">
                                    <b>Dados do Aluno</b>
                                    <hr/>
                                    <div class="row-fluid show-grid">
                                        <div class="span6">
                                    Nome:<br/> <span><input type="text" name="txtNome" size="10" maxlength="50" id="inputNome" class="necessary" value="<?php echo $res['nome'] ?>" disabled></span><br>
                                    Sexo: <?php if($res['sexo']=='m'){ ?>
                                        <input type="radio" name="sexo" value="m" class="necessary" checked disabled> Masculino
                                        <input type="radio" name="sexo" value="f" class="necessary" disabled> Feminino<br/><br/>
                                        <?php }else{?>
                                        <input type="radio" name="sexo" value="m" class="necessary" disabled> Masculino
                                        <input type="radio" name="sexo" value="f" class="necessary" checked disabled> Feminino<br/><br/>
                                        <?php }?>
                                    Data de Nascimento:<br/> <span><input type="text" name="dataNasc" size="10" maxlength="10" onkeyup="mascaraData(this);" class="necessary" id="inputDataNascResp" value="<?php echo $res['dataNascimento'] ?>" disabled></span><br>
                                    Email:<br/> <span><input type="text" name="email" size="10" maxlength="50" id="inputEmail" class="necessary"></span><br>
                                    Telefone Residecial:<br/> <span><input type="text"  name="telResidencial" size="10" maxlength="14" onkeypress="mascara(this, mtel );" id="inputTelRes" class="necessary"></span><br>
                                    Telefone Celular:<br/> <span><input type="text"  name="telCelular" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel"></span><br>
                                    Ano Escolar:
                                    <select name="anoEscolar" disabled>
                                    <?php if($res['anoEscolar']=='1ef'){ ?>
                                        <option value="1ef" selected>1º ano do Ensino Fundamental</option>
                                    <?php }else if($res['anoEscolar']=='2ef'){ ?>
                                        <option value="2ef" selected>2º ano do Ensino Fundamental</option>
                                    <?php }else if($res['anoEscolar']=='3ef'){ ?>
                                    <option value="3ef" selected>3º ano do Ensino Fundamental</option>
                                    <?php }else if($res['anoEscolar']=='4ef'){ ?>
                                    <option value="4ef" selected>4º ano do Ensino Fundamental</option>
                                    <?php }else if($res['anoEscolar']=='5ef'){ ?>
                                    <option value="5ef" selected>5º ano do Ensino Fundamental</option>
                                    <?php }else if($res['anoEscolar']=='6ef'){ ?>
                                    <option value="6ef" selected>6º ano do Ensino Fundamental</option>
                                    <?php }else if($res['anoEscolar']=='7ef'){ ?>
                                    <option value="7ef" selected>7º ano do Ensino Fundamental</option>
                                    <?php }else if($res['anoEscolar']=='8ef'){ ?>
                                    <option value="8ef" selected>8º ano do Ensino Fundamental</option>
                                    <?php }else if($res['anoEscolar']=='9ef'){ ?>
                                    <option value="9ef" selected>9º ano do Ensino Fundamental</option>
                                    <?php }else if($res['anoEscolar']=='1em'){ ?>
                                    <option value="1em" selected>1º ano do Ensino Médio</option>
                                    <?php }else if($res['anoEscolar']=='2em'){ ?>
                                    <option value="2em" selected>2ºano do Ensino Médio</option>
                                    <?php }else if($res['anoEscolar']=='3em'){ ?>
                                    <option value="3em" selected>3º ano do Ensino Médio</option>
                                    <?php }else{ ?>
                                    <option value= "outros"> Outros</option>
                                    <?php } ?>
                                    </select><br/>
                                    Escola:<br/> <span><input type="text" name="escola" size="8" maxlength="100" id="inputEscola" class="necessary" >
                                        </div>
                                        <div class="span6">
                                        Logradouro:<br/> <span><input type="text" name="endereco" id="inputEndereco" class="necessary"></span><br/>
                                        Nº:<br/> <span><input type="text" name="numero" id="inputN" class="necessary"></span><br/>
                                        Complemento:<br/> <span><input type="text" name="complemento"></span><br/>
                                        Bairro:<br/> <span><input type="text" name="bairro" id="inputBairro" class="necessary"></span><br/>
                                        Cidade:<br/> <span><input type="text" name="cidade" id="inputCidade" class="necessary" ></span><br/>
                                        UF: <span><select id="inputUf" name="uf" class="necessary">
                                                <option value=""></option>
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AM">AM</option>
                                                <option value="AP">AP</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MG">MG</option>
                                                <option value="MS">MS</option>
                                                <option value="MT">MT</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="PR">PR</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SE">SE</option>
                                                <option value="SP">SP</option>
                                                <option value="TO">TO</option>
                                         </select></span><br/>
                                         CEP:<br/> <span><input type="text" name="cep" id="inputCep" class="necessary"></span><br/>
                                         Referência:<br/> <input type="text" name="referencia"><br/><br/></div>
                                         </div>
                                         <b>Dados do Responsável</b>
                                         <hr/>
                                         <div class="row-fluid show-grid">
                                            <div class="span6">
                                            Nome:<br/> <span><input type="text" name="txtNomeResp" size="10" maxlength="50" id="inputNomeResp" class="necessary"></span><br/>
                                            Data de Nascimento:<br/> <span><input type="text" name="dataNascResp" size="10" maxlength="10" class="necessary" id="inputDataNascResp"></span><br/>
                                            Sexo: <input type="radio" name="sexoResp" value="m" class="necessary"> Masculino
                                                  <input type="radio" name="sexoResp" value="f" class="necessary"> Feminino<br/><br/>
                                            Parentesco: <input type="radio" name="parentesco" value="pai" class="necessary"> Pai
                                            <input type="radio" name="parentesco" value="mae" class="necessary"> Mae
                                            <input type="radio" name="parentesco" value="outro" class="necessary"> Outro<br/><br/>
                                            CPF:<br/> <span><input type="text" name="cpfResp" size="15" maxlength="15" id="inputCpf" class="necessary"></span><br/>
                                            Email:<br/> <span><input type="text" name="emailResp" size="10" maxlength="50" id="inputEmailResp" class="necessary"></span><br/>
                                            Telefone Residencial:<br/> <span><input type="text" name="telResResp" size="10" maxlength="14" class="necessary" onkeypress="mascara(this, mtel );" id="inputTelResp"></span><br>
                                            Telefone Celular:<br/> <input type="text"  name="telCelResp" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel"><br>
                                            Telefone Trabalho:<br/> <input type="text" name="telTrabResp" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel"><br>
                                            Mesmo endereço do Aluno?: <input type="radio" name="mesmoEnd" value="sim" id="closeEndResp" class="necessary"> Sim
                                            <input type="radio" name="mesmoEnd" value="nao" id="openEndResp" class="necessary"> Não<br/><br/>
                                            </div>
                                            <div class="span6" id="endResp">    
                                            Logradouro: <br/><span><input type="text" name="enderecoResp" id="inputEndereco" class="necessary" ></span><br/>
                                            Nº:<br/> <span><input type="text" name="numeroResp" id="inputNResp" class="necessary"></span><br/>
                                            Complemento: <br/><span><input type="text" name="complementoResp"></span><br/>
                                            Bairro: <br/><span><input type="text" name="bairroResp" id="inputBairro" class="necessary"></span><br/>
                                            Cidade: <br/><span><input type="text" name="cidadeResp" id="inputCidade" class="necessary"></span><br/>
                                            UF: <span><select id="inputUf" name="ufResp" id="uf" class="necessary">
                                                <option value=""></option>
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AM">AM</option>
                                                <option value="AP">AP</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MG">MG</option>
                                                <option value="MS">MS</option>
                                                <option value="MT">MT</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="PR">PR</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SE">SE</option>
                                                <option value="SP">SP</option>
                                                <option value="TO">TO</option>
                                         </select></span><br/>
                                        CEP:<br/> <span><input type="text" name="cepResp" id="inputCepResp" class="necessary"></span><br/>
                                        Referência: <br/><input type="text" name="referenciaResp"><br/><br/></div>
                                        </div>
                                    </div>
                                    <div class="submits">
                                        <input type="submit" name="enviar" value="Enviar" id="cadEnv" />
                                        <input type="reset" name="limpar" value="Limpar" id="limpar" />
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>

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