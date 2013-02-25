<?php

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/AlunoDAO.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Aluno.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Responsavel.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/AlunoCtrl.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";

class CtrlAlterarAluno_Test extends PHPUnit_Framework_TestCase {

    protected $retorno;
    protected $idAluno;

    public function setUp() {
        $this->idAluno = 1;
        $logradouro = "SMPW 21 CONJUNTO 3";
        $cep = "710283-832";
        $bairro = "PARK WWAY";
        $cidade = "Brasilia";
        $complemento = "casa";
        $numero = "19";
        $uf = "DF";
        $referencia = "Brasilia";

        $nomeResp = "Edson Alves";
        $sexoResp = "m";
        $cpf = "036.969.331-04";
        $telResResp = "(61) 3301-3239";
        $telefoneTrabalho = "(61) 3301-3239";
        $telCelResp = "(61) 3301-3239";
        $categoria = "pai";
        $nascimentoResp = "1990-11-12";
        $emailResp = "edson_alves@gmail.com";

        $nome = "Alunooo";
        $sexo = "m";
        $email = "Aluno@gmail.com";
        $nascimento = "1995-11-24";
        $anoEscolar = "2ef";
        $telResidencial = "(61) 3321-3030";
        $telCelular = "(61) 9999-8699";
        $escola = "FGA";

        $mesmoEnd = "nao";

        $alunoCtrl = new AlunoCrtl();

        $alunoDAO = new AlunoDAO();
        $idPessoa = $alunoDAO->selecionarIdPessoaAluno(2);

        $this->retorno = $alunoCtrl->instanciarAlunoAlterar($idPessoa, $nome, $sexo, $nascimento, $email, $telResidencial, $telCelular, $anoEscolar, $escola, $nomeResp, $categoria, $cpf, $emailResp, $telResResp, $sexoResp, $nascimentoResp, $telCelResp, $telefoneTrabalho, $mesmoEnd, $logradouro, $numero, $complemento, $bairro, $cidade, $uf, $cep, $referencia, $logradouro, $numero, $complemento, $bairro, $cidade, $uf, $cep, $referencia);
    }

    /*
     * @test
     */

    public function testeCtrlAlterar() {
        echo $this->retorno;
        $this->assertEquals("Cadastro não foi efetuado com sucesso!", $this->retorno);
    }

    /*
     * @test
     */

    public function testListar() {
        $alunoCtrl = new AlunoCrtl();
        $this->assertNotNull($alunoCtrl->listaPessoaResponsavel($this->idAluno));
        $this->assertNull($alunoCtrl->listarAluno());
        $this->assertNull($alunoCtrl->listarAlunoAgendamento());
        $this->assertNotNull($alunoCtrl->listarAlunoAjax($this->idAluno));
        $this->assertNotNull($alunoCtrl->listarPessoaAluno($this->idAluno));
        $this->assertNotNull($alunoCtrl->listarResponsavel($this->idAluno));
    }

}

?>
