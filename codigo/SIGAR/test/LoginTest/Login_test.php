<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//$url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
//require_once $url.'/utils/Login.class.php';

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Login.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php';

/**
 * Description of Login_test
 *
 * @author Matheus
 */
class Login_test extends PHPUnit_Framework_TestCase{
    
    protected $login = "sigar";
    protected $senha = 12345;
    protected $objLog;
    
    protected $loginErro = "sigar1";
    protected $senhaErro = 1234;
    protected $objLog1;
    protected $objLog2;
       
    
    
    public function setUp() {
        
        $obj_conecta = new bd;
	$obj_conecta->conecta();
	$obj_conecta->seleciona_bd();
        
        $this->objLog = new Login();  
        $this->objLog->setUsuario($this->login);
        $this->objLog->setSenha($this->senha);
        $this->objLog->autentica();
        
        $this->objLog2 = new Login();  
        $this->objLog2->setUsuario($this->login);
        $this->objLog2->setSenha($this->senhaErro);
        $this->objLog2->autentica();
        
        
        $this->objLog1 = new Login();
        $this->objLog1->setUsuario($this->loginErro);
        $this->objLog1->setSenha($this->senhaErro);
        $this->objLog1->autentica();
        
    }
    
    /*
     * @test
     * 
     */
    
    public function testAutentica(){
        //$this->assertNotNull($this->objLog->autentica());
       //$this->assertEquals("<b>Usuario/Senha encontrado(s)</b>",$this->objLog->getResposta());
       $this->assertNotNull($this->objLog->getIdLogin());
       $this->assertEquals($this->objLog->getUsuario(), $this->login);
    }  
    
    /*
     * @test
     * 
     */
    public function testAutenticaErro(){
      $this->assertEquals("<b>Usuario/Senha nao encontrado(s)</b>",$this->objLog1->getResposta());  
    }
    
    /*
     * @test
     * 
     */
    public function testAutenticaSenhaErro(){
        $this->assertEquals("<b>Usuario/Senha nao encontrado(s)</b>", $this->objLog2->getResposta());
    }

    /*
     * @test
     * 
     */
    public function testDeSet(){
        $this->assertEquals($this->objLog->setIdLogin($this->login), $this->objLog->setUsuario($this->login));
        //$this->assertEquals($this->objLog->setUsuario($this->login),$this->objLog->getUsuario());
    }



}

?>
