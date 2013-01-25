
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
class DAOAlterar_Test extends PHPUnit_Framework_TestCase{
     
    protected $aluno_obj; 
    protected $endereco_obj;
    protected $reponsavel_obj;
    protected $user_obj;
    protected $idPessoaAluno;
    
    public function setUp()
    {
        $logradouro = 'Quadra 1 conjundo B1';
        $cep = '73020-114';
        $bairro = 'Sobradinho';
        $cidade = 'Brasilia';
        $complemento = 'Sobrado';
        $numero = rand(1,1000);
        $uf = 'DF';
        $referencia = 'Primo Piato';
        
        
       $nomeResp = 'Hélio dos anjos';
       $sexoResp = 'M';
       $cpf = '027.040.041-03';
       $telResResp='(61)3487-6574'; 
       $telefoneTrabalho = '(61)3221-3259';
       $telCelResp = '(61)3301-3130';
       $categoria = 'PAI';
       $nascimentoResp = '1990-11-12';
       $emailResp = 'helidoanjos@email.com.br';
       
       $nome = 'Hebert Douglas de Almeida Santos';
       $sexo = 'm';
       $email = 'hebertdougl@gmail.com';
       $nascimento = '1991-11-07';
       $anoEscolar = '9 ano';
       $telResidencial = '(61)3487-4794';
       $telCelular = '(61)8193-7487';
       $escola = 'UNB DARgjgg';
       
       $this->idPessoaAluno = 21;
       
       $this->endereco_obj=new Endereco($logradouro,$cep,$bairro,$cidade,$complemento,$numero,$uf,$referencia);
       $this->user_obj = new User();
       $this->responsavel_obj = new Responsavel(utf8_decode($nomeResp),$emailResp,$telResResp, $telCelResp, $sexoResp ,$nascimentoResp, $cpf, $categoria, $telefoneTrabalho, $this->endereco_obj);
       $this->aluno_obj=new Aluno (utf8_decode($nome),$sexo,$nascimento,$email,$anoEscolar,$telResidencial,$telCelular,$escola,  $this->endereco_obj,$this->responsavel_obj,$this->user_obj);
       
    }
    
    
    /**
     * @test
     *
     */
    
    public function TestSelcionarAlunoDAO(){
         $aluno_dao = new AlunoDAO();
         $this->assertEquals('10',$aluno_dao->selecionarIdUsuario($this->idPessoaAluno));
    }
    
     /**
     * @test
     *
     */
    
    public function TestAlterarAlunoDAO(){
        $aluno_dao = new AlunoDAO();
        $this->assertEquals('1',$aluno_dao->alterarAlunoBanco($this->idPessoaAluno, $this->aluno_obj));
        $this->assertEquals('1',$aluno_dao->alterarUsuario($this->idPessoaAluno, $this->user_obj));
        $this->assertEquals('1',$aluno_dao->alterarPessoaAluno($this->idPessoaAluno, $this->aluno_obj));
        
        $this->assertEquals('2', $aluno_dao->alterarAluno($this->idPessoaAluno,$this->aluno_obj,$this->user_obj,$this->responsavel_obj ));
 
    }
  
    
    
    
}
?>
