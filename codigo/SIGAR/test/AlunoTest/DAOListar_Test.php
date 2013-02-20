
<?php
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/AlunoDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Aluno.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Responsavel.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ProfessorDAO.php';

/**
 * @author Guilherme Baufaker  <gbre.111@gmail.com>
 */
class DAOListar_Test extends PHPUnit_Framework_TestCase{
     

    protected $idPessoaAluno;
    protected $idAluno;
    protected $idProfessor;

    public function setUp()
    {

       $this->idPessoaAluno = 1;
       $this->idAluno = 1;
       $this->idProfessor = 1;
   }
    
    
    /**
     * @test
     *
     */
    
    public function TestSelecionarAlunoDAO(){
        $aluno_dao = new AlunoDAO();

        $this->assertEquals('1',$aluno_dao->selecionarIdPessoaAluno($this->idAluno));
        $this->assertEquals('1',$aluno_dao->selecionarIdUsuario($this->idPessoaAluno));
        
        $this->assertNotNull($aluno_dao->selecionarIdEndereco($this->idPessoaAluno));
        $this->assertEquals('0',$aluno_dao->selecionarIdEndereco(0));
        
        $this->assertNotNull($aluno_dao->listarAluno($this->idAluno));
        $this->assertEquals('Nada encontrado!',$aluno_dao->listarAluno(0));
        
        $this->assertNotNull($aluno_dao->listarAlunos());
        
        $this->assertNotNull($aluno_dao->listarPessoaAlunos($this->idAluno));
        $this->assertEquals('Nada encontrado!',$aluno_dao->listarPessoaAlunos(0));
        
        $this->assertNotNull($aluno_dao->listarPessoaResponsavel($this->idAluno));
        $this->assertEquals('Nada encontrado!',$aluno_dao->listarPessoaResponsavel(0));
        
        $this->assertNotNull($aluno_dao->listarResponsavel($this->idAluno));
        $this->assertEquals('Nada encontrado!',$aluno_dao->listarResponsavel(0));
         
        
    }
    
    /**
     * @test
     *
     */
    public function TestSelecionarProfessorDAO(){
        $professor_dao = new ProfessorDAO();
        //$this->assertEquals('Física,Filosofia', $professor_dao->selecionarMateriasProfessor($this->idProfessor));
        //$this->assertEquals('Física,Filosofia', $professor_dao->listarProfessor($this->idProfessor));
        
    }
    
    
    
}
?>
