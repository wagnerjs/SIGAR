
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
class DAOSalvar_Test extends PHPUnit_Framework_TestCase{
     
    protected $aluno_obj; 
    protected $endereco_obj;
    protected $reponsavel_obj;
    protected $user_obj;
    
    public function setUp()
    {
        $logradouro = 'SMPW 21 CONJUNTO 3';
        $cep = '710283832';
        $bairro = 'PARK WWAY';
        $cidade = 'Brasilia';
        $complemento = 'casa';
        $numero = '19';
        $uf = 'DF';
        $referencia = 'Brasilia';
        
        
       $nomeResp = 'EDSON ALVES';
       $sexoResp = 'm';
       $cpf = '012.202.033-21';
       $telResResp='(61)3301-3239'; 
       $telefoneTrabalho = '(61)3301-3239';
       $telCelResp = '(61)3301-3239';
       $categoria = 'pai';
       $nascimentoResp = '1990-11-12';
       $emailResp = 'EDSONSALVER@emai.com.br';
       
       $nome = 'hilmer';
       $sexo = 'm';
       $email = 'HILMER@GMAIL.COM';
       $nascimento = '1995-11-24';
       $anoEscolar = '2 ano';
       $telResidencial = '(61)3321-3030';
       $telCelular = '(61)9999-8699';
       $escola = 'FGA';
       
       $this->endereco_obj=new Endereco($logradouro,$cep,$bairro,$cidade,$complemento,$numero,$uf,$referencia);
       $this->user_obj = new User();
       $this->responsavel_obj = new Responsavel(utf8_decode($nomeResp),$emailResp,$telResResp, $telCelResp, $sexoResp ,$nascimentoResp, $cpf, $categoria, $telefoneTrabalho, $this->endereco_obj);
       $this->aluno_obj=new Aluno (utf8_decode($nome),$sexo,$nascimento,$email,$anoEscolar,$telResidencial,$telCelular,$escola,  $this->endereco_obj,$this->responsavel_obj,$this->user_obj);
       
    }
    
    
    /**
     * @test
     *
     */
    public function TestSalvarAlunoDAO()
    {
        $aluno_dao = new AlunoDao();
       
       $this->assertEquals('1', $aluno_dao->salvarAluno($this->aluno_obj,$this->responsavel_obj,$this->user_obj));
      // $this->assertEquals('1', $aluno_dao->listarAlunos());    
       
    }
    /*
       public function TestListarAlunoDAO()
    {
        $aluno_dao = new AlunoDao();
        $this->assertEquals('1', $aluno_dao->listarAlunos());     
    }
     * 
     */

}
?>
