<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/validacaoEndereco.php';

/**
 * Description of validacaoEndereco_Test
 *
 * @author Hebert
 */
class validacaoEndereco_Test extends PHPUnit_Framework_TestCase {

    protected $logradouro;
    protected $cep;
    protected $numero;
    protected $bairro;
    protected $cidade;
    protected $referencia;
    protected $validacaoEndereco;

    public function setUp() {
        $this->logradouro = 'Quadra 1 conjundo B1';
        $this->cep = '73020-114';
        $this->bairro = 'Sobradinho';
        $this->cidade = 'Brasilia';
        $this->complemento = 'Sobrado';
        $this->numero = rand(1, 1000);
        $this->referencia = 'Primo Piato';
        $this->validacaoEndereco = new validacaoEndereco();
    }

    /**
     * @test
     *
     */
    public function validaBairroResp_Test() {
        
        $this->assertEquals('0', $this->validacaoEndereco->valida_bairro_resp($this->bairro, 'sim'));
        $this->assertEquals('0', $this->validacaoEndereco->valida_bairro_resp($this->bairro, 'nao'));
        $this->assertEquals('1', $this->validacaoEndereco->valida_bairro_resp('', 'nao'));
    }

    /**
     * @test
     *
     */
    public function validaCep_Test() {
 
        $this->assertEquals('0', $this->validacaoEndereco->valida_cep($this->cep));
        $this->assertEquals('1', $this->validacaoEndereco->valida_cep(''));
    }

    /**
     * @test
     *
     */
    public function validaCepResp_Test() {
               
        $this->assertEquals('0', $this->validacaoEndereco->valida_cep_resp($this->cep, 'sim'));
        $this->assertEquals('0', $this->validacaoEndereco->valida_cep_resp($this->cep, 'nao'));
        $this->assertEquals('1', $this->validacaoEndereco->valida_cep_resp('', 'nao'));
    }

    /**
     * @test
     *
     */
    public function validaCidade_Test() {
                
        $this->assertEquals('0', $this->validacaoEndereco->valida_cidade($this->cidade));
        $this->assertEquals('1', $this->validacaoEndereco->valida_cidade(''));
    }

    /**
     * @test
     *
     */
    public function validaCidadeResp_Test() {
        
        $this->assertEquals('0', $this->validacaoEndereco->valida_cidade_resp($this->cidade, 'sim'));
        $this->assertEquals('0', $this->validacaoEndereco->valida_cidade_resp($this->cidade, 'nao'));
        $this->assertEquals('1', $this->validacaoEndereco->valida_cidade_resp('', 'nao'));
    }

    /**
     * @test
     *
     */
    public function validaLogradouro_Test() {
                
        $this->assertEquals('0', $this->validacaoEndereco->valida_logradouro($this->logradouro));
        $this->assertEquals('1', $this->validacaoEndereco->valida_logradouro(''));
    }

    /**
     * @test
     *
     */
    public function validaLogradouroResp_Test() {
        $validacaoEndereco = new validacaoEndereco();
        
        $this->assertEquals('0', $this->validacaoEndereco->valida_logradouro_resp($this->logradouro, 'sim'));
        $this->assertEquals('0', $this->validacaoEndereco->valida_logradouro_resp($this->logradouro, 'nao'));
        $this->assertEquals('1', $this->validacaoEndereco->valida_logradouro_resp('', 'nao'));
    }

    /**
     * @test
     *
     */
    public function validaNumeroCasa_Test() {
     
        $this->assertEquals('0', $this->validacaoEndereco->valida_numero_casa($this->numero));
        $this->assertEquals('1', $this->validacaoEndereco->valida_numero_casa(''));
    }

    /**
     * @test
     *
     */
    public function validaNumCasaResp_Test() {
        
        $this->assertEquals('0', $this->validacaoEndereco->valida_numero_casa_resp($this->numero, 'sim'));
        $this->assertEquals('0', $this->validacaoEndereco->valida_numero_casa_resp($this->numero, 'nao'));
        $this->assertEquals('1', $this->validacaoEndereco->valida_numero_casa_resp('', 'nao'));
    }
    /**
     * @test
     *
     */
    public function validaBairro_Test() {
        //Testes validação bairro
        $this->assertEquals('0', $this->validacaoEndereco->valida_bairro($this->bairro));
        $this->assertEquals('1', $this->validacaoEndereco->valida_bairro(''));
    }

}
?>

