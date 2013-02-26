<?php
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/EmailCtrl.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CtrlEmail_Teste
 *
 * @author Alex
 */
class CtrlEmail_Teste extends PHPUnit_Framework_TestCase {
    
    protected $objEmail;
    
    public function setUp(){
        $this->objEmail = new EmailCtrl();
    }
    
     /**
     * @test
     *
     */
    public function TestePegarResposta(){
        $this->assertNotNull($this->objEmail->getResposta());
    }
    
     /**
     * @test
     *
     */
    public function TesteListaEmails(){
        $this->assertNull($this->objEmail->criarListaEmails());
    }
}

?>
