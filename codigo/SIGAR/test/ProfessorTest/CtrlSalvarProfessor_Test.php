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

class CtrlSalvarProfessor_Test extends PHPUnit_Framework_TestCase {
        
      protected $retorno;
    
    public function setUp()
    {
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
        
        
        $professorCtrl = new ProfessorCtrl();
        $this->retorno = $professorCtrl->instanciarProfessor(utf8_decode($nomeProfessor), $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor,
                                                            $celularProfessor, $cpfProfessor, $meioDeTransporte,
                                                            $cepProfessor, $logradouroProfessor, $numeroCasaProfessor,
                                                            $complementoProf, $bairoProfessor, $cidadeProfessor,
                                                             $ufProfessor, $referenciaProfessor);
    }
    
    
    /*
     * @test
     * 
     * 
     */
    
    public function testeCtrlSalvar(){
        
        $this->assertEquals("Cadastro de Professor Efetuado com Sucesso", $this->retorno);
    }
}

?>
