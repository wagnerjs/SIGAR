
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

       $this->idPessoaAluno = 12;
       $this->idAluno = 1;
       $this->idPessoaAluno = 21;
       $this->idAluno = 9;
       $this->idProfessor = 1;
   }
    
    
    /**
     * @test
     *
     */
    
    public function TestSelecionarAlunoDAO(){
        $aluno_dao = new AlunoDAO();
                //$this->assertEquals('10',$aluno_dao->listarAluno($this->idAluno));
        //$this->assertEquals('10',$aluno_dao->listarResponsavel($this->idAluno));

        $this->assertEquals('10',$aluno_dao->selecionarIdPessoaAluno($this->idAluno));
        $this->assertEquals('12',$aluno_dao->selecionarIdUsuario($this->idPessoaAluno)); 
        $this->assertEquals('21',$aluno_dao->selecionarIdPessoaAluno($this->idAluno));
        $this->assertEquals('10',$aluno_dao->selecionarIdUsuario($this->idPessoaAluno)); 
        $this->assertEquals('Física,Filosofia',$aluno_dao->selecionarIdUsuario($this->idPessoaAluno)); 
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
