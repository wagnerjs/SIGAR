
<?php
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/AlunoDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Aluno.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Responsavel.class.php';

/**
 * @author Guilherme Baufaker  <gbre.111@gmail.com>
 */
class DAOListar_Test extends PHPUnit_Framework_TestCase{
     

    protected $idPessoaAluno;
    protected $idAluno;


    public function setUp()
    {

       
       $this->idPessoaAluno = 12;
       $this->idAluno = 1;
       
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
    }
    
    
    
}
?>
