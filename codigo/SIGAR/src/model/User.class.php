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
