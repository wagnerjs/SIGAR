<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/ProfessorCtrl.php';

    $professorCtrl = new ProfessorCtrl();
    $idProfessor = $_GET["professorID"];
    $res = $professorCtrl->listarProfessor($idProfessor);
    
    if(isset($_POST['voltar'])){
        header("location: http://localhost/SIGAR/codigo/SIGAR/src/view/ViewProfessor/PesquisaProfessor.php");
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Alterar dados do Professor</title>
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
  <script src="../js/formCadastroProfessor.js"></script>
</head>
<body>
<div class="container">
            <a href="../TelaPrincipal.php"><img src="../img/logo.png" vspace="50"/></a>
            <p class="status">Logado como:<b> <?php echo $ObjSessao->getUsuario(); ?> | <a href= "../Logoff.php" >Sair</b></a></p>
            <div id="sysBox">
                <div class="inner">
                    <br/>
                    <a href="#"><span class="selected">Cadastrar Professor</span></a>
                    <a href="PesquisaProfessor.php"><span class="normal">Pesquisar Professores</span></a>
                    <div class="content">
                         <div>                           
                             <form name="form1" action="PesquisaProfessor.php" method="post">
                                <?php echo @$resposta; ?><br/><br/>
                                <br/><br/>
                                <b>Dados do Professor</b>
                                <hr/>
                                <div class="row-fluid show-grid">
                                    <div class="span6">
                                        Nome:<br/> <span><input type="text" name="txtNome" size="10" maxlength="50" id="inputNome" class="necessary" value="<?php echo utf8_encode($res['nome']); ?>" disabled></span><br>
                                        Sexo: <?php if($res['sexo']=='m'){ ?>
                                           <input type="radio" name="sexo" value="m" class="necessary" disabled checked> Masculino
                                           <input type="radio" name="sexo" value="f" class="necessary"disabled> Feminino<br/><br/>
                                        <?php }else{?>
                                            <input type="radio" name="sexo" value="m" class="necessary" disabled > Masculino
                                            <input type="radio" name="sexo" value="f" class="necessary"  disabled checked> Feminino<br/><br/>
                                        <?php }?>
                                        Data de Nascimento:<br/> <span><input type="text" name="dataNasc" size="10" maxlength="10" onkeyup="mascaraData(this);" class="necessary" id="inputDataNascResp" value="<?php 
                                        $dataBanco = $res['dataNascimento'];
                                        $dataNascimento = implode("/",array_reverse(explode("-",$dataBanco)));
                                        echo $dataNascimento; ?>" disabled ></span><br>
                                        CPF:<br/> <span><input type="text" name="cpfProfessor" size="15" maxlength="15" id="inputCpf" class="necessary" value="<?php echo $res['cpf'] ?>" disabled ></span><br/>
                                        Email:<br/> <span><input type="text" name="email" size="10" maxlength="50" id="inputEmail" class="necessary" value="<?php echo utf8_encode($res['email']); ?>"  disabled ></span><br>
                                        Telefone Residencial:<br/> <span><input type="text"  name="telResidencial" size="10" maxlength="14" onkeypress="mascara(this, mtel );" id="inputTelRes" class="necessary" value="<?php echo $res['telefoneResidencial'] ?>" disabled ></span><br>
                                        Telefone Celular:<br/> <span><input type="text"  name="telCelular" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel" value="<?php echo $res['telefoneCelular'] ?>" disabled></span><br>
                                        Meio de Transporte: <select name="meioTransporte" disabled>
                                            <?php if($res['meioTransporte']=='Carro'){ ?>
                                            <option value="Carro" selected>Carro</option>
                                            <?php }else if($res['meioTransporte']=='Moto'){ ?>
                                            <option value="Moto" selected>Moto</option>
                                            <?php }else if($res['meioTransporte']=='Onibus'){ ?>
                                            <option value="Onibus" selected>Onibus</option>
                                            <?php } ?>
                                            
                                        </select><br/>
                                    </div>
                                    <div class="span6">
                                <?php 
                                 $professorCtrl->criarCheckMaterias();
                                 $professorCtrl->selecionarMateriasProfessor($idProfessor);
                                 
                                 
                                 if($professorCtrl->getMaterias() == 0){
                                     $arrayMateria[0] = 0;
                                 }  else {
                                      for($j=0; $j<mysql_num_rows($professorCtrl->getMaterias());$j++){
                                            if(mysql_result($professorCtrl->getMaterias(),$j,'idMateria')){
                                                $arrayMateria[$j] = mysql_result($professorCtrl->getMaterias(),$j,'idMateria');
                                            }else{
                                                $arrayMateria[$j] = 0;
                                            }
                                      }
                                     
                                 }
                                
                                 $tamanhoArray = count($arrayMateria);
                            
                                 if(@mysql_num_rows($professorCtrl->getResposta())>0){
                                      for($i=0; $i<mysql_num_rows($professorCtrl->getResposta());$i++){
                                          $confere =0;//váriavel que controla os check box já marcados
                                          for($j=0; $j<$tamanhoArray;$j++){
                                             if ($arrayMateria[$j] == mysql_result($professorCtrl->getResposta(),$i,'idMateria')  ){ 
                                                 $confere = 1 ;?>
                                                
                                                <input name="materias[]" type="checkbox" disabled checked value="<?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'idMateria'));?>" /><?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'descricaoMateria'));?><br><?php
                                             }                                         
                                          }
                                      if($confere!=1){    
                                          ?>
                                    
                                    <input name="materias[]" type="checkbox" disabled value="<?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'idMateria'));?>" /><?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'descricaoMateria'));?><br><?php
                                      }
                                    
                                    }
                                     }
                               ?>
                                
                            </div>
                                    
                                    <div class="span6">
                                    Logradouro:<br/> <span><input type="text" name="endereco" id="inputEndereco" class="necessary" value="<?php echo utf8_encode($res['logradouro']); ?>"  disabled ></span><br/>
                                    Nº:<br/> <span><input type="text" name="numero" id="inputN" class="necessary" value="<?php echo $res['numero'] ?>" disabled  ></span><br/>
                                    Complemento:<br/> <span><input type="text" name="complemento" value="<?php echo utf8_encode($res['complemento']); ?>"  disabled></span><br/>
                                    Bairro:<br/> <span><input type="text" name="bairro" id="inputBairro" class="necessary" value="<?php echo utf8_encode($res['bairro']); ?>" disabled ></span><br/>
                                    Cidade:<br/> <span><input type="text" name="cidade" id="inputCidade" class="necessary" value="<?php echo utf8_encode($res['cidade']); ?>"  disabled></span><br/>
                                    UF: <span><select id="inputUf" name="uf" class="necessary" disabled >
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
                                         CEP:<br/> <span><input type="text" name="cep" id="inputCep" class="necessary" value="<?php echo $res['cep'] ?>" disabled ></span><br/>
                                         Referência:<br/> <input type="text" name="referencia" value="<?php echo utf8_encode($res['referencia']); ?>" disabled ><br/><br/></div>
                                         </div>

                                <hr/>

                        </div>
                            <div class="submits">
                                <input type="submit" name="voltar" value="Voltar" />

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>        
</body>
</html>