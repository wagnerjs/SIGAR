<?php
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Professor.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/ProfessorCtrl.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ProfessorDAO.php';

/**
 * Description of CtrlListarProfessor_Test
 *
 * @author Matheus
 */
class CtrlListarProfessor_Test extends PHPUnit_Framework_TestCase {
        
    protected $idProfessor;
    protected $retorno;

    public function setUp(){
        $this->idProfessor = 1;

        $professorCtrl = new ProfessorCtrl();

        $this->retorno = $professorCtrl->listarProfessor($this->idProfessor);
    }
    
    /*
     * @test
     */
    public function testeCtrlListar(){
        $this->assertNull($this->retorno);
    }








}

?>
