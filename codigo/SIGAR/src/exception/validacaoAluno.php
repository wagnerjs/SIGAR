<?php

class validacaoAluno {

    protected $_erro;
    protected $_res_escola;
    protected $_res_ano_escolar;

    function valida_escola($_escola) {
        if (empty($_escola)) {
            $this->_res_escola = "<b><font color=red> * </font>Favor informar a escola";
            $this->_erro = 1;
        }
    }
    
        function valida_ano_escolar($_ano_escolar) {
        if (empty($_ano_escolar)) {
            $this->_res_ano_escolar = "<b><font color=red> * </font>Favor informar ano escolar";
            $this->_erro = 1;
        }
    }

}

?>
