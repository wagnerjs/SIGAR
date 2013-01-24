<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Rafael
 */
class User {
    private $_login;
    private $_senha;

    public function setLogin($_login) {
        $this->_login = $_login;
    }

    public function setSenha($_senha) {
        $this->_senha = md5($_senha);
    }

    public function getLogin() {
        return $this->_login;
    }

    public function getSenha() {
        return $this->_senha;
    }
    
    public function cria_Usuario_Padrao($nome_aluno, $nascimentoAluno){
        /*
        $nome_array = strtolower($nome_aluno);
        $nome_array = explode(" ", $nome_aluno);
        $usuario = $nome_array[0].".".$nome_array[1];
        
        $senha_array = explode("-", $nascimentoAluno);
        $senha = "*".$nome_array[0].$senha_array[0];
    */
        $usuario="";
        $senha="";
        
        
        $user_obj = new User();
        $user_obj->setLogin($usuario);
        $user_obj->setSenha($senha);


        return $user_obj;

    }
    
}

?>
