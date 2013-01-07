<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Responsavel
 *
 * @author Andre
 */
class Responsavel extends Pessoa {

    private $_categoria;
    private $_telTrabalho;
    
    function __construct($nomeResp="",$emailResp="",$telResResp="", $telCelResp="", $sexo="",$nascimento="", $cpf="", $categoria="", $telefoneTrabalho="", $endereco_obj="") {
        $this->setNome($nomeResp);
        $this->setSexo($sexo);
        $this->setNascimento($nascimento);
        $this->setEmail($emailResp);
        $this->set_telefoneResidencial($telResResp);
        $this->setCelular($telCelResp);
        $this->set_endereco($endereco_obj);
        $this->setCpf($cpf);
        $this->_categoria = $categoria;
        $this->_telTrabalho = $telefoneTrabalho;
    }
    
    public function setCategoria($_categoria) {
        $this->_categoria = $_categoria;
    }

    public function setCpf($_cpf) {
        $this->_cpf = $_cpf;
    }

    public function getCategoria() {
        return $this->_categoria;
    }

    public function getCpf() {
        return $this->_cpf;
    }

    public function setTelTrabalho($_telTrabalho) {
        $this->_telTrabalho = $_telTrabalho;
    }

    public function getTelTrabalho() {
        return $this->_telTrabalho;
    }

}

?>
