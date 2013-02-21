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
    protected $_res_meioTransporte;
    protected $_res_materias;

    function valida_meio_transporte($meioDeTransporte){
        if(empty($meioDeTransporte)){
            $this->_res_meioTransporte = "<b><font color=red> * </font>Favor informar o meio de Transporte";
            $this->arrayErro[0] = $this->_res_meioTransporte;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;       
        
    }
    
       function valida_Materias($materias){
        if(empty($materias)){
            $this->_res_materias = "<b><font color=red> * </font>Favor informar uma Materia";
            $this->arrayErro[1] = $this->_res_materias;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;       
        
    }


}

?>
