<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
require_once $url.'/utils/Login.class.php';

/**
 * Description of Login_test
 *
 * @author Matheus
 */
class Login_test extends PHPUnit_Framework_TestCase{
    
    protected $login = "sigar";
    protected $senha = 12345;
    protected $objLog;
    
    /*
     * @test
     */
    
    public function setUp() {
           
        $this->objLog->setUsuario($this->login);
        $this->objLog->setSenha($this->senha);
                
    }
    
    public function testAutentica(){
        $login = new Login();
        $login->setUsuario($this->login);
        $login->setSenha($senha);
        $this->assertNotNull($login->getIdLogin());
        
        
    }
    
}

?>
