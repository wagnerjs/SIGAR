<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ValidacaoDAO.php';

class validacaoPessoa {
        protected $_res_nome;
        protected $_res_email;
        protected $_res_telefone;
        protected $_res_telefone_resid;
        public $arrayErro = array();
        
        
        function valida_nome($_nome) {
        if (empty($_nome)) {
            $this->_res_nome = "<b><font color=red> * </font>Favor digitar seu nome</b>";
            $this->arrayErro[] = $this->_res_nome;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
    
        function valida_email($email) {
        $obj_validacaoDAO = new validacaoDAO;
        if (empty($email)) {
            $this->_res_email = "<b><font color=red> * </font>Favor digitar um email";
            $this->arrayErro[] = $this->_res_email;
            $erro = 1;
        } elseif ($obj_validacaoDAO->email_repetido($email) > 0) {
            $this->_res_email = "<b><font color=red> * </font>Email já cadastrado";
            $this->arrayErro[] = $this->_res_email;
            $erro = 1;
        } elseif (( strlen($email) < 8 ) || strstr($email, '@') == false || (strstr($email, '.') == false)) {
            $this->_res_email = "<b><font color=red> * </font>Favor digitar o seu e-mail corretamente.";
            $this->arrayErro[] = $this->_res_email;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;                        
    }
    
        function valida_telefone($_telefone) {
        if (is_numeric($_telefone) == false) {
            $this->_res_telefone = "<b><font color=red> * </font>Favor digitar o seu Telefone corretamente.";
            $this->arrayErro[] = $this->_res_telefone;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
    
        function valida_telefone_resid($_telefone_resid) {
        if (empty($_telefone_resid)) {
            $this->_res_telefone_resid = "<b><font color=red> * </font>Favor digitar o seu Telefone residencial.";
            $this->arrayErro[] = $this->_res_telefone_resid;
            $erro = 1;            
        }else{
            $erro = 0;
        }
        return $erro;
    }

    
    
}

?>
