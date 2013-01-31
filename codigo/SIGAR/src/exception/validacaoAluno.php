<?php

class validacaoAluno {

    protected $_res_escola;
    protected $_res_ano_escolar;
    public $arrayErro = array();

    function valida_escola($_escola) {
        if (empty($_escola)) {
            $this->_res_escola = "<b><font color=red> * </font>Favor informar a escola";
            $this->arrayErro[] = $this->_res_escola;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
    
        function valida_ano_escolar($_ano_escolar) {
        if (empty($_ano_escolar)) {
            $this->_res_ano_escolar = "<b><font color=red> * </font>Favor informar ano escolar";
            $this->arrayErro[] = $this->_res_ano_escolar;
            $erro = 1;
        }else{
            $erro = 0;
        }
        
        return $erro;
    }


}

?>
