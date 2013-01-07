<?php

class validacaoEndereco {
    
        protected $_res_logradouro;
        protected $_res_numero;
        protected $_erro;
        protected $_res_bairro;
        protected $_res_cidade;
        protected $_res_cep;
    
        function valida_logradouro($_logradouro) {
        if (empty($_logradouro)) {
            $this->_res_logradouro = "<b><font color=red> * </font>Favor digitar o logradouro.";
            $this->_erro = 1;
        }
    }
    
        function valida_numero_casa($_numero) {
        if (empty($_numero)) {
            $this->_res_numero = "<b><font color=red> * </font>Favor digitar o numero da casa.";
            $this->_erro = 1;
        }
    }
    
        function valida_bairro($_bairro) {
        if (empty($_bairro)) {
            $this->_res_bairro = "<b><font color=red> * </font>Favor digitar o seu Bairro corretamente.";
            $this->_erro = 1;
        }
    }
    
        function valida_cidade($_cidade) {
        if (empty($_cidade)) {
            $this->_res_cidade = "<b><font color=red> * </font>Favor digitar o seu Cidade corretamente.";
            $this->_erro = 1;
        }
    }
    
        function valida_cep($_cep) {
        if (empty($_cep)) {
            $this->_res_cep = "<b><font color=red> * </font>Favor digitar o seu CEP";
            $this->_erro = 1;
        } elseif (is_numeric($this->_cep) == false) {
            $this->_res_cep = "<b><font color=red> * </font>Favor digitar o seu CEP corretamente.";
            $this->_erro = 1;
        }
    }
    
    
    
    
}

?>
