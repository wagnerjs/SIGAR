<?php
/**
 * Description of DAOSalvarProfessor_TEst
 *
 * @author Matheus
 */

require_once 'F:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ProfessorDAO.php';
require_once 'F:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'F:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'F:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'F:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Professor.class.php';

class DAOSalvarProfessor_TEst extends PHPUnit_Framework_TestCase{
    
    protected $professor_obj;
    protected $endereco_obj;
    protected $user_obj;
    protected $idEndProfessor;
    protected $idProfPessoa;
    protected $idPessoaUser;
    protected $idProfessor;
    
    public function setUp()
    {
        $nomeProfessor = 'Ajax';
        $sexoProfessor = 'm';
        $nascProfessor = '1995-02-19';
        $emailProfessor = 'matheus@gmail.com';
        $telResProfessor ='(61)3333-1111';
        $celularProfessor = '(61)8109-8502';  
        $cpfProfessor = '012.202.033-21';
        $meioDeTransporte = 'carro';
        
        $cepProfessor = '72215096';
        $logradouroProfessor = 'QNM 09 CONJUNTO F';
        $numeroCasaProfessor = '10';
        $complementoProf = 'Casa';
        $bairoProfessor = 'Ceilandia Sul';
        $cidadeProfessor = 'Ceilandia';
        $ufProfessor = 'DF';
        $referenciaProfessor = 'Mercado';
        
        
        $this->user_obj = new User();
        $this->endereco_obj = new Endereco($logradouroProfessor, $cepProfessor, $bairoProfessor, $cidadeProfessor,
                                            $complementoProf, $numeroCasaProfessor, $ufProfessor, $referenciaProfessor);

                
        $this->professor_obj = new Professor(utf8_decode($nomeProfessor),$sexoProfessor, $nascProfessor, $emailProfessor,
                                              $telResProfessor, $celularProfessor, $cpfProfessor,$meioDeTransporte,
                                           $this->endereco_obj, $this->user_obj);

            $this->professor_obj = new Professor();
        $professorDao = new ProfessorDAO();
        $idPessoaProf = $professorDao->salvarPessoa($this->professor_obj);
        $idPessoaUser = $professorDao->salvarUsuario($idPessoaProf, $this->user_obj);
        $idProfessor = $professorDao->salvarProfessor($idPessoaUser, $this->professor_obj);
        $idEndProfessor = $professorDao->salvarProfessorEndereco($this->professor_obj);
        
        
        $professorDao->salvarProfessor($idPessoaUser, $this->professor_obj);
        $professorDao->salvarEnderecoAssociativa($idEndProfessor, $idPessoaProf);
    }
    
    
    /**
     * @test
     * 
     */
    
    public function TestSalvarProfessor()
    {
   
        $this->assertEquals('1',$this->idProfPessoa);
        $this->assertEquals('1',$this->idPessoaUser);
        $this->assertEquals('1', $this->idProfessor);
        $this->assertEquals('1',$this->idEndProfessor);
        
         
    }
}

?>
