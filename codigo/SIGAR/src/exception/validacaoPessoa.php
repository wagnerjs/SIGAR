<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ValidacaoDAO.php';

class validacaoPessoa {
        protected $_res_nome;
        protected $_res_email;
        protected $_res_telefone;
        protected $_res_telefone_resid;
        public $arrayErro = array();
        
        
        function valida_nome($_nome) {
        if (empty($_nome)) {
            $this->_res_nome = "<b><font color=red> * </font>Favor digitar seu nome</b>";
            $this->arrayErro[0] = $this->_res_nome;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
    
    function valida_email($email) {
        $obj_validacaoDAO = new validacaoDAO;
        if (empty($email)) {
            $this->_res_email = "<b><font color=red> * </font>Favor digitar um email";
            $this->arrayErro[1] = $this->_res_email;
            $erro = 1;
        } elseif ($obj_validacaoDAO->email_repetido($email) > 0) {
            $this->_res_email = "<b><font color=red> * </font>Email já cadastrado";
            $this->arrayErro[2] = $this->_res_email;
            $erro = 1;
        } elseif (( strlen($email) < 8 ) || strstr($email, '@') == false || (strstr($email, '.') == false)) {
            $this->_res_email = "<b><font color=red> * </font>Favor digitar o seu e-mail corretamente.";
            $this->arrayErro[3] = $this->_res_email;
            $erro = 1;
        }else{
            $erro = 0;
        }
            return $erro;                        
    }
    
    function valida_telefone_resid($_telefone_resid) {
    if (empty($_telefone_resid)) {
        $this->_res_telefone_resid = "<b><font color=red> * </font>Favor digitar o seu Telefone residencial.";
        $this->arrayErro[4] = $this->_res_telefone_resid;
        $erro = 1;            
    }else{
        $erro = 0;
    }
        return $erro;
    }
    
        function validacpf($cpf) {
        $erro = 0;

        $cpfTiraPonto = str_replace('.', '', $cpf);
        $cpfTiraTraço = str_replace('-', '', $cpfTiraPonto);
        $_cpf = $cpfTiraTraço;

        if (($_cpf == '11111111111') || ($_cpf == '22222222222') ||
                ($_cpf == '33333333333') || ($_cpf == '44444444444') ||
                ($_cpf == '55555555555') || ($_cpf == '66666666666') ||
                ($_cpf == '77777777777') || ($_cpf == '88888888888') ||
                ($_cpf == '99999999999') || ($_cpf == '00000000000')) {
            $this->_res_valida_cpf = "<b><font color=red> * </font>CPF inválido!";
            $this->arrayErro[5] = $this->_res_valida_cpf;
            $erro = 1;
        } else {
            $aux_cpf = "";
            for ($j = 0; $j < strlen($_cpf); $j++)
                if (substr($_cpf, $j, 1) >= "0" AND substr($_cpf, $j, 1) <= "9")
                    $aux_cpf .= substr($_cpf, $j, 1);
            if (strlen($aux_cpf) != 11) {
                $this->_res_valida_cpf = "<b><font color=red> * </font>CPF invalido!";
                $this->arrayErro[6] = $this->_res_valida_cpf;
                $erro = 1;
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
                    $this->_res_valida_cpf = "<b><font color=red> * </font>CPF inválido!";
                    $this->arrayErro[7] = $this->_res_valida_cpf;
                    $erro = 1;
                }
            }
        }
        
        return $erro;
    }

    function cpf_repetido($cpf) {
        $obj_validacaoDAO = new validacaoDAO;
        
        $cpfTiraPonto = str_replace('.', '', $cpf);
        $cpfTiraTraço = str_replace('-', '', $cpfTiraPonto);
        $_cpf = $cpfTiraTraço;

        if ($obj_validacaoDAO->cpf_repetidoDAO($_cpf) > 0) {
            $this->_res_cpf_repetido = "<b><font color=red> * </font>CPF já cadastrado!";
            $this->arrayErro[8] = $this->_res_cpf_repetido;
            $erro = 1;
        }else{
            $erro = 0;
        }
        return $erro;
    }
}

?>
