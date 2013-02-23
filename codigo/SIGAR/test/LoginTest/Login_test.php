<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//$url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
//require_once $url.'/utils/Login.class.php';

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Login.class.php';

/**
 * Description of Login_test
 *
 * @author Matheus
 */
class Login_test extends PHPUnit_Framework_TestCase{
    
    protected $login = "sigar";
    protected $senha = 12345;
    protected $objLog;
    
    
    
    public function setUp() {
        $this->objLog = new Login();  
        $this->objLog->setUsuario($this->login);
        $this->objLog->setSenha($this->senha);
                
    }
    
    /*
     * @test
     * 
     */
    
    public function testAutentica(){
       // $this->assertEquals(1,$this->objLog->autentica());
        $this->assertNotNull($this->objLog->getIdLogin());
        
        
    }
    
}

?>
