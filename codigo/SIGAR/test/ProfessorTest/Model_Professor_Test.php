<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_Professor_Test
 *
 * @author Matheus
 */

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/dao/ProfessorDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Professor.class.php';

class Model_Professor_Test extends PHPUnit_Framework_TestCase {
   
    protected $professor_obj;
    protected $endereco_obj;
    protected $user_obj;
    
    protected $nomeProfessor;
    protected $sexoProfessor;
    protected $nascProfessor;
    protected $emailProfessor;
    protected $telResProfessor;
    protected $celularProfessor;  
    protected $cpfProfessor;
    protected $meioDeTransporte;
        
    protected $cepProfessor;
    protected $logradouroProfessor;
    protected $numeroCasaProfessor;
    protected $complementoProf;
    protected $bairoProfessor;
    protected $cidadeProfessor;
    protected $ufProfessor;
    protected $referenciaProfessor;
   
    
    public function setUp(){
        $this->nomeProfessor = "Ajax";
        $this->sexoProfessor = 'f';
        $this->nascProfessor = "1995-02-19";
        $this->emailProfessor = "matheus@gmail.com";
        $this->telResProfessor ="(61) 3333-1111";
        $this->celularProfessor = "(61) 8109-8502";  
        $this->cpfProfessor = "012.202.033-21";
        $this->meioDeTransporte = "carro";
        
        $this->cepProfessor = '72215096';
        $this->logradouroProfessor = 'QNM 09 CONJUNTO F';
        $this->numeroCasaProfessor = '10';
        $this->complementoProf = 'Casa';
        $this->bairoProfessor = 'Ceilandia Sul';
        $this->cidadeProfessor = 'Ceilandia';
        $this->ufProfessor = 'DF';
        $this->referenciaProfessor = 'Mercado';
        
        $this->endereco_obj = new Endereco($this->logradouroProfessor, $this->cepProfessor, $this->bairoProfessor, $this->cidadeProfessor,
                                            $this->complementoProf, $this->numeroCasaProfessor, $this->ufProfessor, $this->referenciaProfessor);
        $this->user_obj = new User();
        $this->professor_obj = new Professor($this->nomeProfessor, $this->emailProfessor,
                                                $this->telResProfessor, $this->celularProfessor, $this->sexoProfessor,
                                                $this->nascProfessor, $this->cpfProfessor, $this->meioDeTransporte, $this->endereco_obj, $this->user_obj);
                /*Professor(utf8_decode($this->nomeProfessor),  $this->sexoProfessor, $this->nascProfessor, $this->emailProfessor,
                                            $this->telResProfessor, $this->celularProfessor, $this->cpfProfessor,  $this->meioDeTransporte,
                                           $this->endereco_obj, $this->user_obj);*/
    }
    
    /*
     * @test
     */
    
    public function testCriarProfessor(){
        $this->assertEquals($this->nomeProfessor, $this->professor_obj->getNome());
        $this->assertEquals($this->emailProfessor, $this->professor_obj->getEmail());
        $this->assertEquals($this->telResProfessor, $this->professor_obj->getTelefoneResidencial());
        $this->assertEquals($this->celularProfessor, $this->professor_obj->getCelular());
        $this->assertEquals($this->sexoProfessor, $this->professor_obj->getSexo());
        $this->assertEquals($this->nascProfessor, $this->professor_obj->getNascimento());
        $this->assertEquals($this->cpfProfessor, $this->professor_obj->getCpf());
        $this->assertEquals($this->endereco_obj, $this->professor_obj->getEndereco());
        $this->assertEquals($this->user_obj, $this->professor_obj->getUsuario());
    }
    
    /*
     * @test
     */
    public function testCriarObjetoEndereco()
    {
        $this->assertEquals($this->ufProfessor,$this->endereco_obj->getUf());
        $this->assertEquals($this->logradouroProfessor,$this->endereco_obj->getLogradouro());
        $this->assertEquals($this->bairoProfessor,$this->endereco_obj->getBairro());
        $this->assertEquals($this->cepProfessor,$this->endereco_obj->getCep());
        $this->assertEquals($this->cidadeProfessor,$this->endereco_obj->getCidade());
        $this->assertEquals($this->referenciaProfessor,$this->endereco_obj->getReferencia());
        $this->assertEquals($this->numeroCasaProfessor,$this->endereco_obj->getNumeroCasa());
        $this->assertEquals($this->complementoProf,$this->endereco_obj->getComplemento());
    }
    
    /*
     * @test
     */
    public function testCriarUserNulo()
    {
        $this->assertEquals("",$this->user_obj->getLogin());
        $this->assertEquals("",$this->user_obj->getSenha());
    }
    
    /*
     * @test
     */
    public function testCriarUserPadrao(){
        $this->assertNotNull($this->user_obj->cria_Usuario_Padrao($this->professor_obj->getNome(), $this->professor_obj->getNascimento()));
    }
}

?>
