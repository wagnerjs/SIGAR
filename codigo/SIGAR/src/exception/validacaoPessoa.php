<?php

class validacaoPessoa {
        protected $_res_nome;
        protected $_res_email;
        protected $_res_telefone;
        protected $_res_telefone_resid;
        protected $_erro;
    
        function valida_nome($_nome) {
        if (empty($_nome)) {
            $this->_res_nome = "<b><font color=red> * </font>Favor digitar seu nome</b>";
            $this->_erro = 1;
        }
    }
    
        function valida_email($email) {
        $obj_validacaoDAO = new validacaoDAO;
        if (empty($email)) {
            $this->_res_email = "<b><font color=red> * </font>Favor digitar um email";
            $this->_erro = 1;
        } elseif ($obj_validacaoDAO->email_repetido($email) > 0) {
            $this->_res_email = "<b><font color=red> * </font>Email já cadastrado";
            $this->_erro = 1;
        } elseif (( strlen($this->_email) < 8 ) || strstr($this->_email, '@') == false || (strstr($this->_email, '.') == false)) {
            $this->_res_email = "<b><font color=red> * </font>Favor digitar o seu e-mail corretamente.";
            $this->_erro = 1;
        }
                        
    }
    
        function valida_telefone($_telefone) {
        if (is_numeric($_telefone) == false) {
            $this->_res_telefone = "<b><font color=red> * </font>Favor digitar o seu Telefone corretamente.";
            $this->_erro = 1;
        }
    }
    
        function valida_telefone_resid($_telefone_resid) {
        if (empty($_telefone_resid)) {
            $this->_res_telefone_resid = "<b><font color=red> * </font>Favor digitar o seu Telefone residencial.";
            $this->_erro = 1;            
        }
    }

    
    
}

?>
