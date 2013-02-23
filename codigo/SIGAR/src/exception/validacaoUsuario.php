<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ValidacaoDAO.php';

class validacaoUsuario {

    protected $_res_nome_usuario;
    protected $_res_caracteres_senha;
    protected $_res_nome_senha;
  
    function valida_nomeusuario($_nome_usuario) {
        $obj_validacaoDAO = new validacaoDAO;
        //Se foi encontrado algum resultado retorna 1, caso contrario 0.
        if ($obj_validacaoDAO->valida_nomeusuario($_nome_usuario) > 0) {
            $this->_res_nome_usuario = "<b><font color=red> * </font>Usuário já cadastrado";
            $erro = 1;
        } else
            if (strlen($_nome_usuario) < 5) {
            $this->_res_nome_usuario = "<b><font color=red> * </font>O Nome do usuário deve possuir no mínimo 5 caracteres.";
            $erro = 1;
        }else{
            $erro =0;
        }
        
        return $erro;
    }

    function caracteres_senha($_senha) {
        if (strlen($_senha) < 5) {
            $this->_res_caracteres_senha = "<b><font color=red> * </font>A senha deve possuir no mínimo 5 caracteres.";
            $erro= 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
    
        function valida_nome_senha($_nome_usuario, $_senha) {
        if ($_nome_usuario == $_senha) {
            $this->_res_nome_senha = "<b><font color=red> * </font>O nome do usuário e a senha devem ser diferentes.";
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }

}

?>
