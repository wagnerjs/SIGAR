<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/AlunoCtrl.php';
        
    $AlunoCtrl = new AlunoCrtl();
    $res = $AlunoCtrl->listarPessoaAluno($_GET["alunoID"]);
    $dadosResponsavel = $AlunoCtrl->listarPessoaResponsavel($_GET["alunoID"]);
    
    if(isset($_POST['enviar'])){
		@$AlunoCtrl = new AlunoCrtl();
		@$nomeAluno=utf8_decode($_POST['txtNome']);
		@$sexoAluno=$_POST['sexo'];
		@$dataAlunoRecebida = $_POST['dataNasc'];
		@$dataAluno = implode("-",array_reverse(explode("/",$dataAlunoRecebida)));
		@$emailAluno = utf8_decode($_POST['email']);
		@$telResidencialAluno=$_POST['telResidencial'];
		@$telCelularAluno=$_POST['telCelular'];
		@$anoEscolar=$_POST['anoEscolar'];
		@$escola=$_POST['escola'];

		@$nomeResp=utf8_decode($_POST['txtNomeResp']);
		@$parentesco=$_POST['parentesco'];
		@$cpfResp=$_POST['cpfResp'];
		@$emailResp=utf8_decode($_POST['emailResp']);
		@$telResp=$_POST['telResResp'];
		@$sexoResp=$_POST['sexoResp'];
		@$dataRespRecebida = $_POST['dataNascResp'];
		@$dataResp = implode("-",array_reverse(explode("/",$dataRespRecebida)));
		@$telCelularResp=$_POST['telCelResp'];
		@$telTrabResp=$_POST['telTrabResp'];
		
		@$mesmoEnd=$_POST['mesmoEnd'];
		
		@$enderecoAluno=utf8_decode($_POST['endereco']);
		@$numeroAluno=$_POST['numero'];
		@$complementoAluno=utf8_decode($_POST['complemento']);
		@$bairroAluno=utf8_decode($_POST['bairro']);
		@$cidadeAluno=utf8_decode($_POST['cidade']);
		@$ufAluno=$_POST['uf'];
		@$cepAluno=$_POST['cep'];
		@$referenciaAluno=utf8_decode($_POST['referencia']);
		
		@$enderecoResp=utf8_decode($_POST['enderecoResp']);
		@$numeroResp=$_POST['numeroResp'];
		@$complementoResp=utf8_decode($_POST['complementoResp']);
		@$bairroResp=utf8_decode($_POST['bairroResp']);
		@$cidadeResp=utf8_decode($_POST['cidadeResp']);
		@$ufResp=$_POST['ufResp'];
		@$cepResp=$_POST['cepResp'];
		@$referenciaResp=$_POST['referenciaResp'];
					
		/*$resposta =  $AlunoCtrl->validaAluno($nomeAluno, $sexoAluno, $dataAluno, $emailAluno, $telResidencialAluno, $telCelularAluno, $anoEscolar, $escola,
				$nomeResp, $parentesco, $cpfResp,$emailResp, $telResp, $sexoResp, $dataResp,$telCelularResp,$telTrabResp,
				$mesmoEnd,$enderecoAluno,$numeroAluno,$complementoAluno,$bairroAluno,$cidadeAluno,$ufAluno,$cepAluno,$referenciaAluno,
				$enderecoResp, $numeroResp, $complementoResp, $bairroResp,$cidadeResp,$ufResp,$cepResp,$referenciaResp);*/
               
                if($resposta == "<font color=green><b>Aluno Cadastrado com sucesso!</b></font>")
                    echo "<script type='text/javascript'>alert('Alteração realizado com sucesso!');</script>";
                else
                    echo "<script type='text/javascript'>alert('Erro na realização da alteração!');</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Alterar dados do Aluno</title>
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
                    <a href="#"><span class="normal">Cadastrar Alunos</span></a>
                    <a href="PesquisaAluno.php"><span class="selected">Pesquisar Alunos</span></a>
                    <div class="content">
                        <div>                           
                            <form name="form1" action="CadastroAluno.php" method="post">
                                    <?php echo @$resposta; ?><br/><br/>
                                    <b>Dados do Aluno</b>
                                    <hr/>
                                    <div class="row-fluid show-grid">
                                        <div class="span6">
                                    Nome:<br/> <span><input type="text" name="txtNome" size="10" maxlength="50" id="inputNome" class="necessary" value="<?php echo utf8_encode($res['nome']); ?>"></span><br>
                                    Sexo: <?php if($res['sexo']=='m'){ ?>
                                           <input type="radio" name="sexo" value="m" class="necessary" checked> Masculino
                                           <input type="radio" name="sexo" value="f" class="necessary"> Feminino<br/><br/>
                                        <?php }else{?>
                                            <input type="radio" name="sexo" value="m" class="necessary"  > Masculino
                                            <input type="radio" name="sexo" value="f" class="necessary"   checked> Feminino<br/><br/>
                                        <?php }?>
                                    Data de Nascimento:<br/> <span><input type="text" name="dataNasc" size="10" maxlength="10" onkeyup="mascaraData(this);" class="necessary" id="inputDataNascResp" value="<?php echo $res['dataNascimento'] ?>"  ></span><br>
                                    Email:<br/> <span><input type="text" name="email" size="10" maxlength="50" id="inputEmail" class="necessary" value="<?php echo utf8_encode($res['email']); ?>"  ></span><br>
                                    Telefone Residecial:<br/> <span><input type="text"  name="telResidencial" size="10" maxlength="14" onkeypress="mascara(this, mtel );" id="inputTelRes" class="necessary" value="<?php echo $res['telefoneResidencial'] ?>"  ></span><br>
                                    Telefone Celular:<br/> <span><input type="text"  name="telCelular" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel" value="<?php echo $res['telefoneCelular'] ?>"  ></span><br>
                                    Ano Escolar:
                                    <select name="anoEscolar"  >
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
                                    Escola:<br/> <span><input type="text" name="escola" size="8" maxlength="100" id="inputEscola" class="necessary" value="<?php echo utf8_encode($res['escola']); ?>"  >
                                    </div>
                                    <div class="span6">
                                    Logradouro:<br/> <span><input type="text" name="endereco" id="inputEndereco" class="necessary" value="<?php echo utf8_encode($res['logradouro']); ?>"  ></span><br/>
                                    Nº:<br/> <span><input type="text" name="numero" id="inputN" class="necessary" value="<?php echo $res['numero'] ?>"  ></span><br/>
                                    Complemento:<br/> <span><input type="text" name="complemento" value="<?php echo utf8_encode($res['complemento']); ?>"  ></span><br/>
                                    Bairro:<br/> <span><input type="text" name="bairro" id="inputBairro" class="necessary" value="<?php echo utf8_encode($res['bairro']); ?>"  ></span><br/>
                                    Cidade:<br/> <span><input type="text" name="cidade" id="inputCidade" class="necessary" value="<?php echo utf8_encode($res['cidade']); ?>"  ></span><br/>
                                    UF: <span><select id="inputUf" name="uf" class="necessary"  >
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
                                         CEP:<br/> <span><input type="text" name="cep" id="inputCep" class="necessary" value="<?php echo $res['cep'] ?>"  ></span><br/>
                                         Referência:<br/> <input type="text" name="referencia" value="<?php echo utf8_encode($res['referencia']); ?>"  ><br/><br/></div>
                                         </div>
                                         <b>Dados do Responsável</b>
                                         <hr/>
                                         <div class="row-fluid show-grid">
                                            <div class="span6">
                                            Nome:<br/> <span><input type="text" name="txtNomeResp" size="10" maxlength="50" id="inputNomeResp" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['nome']); ?>"  ></span><br/>
                                            Data de Nascimento:<br/> <span><input type="text" name="dataNascResp" size="10" maxlength="10" class="necessary" id="inputDataNascResp" value="<?php echo $dadosResponsavel['dataNascimento'] ?>"  ></span><br/>
                                            Sexo: <?php if($dadosResponsavel['sexo']=='m'){ ?>
                                            <input type="radio" name="sexoResp" value="m" class="necessary" checked  > Masculino
                                            <input type="radio" name="sexoResp" value="f" class="necessary"  > Feminino<br/><br/>
                                            <?php }else{?>
                                            <input type="radio" name="sexo" value="m" class="necessary"  > Masculino
                                            <input type="radio" name="sexo" value="f" class="necessary" checked  > Feminino<br/><br/>
                                            <?php }?>
                                            Parentesco:<?php if($dadosResponsavel['categoria']=='pai'){ ?>
                                            <input type="radio" name="parentesco" value="pai" class="necessary" checked  > Pai
                                            <input type="radio" name="parentesco" value="mae" class="necessary"  > Mae
                                            <input type="radio" name="parentesco" value="outro" class="necessary"  > Outro<br/><br/>
                                            <?php }else if($dadosResponsavel['categoria']=='mae'){?>
                                            <input type="radio" name="parentesco" value="pai" class="necessary"  > Pai
                                            <input type="radio" name="parentesco" value="mae" class="necessary" checked  > Mae
                                            <input type="radio" name="parentesco" value="outro" class="necessary"  > Outro<br/><br/>
                                            <?php }else{?>
                                            <input type="radio" name="parentesco" value="pai" class="necessary"  > Pai
                                            <input type="radio" name="parentesco" value="mae" class="necessary"  > Mae
                                            <input type="radio" name="parentesco" value="outro" class="necessary"   checked> Outro<br/><br/>
                                            <?php }?>
                                            CPF:<br/> <span><input type="text" name="cpfResp" size="15" maxlength="15" id="inputCpf" class="necessary" value="<?php echo $dadosResponsavel['cpf'] ?>"  ></span><br/>
                                            Email:<br/> <span><input type="text" name="emailResp" size="10" maxlength="50" id="inputEmailResp" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['email']); ?>"  ></span><br/>
                                            Telefone Residencial:<br/> <span><input type="text" name="telResResp" size="10" maxlength="14" class="necessary" onkeypress="mascara(this, mtel );" id="inputTelResp" value="<?php echo $dadosResponsavel['telefoneResidencial'] ?>"  ></span><br>
                                            Telefone Celular:<br/> <input type="text"  name="telCelResp" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel" value="<?php echo $dadosResponsavel['telefoneCelular'] ?>"  ><br>
                                            Telefone Trabalho:<br/> <input type="text" name="telTrabResp" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel" value="<?php echo $dadosResponsavel['telefoneTrabalho'] ?>"  ><br>
                                            </div>
                                            <div class="span6">    
                                            Logradouro: <br/><span><input type="text" name="enderecoResp" id="inputEndereco" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['logradouro']); ?>"  ></span><br/>
                                            Nº:<br/> <span><input type="text" name="numeroResp" id="inputNResp" class="necessary" value="<?php echo $dadosResponsavel['numero'] ?>"  ></span><br/>
                                            Complemento: <br/><span><input type="text" name="complementoResp" value="<?php echo utf8_encode($dadosResponsavel['complemento']); ?>"  ></span><br/>
                                            Bairro: <br/><span><input type="text" name="bairroResp" id="inputBairro" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['bairro']); ?>"  ></span><br/>
                                            Cidade: <br/><span><input type="text" name="cidadeResp" id="inputCidade" class="necessary" value="<?php echo utf8_encode($dadosResponsavel['cidade']); ?>"  ></span><br/>
                                            
                                            UF: <span><select id="inputUf" name="ufResp" id="uf" class="necessary"  >
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
                                        CEP:<br/> <span><input type="text" name="cepResp" id="inputCepResp" class="necessary" value="<?php echo $dadosResponsavel['cep'] ?>"  ></span><br/>
                                        Referência: <br/><input type="text" name="referenciaResp" value="<?php echo utf8_encode($dadosResponsavel['referencia']); ?>"  ><br/><br/></div>
                                        </div>
                                    </div>
                                    <div class="submits">
                                        <input type="submit" name="enviar" value="Enviar" id="cadEnv" />
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</body>
</html>