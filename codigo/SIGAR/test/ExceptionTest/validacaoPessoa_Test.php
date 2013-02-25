<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/validacaoPessoa.php';

/**
 * Description of validacaoPessoa
 *
 * @author Hebert
 */
class validacaoPessoa_Test extends PHPUnit_Framework_TestCase {

    protected $nome;
    protected $email;
    protected $emailFga;
    protected $emailRepetido;
    protected $telefone;
    protected $telefoneResid;
    protected $validaPessoa_obj;
    protected $cpf;
    protected $emailErrado;
    protected $cpfErro;
    protected $cpfErro1;
    protected $cpfRepetido;


    public function setUp() {
        $this->nome = "Sigar";
        $this->email = "sig@gmail.com";
        $this->emailFga = "sigarfga@gmail.com";
        $this->emailRepetido = "sigarfga@gmail.com";
        $this->emailErrado = "sigarfgagmail.com";
        $this->telefone = "96538653";
        $this->telefoneResid = "81294824";
        $this->cpf = "03704004103";
        $this->cpfErro = "11111111111";
        $this->cpfErro1 = "03104004103";
        $this->cpfRepetido = "469.784.171-90";
        

        $this->validaPessoa_obj = new validacaoPessoa();
    }

    /**
     * @test
     *
     */
    public function validaNome_Test() {
        $this->assertEquals('0', $this->validaPessoa_obj->valida_nome($this->nome));
        $this->assertEquals('1', $this->validaPessoa_obj->valida_nome(''));
    }

    /**
     * @test
     *
     */
    public function validaEmail_Test() {

        $this->assertEquals('1', $this->validaPessoa_obj->valida_email(''));
        $this->assertEquals('0', $this->validaPessoa_obj->valida_email($this->email));
        $this->assertEquals('0', $this->validaPessoa_obj->valida_email($this->emailFga));
        $this->assertEquals('1', $this->validaPessoa_obj->valida_email($this->emailErrado));
        $this->assertEquals('1', $this->validaPessoa_obj->email_repetido($this->emailRepetido));
        $this->assertEquals('0', $this->validaPessoa_obj->email_repetido("abc@gmail.com"));
        
    }

    /**
     * @test
     *
     */
    public function validaTelefone_Test() {

        $this->assertEquals('0', $this->validaPessoa_obj->valida_telefone_resid($this->telefoneResid));
        $this->assertEquals('1', $this->validaPessoa_obj->valida_telefone_resid(''));
    }

    /**
     * @test
     *
     */
    public function validaCpf_Test() {

        $this->assertEquals('0', $this->validaPessoa_obj->validacpf($this->cpf));
        $this->assertEquals('1', $this->validaPessoa_obj->validacpf($this->cpfErro));
        $this->assertEquals('1', $this->validaPessoa_obj->validacpf($this->cpfErro1));
    }

    /**
     * @test
     *
     */
    public function validaCpfRepetido_Test() {
        
        $this->assertEquals('0', $this->validaPessoa_obj->cpf_repetido($this->cpf));
        $this->assertEquals('1', $this->validaPessoa_obj->cpf_repetido($this->cpfRepetido));
    }

}

?>
