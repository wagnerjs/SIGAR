<?php
include "Aluno.class.php";
include "Endereco.class.php";
include "Pessoa.class.php";
include "Usuario.class.php";
       
class AlunoCrtl {   

public function instanciarAluno ()
    {
        $nome = $_POST['txtNome'];
	$sexo = $_POST['sexo'];
	$nascimento = $_POST['dataNasc'];
	$email = $_POST['email'];
	$telResidencial = $_POST['telResidencial'];
	$telCelular = $_POST['telCeluar'];
	$anoEscolar = $_POST['anoEscolar'];
	$escola = $_POST['escola'];
	$nomeResp = $_POST['txtNomeResp'];
	$parentesco = $_POST['parentesco'];
	$cpfResp = $_POST['cpfResp'];
	$emailResp = $_POST['emailResp'];
	$telResResp = $_POST['telResResp'];
	$telCelResp = $_POST['telCelResp'];
	$telTrabResp = $_POST['telTrabResp'];
	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$cep = $_POST['cep'];
	$referencia = $_POST['referencia'];
	
        $endereco_obj = new Endereco($endereco,$cep,$bairro,$cidade,$complemento,$numero,$uf,$referencia);
        $responsavel_obj = new Responsavel($nomeResp,$cpfResp,$telResResp, $telTrabResp, $telCelResp, $parentesco, $emailResp);
        $user_obj = new User();
        $aluno_obj = new Aluno ($nome,$sexo,$nascimento,$email,$anoEscolar,$telResidencial,$telCelular,$escola,$endereco_obj,$responsavel_obj, $user_obj);
        
        $alunoDAO = new AlunoDAO();
        $user_obj = $aluno_obj->get_usuario();
        
        $alunoDAO->salvarAluno($aluno_obj, $responsavel_obj, $user_obj);
    }
}     
?>