<?php


class validacaoEndereco {
    
   
        
        protected $_res_logradouro;
        protected $_res_numero;
        protected $_res_bairro;
        protected $_res_cidade;
        protected $_res_cep;
        public $arrayErro = array();
    
        function valida_logradouro($_logradouro) {
       
            if (empty($_logradouro)) {
            $this->_res_logradouro = "<b><font color=red> * </font>Favor digitar o logradouro.";
            $this->arrayErro[] = $this->_res_logradouro;
            $erro = 1;
        }else{
            $erro = 0;
        
        }
        return $erro;
    }
    
        function valida_numero_casa($_numero) {
        if (empty($_numero)) {
            $this->_res_numero = "<b><font color=red> * </font>Favor digitar o numero da casa.";
            $this->arrayErro[] = $this->_res_numero;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
    
        function valida_bairro($_bairro) {
        if (empty($_bairro)) {
            $this->_res_bairro = "<b><font color=red> * </font>Favor digitar o seu Bairro corretamente.";
            $this->arrayErro[] = $this->_res_bairro;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
    
        function valida_cidade($_cidade) {
        if (empty($_cidade)) {
            $this->_res_cidade = "<b><font color=red> * </font>Favor digitar o seu Cidade corretamente.";
            $this->arrayErro[] = $this->_res_cidade;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
    
        function valida_cep($_cep) {
        if (empty($_cep)) {
            $this->_res_cep = "<b><font color=red> * </font>Favor digitar o seu CEP";
            $this->arrayErro[] = $this->_res_cep;
            $erro = 1;
        } elseif (is_numeric($_cep) == false) {
            $this->_res_cep = "<b><font color=red> * </font>Favor digitar o seu CEP corretamente.";
            $this->arrayErro[] = $this->_res_cep;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
    
            function valida_logradouro_resp($_logradouro, $_mesmoEnd) {
       if($_mesmoEnd == 'nao'){
            if (empty($_logradouro)) {
            $this->_res_logradouro = "<b><font color=red> * </font>Favor digitar o logradouro.";
            $this->arrayErro[] = $this->_res_logradouro;
            $erro = 1;
        }else{
            $erro = 0;
        
        }
       }
        return $erro;
    }
    
        function valida_numero_casa_resp($_numero, $_mesmoEnd) {
        if($_mesmoEnd == 'nao'){
        if (empty($_numero)) {
            $this->_res_numero = "<b><font color=red> * </font>Favor digitar o numero da casa.";
            $this->arrayErro[] = $this->_res_numero;
            $erro = 1;
        }else{
            $erro = 0;
        }
        }
        return $erro;
    }
    
        function valida_bairro_resp($_bairro, $_mesmoEnd) {
            if($_mesmoEnd == 'nao'){
        if (empty($_bairro)) {
            $this->_res_bairro = "<b><font color=red> * </font>Favor digitar o seu Bairro corretamente.";
            $this->arrayErro[] = $this->_res_bairro;
            $erro = 1;
        }else{
            $erro = 0;
        }
            }
        return $erro;
    }
    
        function valida_cidade_resp($_cidade, $_mesmoEnd) {
            if($_mesmoEnd == 'nao'){
        if (empty($_cidade)) {
            $this->_res_cidade = "<b><font color=red> * </font>Favor digitar o seu Cidade corretamente.";
            $this->arrayErro[] = $this->_res_cidade;
            $erro = 1;
        }else{
            $erro = 0;
        }
            }
        return $erro;
    }
    
        function valida_cep_resp($_cep, $_mesmoEnd) {
            if($_mesmoEnd == 'nao'){
        if (empty($_cep)) {
            $this->_res_cep = "<b><font color=red> * </font>Favor digitar o seu CEP";
            $this->arrayErro[] = $this->_res_cep;
            $erro = 1;
        } elseif (is_numeric($_cep) == false) {
            $this->_res_cep = "<b><font color=red> * </font>Favor digitar o seu CEP corretamente.";
            $this->arrayErro[] = $this->_res_cep;
            $erro = 1;
        }else{
            $erro = 0;
        }
            }
        return $erro;
    }
    

    
}

?>
