<?php
$url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
require $url.'/view/ValidaSession.php';
require_once $url.'/controller/ProfessorCtrl.php';

if (isset($_POST['btnEnviar'])) {
    @$professorCtrl = new ProfessorCtrl();

    @$nomeProfessor = utf8_decode($_POST['txtNome']);
    @$sexoProfessor = $_POST['sexo'];
    @$dataRecebida = $_POST['dataNasc'];
    $nascProfessor = implode("-", array_reverse(explode("/", $dataRecebida)));

    @$emailProfessor = utf8_decode($_POST['email']);

    @$telResProfessor = $_POST['telResidencial'];
    @$celularProfessor = $_POST['telCelular'];
    @$cpfProfessor = $_POST['cpfProfessor'];
    @$meioDeTransporte = $_POST['meioTransporte'];

    @$enderecoProfessor = utf8_decode($_POST['endereco']);
    @$cepProfessor = $_POST['cep'];
    @$logradouroProfessor = utf8_decode($_POST['endereco']);
    @$numeroCasaProfessor = $_POST['numero'];
    @$complementoProf = utf8_decode($_POST['complemento']);
    @$bairroProfessor = utf8_decode($_POST['bairro']);
    @$cidadeProfessor = utf8_decode($_POST['cidade']);
    @$ufProfessor = $_POST['uf'];

    @$referenciaProfessor = utf8_decode($_POST['referencia']);
    
    if(isset($_POST['materias'])){
        for($i = 0; $i < count($_POST['materias']); $i++) {
            $materias[$i] =  $_POST['materias'][$i];                 
        }
    }else{
        $materias = "";        
    }
    
    $opcao = 1;//Numero que define opçAo de cadastro para controladora

    $res = $professorCtrl->validaProfessor(0, $nomeProfessor, $sexoProfessor, $nascProfessor,
                $emailProfessor, $telResProfessor, $celularProfessor, $enderecoProfessor,
                $cpfProfessor, $meioDeTransporte, $cepProfessor, $logradouroProfessor, 
                $numeroCasaProfessor, $complementoProf, $bairroProfessor, $cidadeProfessor,
                $ufProfessor, $referenciaProfessor, $materias, $opcao);

    //echo $res;

    if ($res == "<font color=green><b>Professor Cadastrado com sucesso!</b></font><br/>")
        echo "<script type='text/javascript'>alert('Cadastro realizado com sucesso!');</script>";
    else
        echo "<script type='text/javascript'>alert('Erro na realização do cadastro!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
             Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Cadastrar Professor</title>
        <meta name="description" content="" />
        <meta name="author" content="Hebert" />

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
                    <a href="#"><span class="selected"> Cadastrar Professor</span></a>
                    <a href="PesquisaProfessor.php"><span class="normal"> Pesquisar Professor</span></a>
                    <div class="content">
                         <div>                           
                             <form class="spaces" name="form1" action="CadastroProfessor.php" method="post" onSubmit="return verificaDadosProfessor()">
                                <?php echo @$res; ?>
                                <b>Dados do Professor</b>
                                <hr/>
                                <div class="row-fluid show-grid">
                                    <div class="span6">
                                        Nome:<br/> <span><input type="text" name="txtNome" size="10" maxlength="50" id="inputNome" class="necessary"></span><br>
                                        Sexo: <input type="radio" name="sexo" value="m" class="necessary"> Masculino
                                        <input type="radio" name="sexo" value="f" class="necessary"> Feminino<br/><br/>
                                        Data de Nascimento:<br/> <span><input type="text" name="dataNasc" size="10" maxlength="10" onkeyup="mascaraData(this);" class="necessary" id="inputDataNascResp"></span><br>
                                        CPF:<br/> <span><input type="text" name="cpfProfessor" size="15" maxlength="15" id="inputCpf" class="necessary"></span><br/>
                                        Email:<br/> <span><input type="text" name="email" size="10" maxlength="50" id="inputEmail" class="necessary"></span><br>
                                        Telefone Residencial:<br/> <span><input type="text"  name="telResidencial" size="10" maxlength="14" onkeypress="mascara(this, mtel );" id="inputTelRes" class="necessary"></span><br>
                                        Telefone Celular:<br/> <span><input type="text"  name="telCelular" size="10" maxlength="14" onkeypress="mascara(this, mtel );" class="tel"></span><br>
                                        Meio de Transporte: <select name="meioTransporte">
                                            <option value="Carro">Carro</option>
                                            <option value="Moto">Moto</option>
                                            <option value="Onibus">Onibus</option>
                                        </select><br/>
                                        <div class="materias">
                                            <br/>
                                            <div>
                                                <b>Materias:</b><br>
                                    <?php 
                                     $professorCtrl = new ProfessorCtrl();
                                     $professorCtrl->criarCheckMaterias();
                                     if(@mysql_num_rows($professorCtrl->getResposta())>0){
                                            for($i=0; $i<mysql_num_rows($professorCtrl->getResposta());$i++){
                                    ?>
                                    <input name="materias[]" type="checkbox" value="<?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'idMateria'));?>" /> <?php echo utf8_encode(mysql_result($professorCtrl->getResposta(),$i,'descricaoMateria'));?><br>

                                    <?php   }

                                    }?>
                                    <br/>
                                            </div>
                                        </div>
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
                              
                                <hr/>

                        </div>
                          
                            <div class="submits">
                                <input type="submit" name="btnEnviar" value="Enviar" id="cadEnv" />
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
