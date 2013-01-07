<?php
require_once '../model/Aluno.class.php';
require_once '../model/Endereco.class.php';
require_once '../model/Pessoa.class.php';
require_once '../model/User.class.php';
       
class AlunoCrtl {   

public function instanciarAluno ()
    {
        $nomeAluno = $_POST['txtNome'];
	$sexoAluno = $_POST['sexo'];
	$nascimentoAluno = $_POST['dataNasc'];
	$emailAluno = $_POST['email'];
	$telResidencial = $_POST['telResidencial'];
	$telCelular = $_POST['telCelular'];
	$anoEscolar = $_POST['anoEscolar'];
	$escola = $_POST['escola'];
	$nomeResp = $_POST['txtNomeResp'];
	$categoria = $_POST['parentesco'];
	$cpfResp = $_POST['cpfResp'];
	$emailResp = $_POST['emailResp'];
	$telResResp = $_POST['telResResp'];
        $sexoResp = $_POST['sexoResp'];
        $nascimentoResp = $_POST['dataNascResp'];
	$telCelResp = $_POST['telCelResp'];
	$telTrabResp = $_POST['telTrabResp'];
        
        $mesmoEnd = $_POST['mesmoEnd'];
	
        $endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$cep = $_POST['cep'];
	$referencia = $_POST['referencia'];
        
        /*$enderecoResp = $_POST['enderecoResp'];
	$numeroResp = $_POST['numeroResp'];
	$complementoResp = $_POST['complementoResp'];
	$bairroResp = $_POST['bairroResp'];
	$cidadeResp = $_POST['cidadeResp'];
	$ufResp = $_POST['ufResp'];
	$cepResp = $_POST['cepResp'];
	$referenciaResp = $_POST['referenciaResp'];*/
        
        if($mesmoEnd == "sim"){
            $endereco_obj = new Endereco($endereco,$cep,$bairro,$cidade,$complemento,$numero,$uf,$referencia);
            $responsavel_obj = new Responsavel($nomeResp,$emailResp,$telResResp, $telCelResp, $sexoResp, $nascimentoResp, $cpfResp, $categoria, $telTrabResp, $endereco_obj );
        }   
        else{
            $endereco_obj = new Endereco($enderecoResp,$cepResp,$bairroResp,$cidadeResp,$complementoResp,$numeroResp,$ufResp,$referenciaResp);
            $responsavel_obj = new Responsavel($nomeResp,$emailResp,$telResResp, $telCelResp, $sexoResp, $nascimentoResp, $cpfResp, $categoria, $telTrabResp, $endereco_obj );
        }
        
        $user_obj = new User();
            $aluno_obj = new Aluno ($nomeAluno,$sexoAluno,$nascimentoAluno,$emailAluno,$anoEscolar,$telResidencial,$telCelular,$escola,$endereco_obj,$responsavel_obj, $user_obj);
        
        $alunoDAO = new AlunoDAO();
        $user_obj = $aluno_obj->get_usuario();
        
        $alunoDAO->salvarAluno($aluno_obj, $responsavel_obj, $user_obj);
    }
}     
?>