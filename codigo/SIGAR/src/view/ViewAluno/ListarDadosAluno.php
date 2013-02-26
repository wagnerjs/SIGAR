<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/AlunoCtrl.php';
        
    $AlunoCtrl = new AlunoCrtl();
    $res = $AlunoCtrl->listarAlunoAjax($_GET["alunoID"]);
    $dadosResponsavel = $AlunoCtrl->listarResponsavel($_GET["alunoID"]);
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
                    <a href="CadastroAluno.php"><span class="normal">    Cadastrar Aluno  </span></a>
                    <a href="PesquisaAluno.php"><span class="selected">    Pesquisar Aluno  </span></a>
                    <div class="content">
                        <div>                           
                            <form class="spaces" name="form1" action="CadastroAluno.php" method="post">
                                    <b>Dados do Aluno</b>
                                    <hr/>
                                    <div class="row-fluid show-grid">
                                        <div class="span6">
                                    Nome:<br/> <span><input type="text" name="txtNome" size="10" maxlength="50" id="inputNome" class="necessary" value="<?php echo utf8_encode($res['nome']); ?>" disabled></span><br>
                                    Sexo: <?php if($res['sexo']=='m'){ ?>
                                           <input type="radio" name="sexo" value="m" class="necessary" disabled checked> Masculino
                                           <input type="radio" name="sexo" value="f" class="necessary" disabled> Feminino<br/><br/>
                                        <?php }else{?>
                                            <input type="radio" name="sexo" value="m" class="necessary" disabled> Masculino
                                            <input type="radio" name="sexo" value="f" class="necessary" disabled checked> Feminino<br/><br/>
                                        <?php }?>
                                    Data de Nascimento:<br/> <span><input type="text" name="dataNasc" size="10" maxlength="10" onkeyup="mascaraData(this);" class="necessary" id="inputDataNascResp" value="<?php 
                                    $dataBanco = $res['dataNascimento'];
                                    $dataNascimento = implode("/",array_reverse(explode("-",$dataBanco)));
                                    echo $dataNascimento; ?>" disabled></span><br>
                                    Email:<br/> <span><input type="text" name="email" size="10" maxlength="50" id="inputEmail" class="necessary" value="<?php echo utf8_encode($res['email']); ?>" disabled></span><br>
                                    Telefone Residecial:<br/> <span><input type="text"  name="telResidencial" size="10" maxlength="14" onkeypress="mascara(this, mtel );" id="inputTelRes" class="necessary" value="<?php echo $res['telefoneResidencial'] ?>" disabled></span><br>
                                    Telefone Celular:<br/> <span><input type="text"  name="telCelular" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel" value="<?php echo $res['telefoneCelular'] ?>" disabled></span><br>
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
                                    Escola:<br/> <span><input type="text" name="escola" size="8" maxlength="100" id="inputEscola" class="necessary" value="<?php echo utf8_encode($res['escola']); ?>" disabled>
                                    </div>
                                    <div class="span6">
                                    Logradouro:<br/> <span><input type="text" name="endereco" id="inputEndereco" class="necessary" value="<?php echo utf8_encode($res['logradouro']); ?>" disabled></span><br/>
                                    Nº:<br/> <span><input type="text" name="numero" id="inputN" class="necessary" value="<?php echo $res['numero'] ?>" disabled></span><br/>
                                    Complemento:<br/> <span><input type="text" name="complemento" value="<?php echo utf8_encode($res['complemento']); ?>" disabled></span><br/>
                                    Bairro:<br/> <span><input type="text" name="bairro" id="inputBairro" class="necessary" value="<?php echo utf8_encode($res['bairro']); ?>" disabled></span><br/>
                                    Cidade:<br/> <span><input type="text" name="cidade" id="inputCidade" class="necessary" value="<?php echo utf8_encode($res['cidade']); ?>" disabled></span><br/>
                                    UF: <span><select id="inputUf" name="uf" class="necessary" disabled>
                                             <?php if($res['uf']=='AC'){ ?>
                                            <option value="AC" selected>AC</option>
                                            <?php }else if($res['uf']=='AL'){ ?>
                                            <option value="AL" selected>AL</option>
                                            <?php }else if($res['uf']=='AM'){ ?>
                                            <option value="AM" selected>AM</option>
                                            <?php }else if($res['uf']=='AP'){ ?>
                                            <option value="AP" selected>AP</option>
                                            <?php }else if($res['uf']=='BA'){ ?>
                                            <option value="BA" selected>BA</option>
                                            <?php }else if($res['uf']=='CE'){ ?>
                                            <option value="CE" selected>CE</option>
                                            <?php }else if($res['uf']=='DF'){ ?>
                                            <option value="DF" selected>DF</option>
                                            <?php }else if($res['uf']=='ES'){ ?>
                                            <option value="ES" selected>ES</option>
                                            <?php }else if($res['uf']=='GO'){ ?>
                                            <option value="GO" selected>GO</option>
                                            <?php }else if($res['uf']=='MA'){ ?>
                                            <option value="MA" selected>MA</option>
                                            <?php }else if($res['uf']=='MG'){ ?>
                                            <option value="MG" selected>MG</option>
                                            <?php }else if($res['uf']=='MS'){ ?>
                                            <option value="MS" selected>MS</option>
                                            <?php }else if($res['uf']=='MT'){ ?>
                                            <option value="MT" selected>MT</option>
                                            <?php }else if($res['uf']=='PA'){ ?>
                                            <option value="PA" selected>PA</option>
                                            <?php }else if($res['uf']=='PB'){ ?>
                                            <option value="PB" selected>PB</option>
                                            <?php }else if($res['uf']=='PE'){ ?>
                                            <option value="PE" selected>PE</option>
                                            <?php }else if($res['uf']=='PI'){ ?>
                                            <option value="PI" selected>PI</option>
                                            <?php }else if($res['uf']=='PR'){ ?>
                                            <option value="PR" selected>PR</option>
                                            <?php }else if($res['uf']=='RJ'){ ?>
                                            <option value="RJ" selected>RJ</option>
                                            <?php }else if($res['uf']=='RN'){ ?>
                                            <option value="RN" selected>RN</option>
                                            <?php }else if($res['uf']=='RS'){ ?>
                                            <option value="RS" selected>RS</option>
                                            <?php }else if($res['uf']=='RO'){ ?>
                                            <option value="RO" selected>RO</option>
                                            <?php }else if($res['uf']=='RR'){ ?>
                                            <option value="RR" selected>RR</option>
                                            <?php }else if($res['uf']=='SC'){ ?>
                                            <option value="SC" selected>SC</option>
                                            <?php }else if($res['uf']=='SE'){ ?>
                                            <option value="SE" selected>SE</option>
                                            <?php }else if($res['uf']=='SP'){ ?>
                                            <option value="SP" selected>SP</option>
                                            <?php }else{ ?>
                                            <option value="TO" selected>TO</option>
                                             <?php } ?>
                                         </select></span><br/>
                                         CEP:<br/> <span><input type="text" name="cep" id="inputCep" class="necessary" value="<?php echo $res['cep'] ?>" disabled></span><br/>
                                         Referência:<br/> <input type="text" name="referencia" value="<?php echo utf8_encode($res['referencia']); ?>" disabled><br/><br/></div>
                                         </div>
                                         <b>Dados do Responsável</b>
                                         <hr/>
                                         <div class="row-fluid show-grid">
                                            <div class="span6">
                                            Nome:<br/> <span><input type="text" name="txtNomeResp" size="10" maxlength="50" id="inputNomeResp" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['nome']); ?>" disabled></span><br/>
                                            Data de Nascimento:<br/> <span><input type="text" name="dataNasc" size="10" maxlength="10" onkeyup="mascaraData(this);" class="necessary" id="inputDataNascResp" value="<?php 
                                            $dataBancoRes = $dadosResponsavel['dataNascimento'];
                                            $dataNascimentoRes = implode("/",array_reverse(explode("-",$dataBancoRes)));
                                            echo $dataNascimentoRes; ?>" disabled></span><br>
                                            Sexo: <?php if($dadosResponsavel['sexo']=='m'){ ?>
                                            <input type="radio" name="sexoResp" value="m" class="necessary" checked disabled> Masculino
                                            <input type="radio" name="sexoResp" value="f" class="necessary" disabled> Feminino<br/><br/>
                                            <?php }else{?>
                                            <input type="radio" name="sexo" value="m" class="necessary" disabled> Masculino
                                            <input type="radio" name="sexo" value="f" class="necessary" checked disabled> Feminino<br/><br/>
                                            <?php }?>
                                            Parentesco:<?php if($dadosResponsavel['categoria']=='pai'){ ?>
                                            <input type="radio" name="parentesco" value="pai" class="necessary" checked disabled> Pai
                                            <input type="radio" name="parentesco" value="mae" class="necessary" disabled> Mae
                                            <input type="radio" name="parentesco" value="outro" class="necessary" disabled> Outro<br/><br/>
                                            <?php }else if($dadosResponsavel['categoria']=='mae'){?>
                                            <input type="radio" name="parentesco" value="pai" class="necessary" disabled> Pai
                                            <input type="radio" name="parentesco" value="mae" class="necessary" checked disabled> Mae
                                            <input type="radio" name="parentesco" value="outro" class="necessary" disabled> Outro<br/><br/>
                                            <?php }else{?>
                                            <input type="radio" name="parentesco" value="pai" class="necessary" disabled> Pai
                                            <input type="radio" name="parentesco" value="mae" class="necessary" disabled> Mae
                                            <input type="radio" name="parentesco" value="outro" class="necessary" disabled checked> Outro<br/><br/>
                                            <?php }?>
                                            CPF:<br/> <span><input type="text" name="cpfResp" size="15" maxlength="15" id="inputCpf" class="necessary" value="<?php echo $dadosResponsavel['cpf'] ?>" disabled></span><br/>
                                            Email:<br/> <span><input type="text" name="emailResp" size="10" maxlength="50" id="inputEmailResp" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['email']); ?>" disabled></span><br/>
                                            Telefone Residencial:<br/> <span><input type="text" name="telResResp" size="10" maxlength="14" class="necessary" onkeypress="mascara(this, mtel );" id="inputTelResp" value="<?php echo $dadosResponsavel['telefoneResidencial'] ?>" disabled></span><br>
                                            Telefone Celular:<br/> <input type="text"  name="telCelResp" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel" value="<?php echo $dadosResponsavel['telefoneCelular'] ?>" disabled><br>
                                            Telefone Trabalho:<br/> <input type="text" name="telTrabResp" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel" value="<?php echo $dadosResponsavel['telefoneTrabalho'] ?>" disabled><br>
                                            </div>
                                            <div class="span6">    
                                            Logradouro: <br/><span><input type="text" name="enderecoResp" id="inputEndereco" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['logradouro']); ?>" disabled></span><br/>
                                            Nº:<br/> <span><input type="text" name="numeroResp" id="inputNResp" class="necessary" value="<?php echo $dadosResponsavel['numero'] ?>" disabled></span><br/>
                                            Complemento: <br/><span><input type="text" name="complementoResp" value="<?php echo utf8_encode($dadosResponsavel['complemento']); ?>" disabled></span><br/>
                                            Bairro: <br/><span><input type="text" name="bairroResp" id="inputBairro" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['bairro']); ?>" disabled></span><br/>
                                            Cidade: <br/><span><input type="text" name="cidadeResp" id="inputCidade" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['cidade']); ?>" disabled></span><br/>
                                            
                                            UF: <span><select id="inputUf" name="ufResp" id="uf" class="necessary" disabled>
                                                <?php if($res['uf']=='AC'){ ?>
                                            <option value="AC" selected>AC</option>
                                            <?php }else if($res['uf']=='AL'){ ?>
                                            <option value="AL" selected>AL</option>
                                            <?php }else if($res['uf']=='AM'){ ?>
                                            <option value="AM" selected>AM</option>
                                            <?php }else if($res['uf']=='AP'){ ?>
                                            <option value="AP" selected>AP</option>
                                            <?php }else if($res['uf']=='BA'){ ?>
                                            <option value="BA" selected>BA</option>
                                            <?php }else if($res['uf']=='CE'){ ?>
                                            <option value="CE" selected>CE</option>
                                            <?php }else if($res['uf']=='DF'){ ?>
                                            <option value="DF" selected>DF</option>
                                            <?php }else if($res['uf']=='ES'){ ?>
                                            <option value="ES" selected>ES</option>
                                            <?php }else if($res['uf']=='GO'){ ?>
                                            <option value="GO" selected>GO</option>
                                            <?php }else if($res['uf']=='MA'){ ?>
                                            <option value="MA" selected>MA</option>
                                            <?php }else if($res['uf']=='MG'){ ?>
                                            <option value="MG" selected>MG</option>
                                            <?php }else if($res['uf']=='MS'){ ?>
                                            <option value="MS" selected>MS</option>
                                            <?php }else if($res['uf']=='MT'){ ?>
                                            <option value="MT" selected>MT</option>
                                            <?php }else if($res['uf']=='PA'){ ?>
                                            <option value="PA" selected>PA</option>
                                            <?php }else if($res['uf']=='PB'){ ?>
                                            <option value="PB" selected>PB</option>
                                            <?php }else if($res['uf']=='PE'){ ?>
                                            <option value="PE" selected>PE</option>
                                            <?php }else if($res['uf']=='PI'){ ?>
                                            <option value="PI" selected>PI</option>
                                            <?php }else if($res['uf']=='PR'){ ?>
                                            <option value="PR" selected>PR</option>
                                            <?php }else if($res['uf']=='RJ'){ ?>
                                            <option value="RJ" selected>RJ</option>
                                            <?php }else if($res['uf']=='RN'){ ?>
                                            <option value="RN" selected>RN</option>
                                            <?php }else if($res['uf']=='RS'){ ?>
                                            <option value="RS" selected>RS</option>
                                            <?php }else if($res['uf']=='RO'){ ?>
                                            <option value="RO" selected>RO</option>
                                            <?php }else if($res['uf']=='RR'){ ?>
                                            <option value="RR" selected>RR</option>
                                            <?php }else if($res['uf']=='SC'){ ?>
                                            <option value="SC" selected>SC</option>
                                            <?php }else if($res['uf']=='SE'){ ?>
                                            <option value="SE" selected>SE</option>
                                            <?php }else if($res['uf']=='SP'){ ?>
                                            <option value="SP" selected>SP</option>
                                            <?php }else{ ?>
                                            <option value="TO" selected>TO</option>
                                             <?php } ?>
                                         </select></span><br/>
                                        CEP:<br/> <span><input type="text" name="cepResp" id="inputCepResp" class="necessary" value="<?php echo $dadosResponsavel['cep'] ?>" disabled></span><br/>
                                        Referência: <br/><input type="text" name="referenciaResp" value="<?php echo utf8_encode($dadosResponsavel['referencia']); ?>" disabled><br/><br/></div>
                                        </div>
                                    </div>
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>