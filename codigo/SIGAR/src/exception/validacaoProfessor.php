<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validacaoProfessor
 *
 * @author Alex
 */
class validacaoProfessor {
    
    protected $_meioDeTransporte;


    function valida_meio_transporte($_meioDeTransporte){
        if(empty($_meioDeTransporte)){
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;       
        
    }


}

?>
