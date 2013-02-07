<?php


require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/AlunoDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Aluno.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Responsavel.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/AlunoCtrl.php';

class CTRLValidaAluno_Test extends PHPUnit_Framework_TestCase {
    protected $retorno=0; 
    
    public function setUp(){
        $endereco = 'SMPW 21 CONJUNTO 3';
        $cep = '710283832';
        $bairro = 'PARK WWAY';
        $cidade = 'Brasilia';
        $complemento = 'casa';
        $numero = '19';
        $uf = 'DF';
        $referencia = 'Brasilia';

        $mesmoEnd = 'sim';
        $nomeResp = 'JOAOOOOO';
        $sexoResp = 'm';
        $cpf = '03696933104';
        $telResResp='6133013239'; 
        $telefoneTrabalho = '6133013239';
        $telCelResp = '6133013239';
        $categoria = 'pai';
        $nascimentoResp = '19901112';
        $emailResp = 'EDSONSALVER@email.com.br';

        $nome = 'Hilmer';
        $sexo = 'm';
        $email = 'HILMER@GMAILl.COM';
        $nascimento = '19951124';
        $anoEscolar = '2 ano';
        $telResidencial = '6133213030';
        $telCelular = '6199998699';
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

        $this->retorno = $validaAluno->validaAluno($nome, $sexo, $nascimento, $email, $telResidencial, $telCelular, $anoEscolar, $escola, $nomeResp, $categoria, $cpf, $emailResp, $telResResp, $sexoResp, $nascimentoResp, $telCelResp, $telefoneTrabalho, $mesmoEnd, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $cep, $referencia, $enderecoResp, $numeroResp, $complementoResp, $bairroResp, $cidadeResp, $ufResp, $cepResp, $referenciaResp);

    }
    
    /**
     * @test
     *
     */
    
    public function TestValidarAluno(){
       $this->assertEquals('0',$this->retorno);   
    }
}

?>
