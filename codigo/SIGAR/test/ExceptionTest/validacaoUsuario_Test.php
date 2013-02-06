<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/validacaoUsuario.php';

/**
 * Description of validacaoUsuario_Test
 *
 * @author Hebert
 */
class validacaoUsuario_Test extends PHPUnit_Framework_TestCase {

    protected $_Senha;
    protected $_Nome;
    protected $_NomeSigar;
    protected $_NomeErro;
    protected $_SenhaErro;

    public function setUp() {
        $this->_Nome = "Lourdes";
        $this->_NomeSigar = "sigar";
        $this->_NomeErro = "SI";
        $this->_NomeSenha = "NomeSenha";
        $this->_Senha = "12345689";
        $this->_SenhaErro = "1234";
    }

    /**
     * @test
     *
     */
    public function validaNomeUsuario() {
        $validaUsuario_obj = new validacaoUsuario();

        $this->assertEquals('0', $validaUsuario_obj->valida_nomeusuario($this->_Nome));
        $this->assertEquals('1', $validaUsuario_obj->valida_nomeusuario($this->_NomeSigar));
        $this->assertEquals('1', $validaUsuario_obj->valida_nomeusuario($this->_NomeErro));
    }

    /**
     * @test
     *
     */
    public function validaSenha() {
        $validaUsuario_obj = new validacaoUsuario();

        $this->assertEquals('0', $validaUsuario_obj->caracteres_senha($this->_Senha));
        $this->assertEquals('1', $validaUsuario_obj->caracteres_senha($this->_SenhaErro));
    }
    
    /**
     * @test
     *
     */
    public function validaNomeIgualSenha() {
        $validaUsuario_obj = new validacaoUsuario();

        $this->assertEquals('1', $validaUsuario_obj->valida_nome_senha($this->_NomeSenha, $this->_NomeSenha));
        $this->assertEquals('0', $validaUsuario_obj->valida_nome_senha($this->_NomeSenha, $this->_Senha));
        
        
    }

}

?>
