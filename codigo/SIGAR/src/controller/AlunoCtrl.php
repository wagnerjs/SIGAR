<?php
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
	
	
	include "conexao.class.php";
	include "Aluno.class.php";
	include "Endereco.class.php";
	include "Pessoa.class.php";
	include "Usuario.class.php";
	
	$con = new Conexao();
	
	
	$con->conexaoBanco();
	

	$cadastro->inserir();
	
	$con->fechaConexaoBanco();
?>