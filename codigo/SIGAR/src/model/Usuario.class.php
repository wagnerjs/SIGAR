<?php

class Usuario extends Pessoa {
    
    function __construct($_login, $_senha) {
        $this->_login = $_login;
        $this->_senha = $_senha;
    }

        
    private $_login;
    private $_senha;

    public function setLogin($_login) {
        $this->_login = $_login;
    }

    public function setSenha($_senha) {
        $this->_senha = $_senha;
    }

    public function getLogin() {
        return $this->_login;
    }

    public function getSenha() {
        return $this->_senha;
    }

}

?>