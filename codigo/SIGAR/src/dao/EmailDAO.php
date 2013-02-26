<?php

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";

class EmailDAO {
    protected $_obj_conecta;

    public function criarConexao() {
        $this->obj_conecta = new bd();
        $this->obj_conecta->conecta();
        $this->obj_conecta->seleciona_bd();
    }
    
    function criarListaEmails() {
        $this->criarConexao();

        $sql = "SELECT idPessoa, email FROM  `pessoa` ";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = "Nada encontrado!";
        }
        
        return $res;
    }
}

?>
