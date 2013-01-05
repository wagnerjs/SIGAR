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
    private $_cpf;
    private $_telTrabalho;
    
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
