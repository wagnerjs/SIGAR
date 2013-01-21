<?php

class validacaoResponsavel {
    
    protected $_erro;
    protected $_res_valida_cpf;
    protected $_res_cpf_repetido;
    public $arrayErro = array();
    
    function validacpf($_cpf) {
        if (empty($_cpf)) {
            $this->_res_valida_cpf = "<b><font color=red> * </font>Favor digitar um cpf";
            $this->arrayErro[] = $this->_res_valida_cpf;
            $this->_erro = 1;
        } else {

            $_cpf = str_replace('.', '', $_cpf);
            $_cpf = str_replace('-', '', $_cpf);

            if (($_cpf == '11111111111') || ($_cpf == '22222222222') ||
                    ($_cpf == '33333333333') || ($_cpf == '44444444444') ||
                    ($_cpf == '55555555555') || ($_cpf == '66666666666') ||
                    ($_cpf == '77777777777') || ($_cpf == '88888888888') ||
                    ($_cpf == '99999999999') || ($_cpf == '00000000000')) {
                $this->_res_valida_cpf = "<b><font color=red> * </font>CPF inválido!";
                $this->arrayErro[] = $this->_res_valida_cpf;
                $this->_erro = 1;
            } else {
                $aux_cpf = "";
                for ($j = 0; $j < strlen($_cpf); $j++)
                    if (substr($_cpf, $j, 1) >= "0" AND substr($_cpf, $j, 1) <= "9")
                        $aux_cpf .= substr($_cpf, $j, 1);
                if (strlen($aux_cpf) != 11) {
                    $this->_res_valida_cpf = "<b><font color=red> * </font>CPF invalido!";
                    $this->arrayErro[] = $this->_res_valida_cpf;
                    $this->_erro = 1;
                } else {
                    $cpf1 = $aux_cpf;
                    $cpf2 = substr($_cpf, -2);
                    $controle = "";
                    $start = 2;
                    $end = 10;
                    $digito = 0;
                    for ($i = 1; $i <= 2; $i++) {
                        $soma = 0;
                        for ($j = $start; $j <= $end; $j++)
                            $soma += substr($cpf1, ( $j - $i - 1), 1) * ( $end + 1 + $i - $j );
                        if ($i == 2)
                            $soma += $digito * 2;
                        $digito = ( $soma * 10 ) % 11;
                        if ($digito == 10)
                            $digito = 0;
                        $controle .= $digito;
                        $start = 3;
                        $end = 11;
                    }
                    if ($controle != $cpf2) {
                        $this->_res_valida_cpf = "<b><font color=red> * </font>CPF inv�lido!";
                        $this->arrayErro[] = $this->_res_valida_cpf;
                        $this->_erro = 1;
                    }
                }
            }
        }
    }

    function cpf_repetido() {
        $obj_validacaoDAO = new validacaoDAO;
        $_cpf = str_replace('.', '', $_cpf);
        $_cpf = str_replace('-', '', $_cpf);

        if ($obj_validacaoDAO->cpf_repetidoDAO($_cpf) > 0) {
            $this->_res_cpf_repetido = "<b><font color=red> * </font>CPF já cadastrado!";
            $this->arrayErro[] = $this->_res_cpf_repetido;
            $this->_erro = 1;
        }
    }
    
}

?>
