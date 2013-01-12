<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Matheus
 */
interface CRUD {
    
    abstract function salvar();
    abstract function listar();
    abstract function alterar();
    abstract function deletar();
}

?>
