<?php
	include "validaSession.php";
	include_once '../controller/AlunoCtrl.php';

	if(isset($_POST['enviar'])){
            $AlunoCtrl = new AlunoCrtl();
		$AlunoCtrl->setNomeAluno(utf8_decode($_POST['txtNome']));
                $AlunoCtrl->setSexoAluno($_POST['sexo']);
                $dataAlunoRecebida = $_POST['dataNasc'];
                $dataAluno = implode("-",array_reverse(explode("/",$dataAlunoRecebida)));
                $AlunoCtrl->setNascimentoAluno($dataAluno);
                $AlunoCtrl->setEmailAluno($_POST['email']);
                $AlunoCtrl->setTelResidencial($_POST['telResidencial']);
                $AlunoCtrl->setTelCelular($_POST['telCelular']);
                $AlunoCtrl->setAnoEscolar($_POST['anoEscolar']);
                $AlunoCtrl->setEscola($_POST['escola']);
		
                $AlunoCtrl->setNomeResp(utf8_decode($_POST['txtNomeResp']));
		$AlunoCtrl->setCategoria($_POST['parentesco']);
                $AlunoCtrl->setCpfResp($_POST['cpfResp']);
                $AlunoCtrl->setEmailResp($_POST['emailResp']);
                $AlunoCtrl->setTelResResp($_POST['telResResp']);
                $AlunoCtrl->setSexoResp($_POST['sexoResp']);
                $dataRespRecebida = $_POST['dataNascResp'];
                $dataResp = implode("-",array_reverse(explode("/",$dataRespRecebida)));
		$AlunoCtrl->setNascimentoResp($dataResp);
                $AlunoCtrl->setTelCelResp($_POST['telCelResp']);
                $AlunoCtrl->setTelTrabResp($_POST['telTrabResp']);
                
                $AlunoCtrl->setMesmoEnd($_POST['mesmoEnd']);
		
		$AlunoCtrl->setEndereco($_POST['endereco']);
                $AlunoCtrl->setNumero($_POST['numero']);
                $AlunoCtrl->setComplemento($_POST['complemento']);
                $AlunoCtrl->setBairro(utf8_decode($_POST['bairro']));
                $AlunoCtrl->setCidade(utf8_decode($_POST['cidade']));
		$AlunoCtrl->setUf($_POST['uf']);
                $AlunoCtrl->setCep($_POST['cep']);
                $AlunoCtrl->setReferencia(utf8_decode($_POST['referencia']));
                
                $AlunoCtrl->setEnderecoResp($_POST['enderecoResp']);
                $AlunoCtrl->setNumeroResp($_POST['numeroResp']);
                $AlunoCtrl->setComplementoResp($_POST['complementoResp']);
                $AlunoCtrl->setBairroResp(utf8_decode($_POST['bairroResp']));
                $AlunoCtrl->setCidadeResp(utf8_decode($_POST['cidadeResp']));
		$AlunoCtrl->setUfResp($_POST['ufResp']);
                $AlunoCtrl->setCepResp($_POST['cepResp']);
                $AlunoCtrl->setReferenciaResp($_POST['referenciaResp']);
			                
                $AlunoCtrl->instanciarAluno();
                
                $res = "<font color=green><b>Aluno Cadastrado com sucesso!</b></font>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Cadastrar Aluno</title>
  <meta name="description" content="" />
  <meta name="author" content="Fellype" />

  <meta name="viewport" content="width=device-width; initial-scale=1.0" />

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/estilo.css" rel="stylesheet" media="screen">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.valid8.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/jquery.maskedinput-1.3.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/base.js"></script>
</head>

<body>
        <div class="container">
            <a href="telaPrincipal.php"><img src="img/logo.png" vspace="50"/></a>
            <p class="status">Logado como:<b> <?php echo $ObjSessao->getUsuario();?> | <a href= "logoff.php" >Sair</b></a></p>
            <div id="sysBox">
                <div class="inner">
                    <br/>
                    <a href="#"><span class="selected">Cadastrar Alunos</span></a>
                    <a href="pesquisaAluno.php"><span class="normal">Pesquisar Alunos</span></a>
                    <div class="content">
                        <div>                           
                            <form name="form1" action="cadastroAluno.php" method="post">
                                    <?php echo @$res; ?><br/><br/>
                                    <b>Dados do Aluno</b>
                                    <hr/>
                                    <div class="row-fluid show-grid">
                                        <div class="span6">
                                             Nome:<br/> <span><input type="text" name="txtNome" size="10" maxlength="50" id="inputNome" class="necessary"></span><br>
                                    Sexo: <input type="radio" name="sexo" value="m" class="necessary"> Masculino
                                          <input type="radio" name="sexo" value="f" class="necessary"> Feminino<br/><br/>
                                    Data de Nascimento:<br/> <span><input type="text" name="dataNasc" size="10" maxlength="10" onkeyup="mascaraData(this);" class="necessary" id="inputDataNascResp"></span><br>
                                    Email:<br/> <span><input type="text" name="email" size="10" maxlength="50" id="inputEmail" class="necessary"></span><br>
                                    Telefone Residencial:<br/> <span><input type="text"  name="telResidencial" size="10" maxlength="14" onkeypress="mascara(this, mtel );" id="inputTelRes" class="necessary"></span><br>
                                    Telefone Celular:<br/> <span><input type="text"  name="telCelular" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel"></span><br>
                                    Ano Escolar: <select name="anoEscolar">
                                    <option value="1ef">1º ano do Ensino Fundamental</option>
                                    <option value="2ef">2º ano do Ensino Fundamental</option>
                                    <option value="3ef">3º ano do Ensino Fundamental</option>
                                    <option value="4ef">4º ano do Ensino Fundamental</option>
                                    <option value="5ef">5º ano do Ensino Fundamental</option>
                                    <option value="6ef">6º ano do Ensino Fundamental</option>
                                    <option value="7ef">7º ano do Ensino Fundamental</option>
                                    <option value="8ef">8º ano do Ensino Fundamental</option>
                                    <option value="9ef">9º ano do Ensino Fundamental</option>
                                    <option value="1em">1º ano do Ensino Médio</option>
                                    <option value="2em">2ºano do Ensino Médio</option>
                                    <option value="3em">3º ano do Ensino Médio</option>
                                    <option value= "outros"> Outros</option>
                                    </select><br/>
                                    Escola:<br/> <span><input type="text" name="escola" size="8" maxlength="10" id="inputEscola" class="necessary" >
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
                                    Nº: <br/><span><input type="text" name="numeroResp" id="inputN" class="necessary"></span><br/>
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
                                    CEP:<br/> <span><input type="text" name="cepResp" id="inputCep" class="necessary"></span><br/>
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