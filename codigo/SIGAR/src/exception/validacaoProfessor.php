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
    
    function valida_meio_transporte($meioDeTransporte){
        if(empty($meioDeTrasporte)){
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;       
        
    }


}

?>
