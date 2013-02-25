<?php
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserProfessor_Test
 *
 * @author Alex
 */
class UserProfessor_Test extends PHPUnit_Framework_TestCase {
    protected $emailProf;
    protected $cpfProf;
    protected $objUserProf;
    
    public function setUp(){        
        $this->cpfProf = "011.220.951-39";
        $this->emailProf = "email@email.com";
        
        $this->objUserProf = new User();
        $this->objUserProf->setLogin($this->emailProf);
        $this->objUserProf->setSenha("01122095139");
    }
     /*
     * @test
     * 
     */
    
    public function testCriaUsuarioPadrao(){
        $usuario = new User();
        $this->assertEquals($this->objUserProf, $usuario->criaUsuarioPadraoProfesor($this->emailProf, $this->cpfProf));
    }
}

?>
