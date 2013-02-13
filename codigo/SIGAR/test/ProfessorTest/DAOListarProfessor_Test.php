<?php
/**
 * Description of DAOListar_Test
 *
 * @author Matheus
 */

require_once "F:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'F:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'F:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'F:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ProfessorDAO.php';


class DAOListarProfessor_Test extends PHPUnit_Framework_TestCase{
    
    
    protected $idProfessor;
    
    public function setUp(){
        $this->idProfessor = 1;
    }

    /*
     * @test
     */
    public function testListarProfessorDAO(){
        $professorDao = new ProfessorDAO();
        
        $this->assertNotNull($professorDao->listarProfessor($this->idProfessor));
    }

}

?>
