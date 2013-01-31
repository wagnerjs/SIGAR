<?php


require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/AlunoDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Aluno.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Responsavel.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/AlunoCtrl.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CTRLValidaAluno_Test
 *
 * @author Alex
 */
class CTRLValidaAluno_Test extends PHPUnit_Framework_TestCase {
    
     /**
     * @test
     *
     */
    
    public function TestValidarAluno(){
        $endereco = 'SMPW 21 CONJUNTO 3';
        $cep = '710283832';
        $bairro = 'PARK WWAY';
        $cidade = 'Brasilia';
        $complemento = 'casa';
        $numero = '19';
        $uf = 'DF';
        $referencia = 'Brasilia';
        
       
       $mesmoEnd = 'nao';
       $nomeResp = 'EDSON ALVES';
       $sexoResp = 'm';
       $cpf = '012.202.033-21';
       $telResResp='(61)3301-3239'; 
       $telefoneTrabalho = '(61)3301-3239';
       $telCelResp = '(61)3301-3239';
       $categoria = 'pai';
       $nascimentoResp = '1990-11-12';
       $emailResp = 'EDSONSALVER@emai.com.br';
       
       $nome = 'Hilmer';
       $sexo = 'm';
       $email = 'HILMER@GMAIL.COM';
       $nascimento = '1995-11-24';
       $anoEscolar = '2 ano';
       $telResidencial = '(61)3321-3030';
       $telCelular = '(61)9999-8699';
       $escola = 'FGA';
       
       $enderecoResp = "";
       $numeroResp = "";
       $complementoResp = "";
       $bairroResp = "";
       $cidadeResp = "";
       $ufResp = "";
       $cepResp = "";
       $referenciaResp = "";
       
       
       $validaAluno = new AlunoCrtl();
       $retorno = $validaAluno->validaAluno($nome, $sexo, $nascimento, $email, $telResidencial, $telCelular, $anoEscolar, $escola, $nomeResp, $categoria, $cpf, $emailResp, $telResResp, $sexoResp, $nascimentoResp, $telCelResp, $telefoneTrabalho, $mesmoEnd, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $cep, $referencia, $enderecoResp, $numeroResp, $complementoResp, $bairroResp, $cidadeResp, $ufResp, $cepResp, $referenciaResp);
       echo $retorno;
       
    }
}

?>
