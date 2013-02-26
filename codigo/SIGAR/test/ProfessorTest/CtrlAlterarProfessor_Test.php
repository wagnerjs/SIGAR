<?php
/**
 * Description of CtrlSalvarProfessor_Test
 *
 * @author Matheus
 */

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Professor.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/ProfessorCtrl.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ProfessorDAO.php';

class CtrlAlterarProfessor_Test extends PHPUnit_Framework_TestCase {
        
      protected $retorno;
      protected $professorCtrl;
    
    public function setUp()
    {
        $idProfessor = 2;
        $nomeProfessor = 'Matheus';
        $sexoProfessor = 'm';
        $nascProfessor = '1995-02-19';
        $emailProfessor = 'matheus@gmail.com';
        $telResProfessor ='(61)3333-1111';
        $celularProfessor = '(61)8109-8502';  
        $cpfProfessor = '012.202.033-21';
        $meioDeTransporte = 'onibus';
        
        $cepProfessor = '72215096';
        $logradouroProfessor = 'QNM 09 CONJUNTO F';
        $numeroCasaProfessor = '10';
        $complementoProf = 'Casa';
        $bairoProfessor = 'Ceilandia Sul';
        $cidadeProfessor = 'Ceilandia';
        $ufProfessor = 'DF';
        $referenciaProfessor = 'Igreja';
        $materias[0] = 'Fisica';
                
        $this->professorCtrl = new ProfessorCtrl();
        $this->retorno = $this->professorCtrl->instanciarAlterarProfessor($idProfessor, utf8_decode($nomeProfessor),
                         $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor,
                         $cpfProfessor, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf,
                         $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor, $meioDeTransporte,
                        $materias);
        
    }
    
    
    /*
     * @test
     * 
     * 
     */
    
    public function testeCtrlSalvar(){
        
        $this->assertEquals("Professor alterado com Sucesso", $this->retorno);
    }
    
     /*
     * @test
     * 
     * 
     */
    
    public function testeSelecionaIdProf(){
        $this->assertEquals(1, $this->professorCtrl->selecionarIdProfessor(2));
    }
   
}

?>
