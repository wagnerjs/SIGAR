<?php
/**
 * Description of DAOSalvarProfessor_TEst
 *
 * @author Matheus
 */
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/dao/ProfessorDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Professor.class.php';

class DAOSalvarProfessor_TEst extends PHPUnit_Framework_TestCase{
    
    protected $professor_obj;
    protected $endereco_obj;
    protected $user_obj;
    protected $idEndProfessor;
    protected $idPessoaProf;
    protected $idPessoaUser;
    protected $idProfessor;
    protected $professorDao;
    
    public function setUp()
    {
        $nomeProfessor = 'Ajax';
        $sexoProfessor = 'm';
        $nascProfessor = '1995-02-19';
        $emailProfessor = 'matheus@gmail.com';
        $telResProfessor ='(61)3333-1111';
        $celularProfessor = '(61)8109-8502';  
        $cpfProfessor = '012.202.033-21';
        $meioDeTransporte = 'Carro';
        
        $cepProfessor = '72215096';
        $logradouroProfessor = 'QNM 09 CONJUNTO F';
        $numeroCasaProfessor = '10';
        $complementoProf = 'Casa';
        $bairoProfessor = 'Ceilandia Sul';
        $cidadeProfessor = 'Ceilandia';
        $ufProfessor = 'DF';
        $referenciaProfessor = 'Mercado';
        $materias[0] = 'Física';
        $materias[1] = 'Física';
        
        $this->endereco_obj = new Endereco($logradouroProfessor, $cepProfessor, $bairoProfessor, $cidadeProfessor,
                                            $complementoProf, $numeroCasaProfessor, $ufProfessor, $referenciaProfessor);
        $this->user_obj = new User();
        
        $this->professor_obj = new Professor(utf8_decode($nomeProfessor),$emailProfessor,
                $telResProfessor,$celularProfessor,$sexoProfessor,$nascProfessor,$cpfProfessor,
                $meioDeTransporte,$this->endereco_obj, $this->user_obj,$materias);
    }
    
    /**
     * @test
     * 
     */
    
    public function TestSalvarProfessor()
    {
        $professorDao = new ProfessorDAO();
        
        $this->idPessoaProf = $professorDao->salvarPessoa($this->professor_obj);
        $this->idPessoaUser = $professorDao->salvarUsuario($this->idPessoaProf, $this->user_obj);
        $this->idProfessor = $professorDao->salvarProfessor($this->idPessoaUser, $this->professor_obj);
        $this->idEndProfessor = $professorDao->salvarProfessorEndereco($this->professor_obj);
        $professorDao->salvarEnderecoAssociativa($this->idEndProfessor, $this->idPessoaProf);
        
        $this->assertNotNull($this->idPessoaProf);
        $this->assertNotNull($this->idPessoaUser);
        $this->assertNotNull($this->idProfessor);
        $this->assertNotNull($this->idEndProfessor);
       
    }
    
    public function tearDown(){
        //deletar o professor que foi inserido para não mexer na integridade do banco
    }
}

?>
