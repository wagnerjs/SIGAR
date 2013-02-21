<?php

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";

/**
 * Description of AgendamentoDAO
 *
 * @author Hebert
 */
class AgendamentoDAO {

    protected $obj_conecta;

    public function criarConexao() {
        $this->obj_conecta = new bd();
        $this->obj_conecta->conecta();
        $this->obj_conecta->seleciona_bd();
    }

    public function fecharConexao() {
        $this->obj_conecta->fechaConexao();
    }

    /*
     * Alterar Status
     */
    public function alterarStatus($idProfessor, $idAluno, $data, $status) {
        $this->criarConexao();

        $sql = "UPDATE  `sigar`.`agendamento` SET  `status` =  '" . $status . "' WHERE  `agendamento`.`idProfessor` = " . $idProfessor . "  AND  `agendamento`.`idProfessor`= " . $idAluno . " AND `agendamento`.`data` = '" . $data . "' ;";

        if (mysql_query($sql)) {
            return 1; //Status alterado com sucesso
        } else {
            return 0; //Erro na alteração do Status
        }
    }
    
    /*
     * Agendar Aula
     */
        public function agendarAula($idDia, $descricaoHorario) {
        $idHorario = 0;
        $this->criarConexao();
        $sql = "INSERT INTO `sigar`.`horario` (`idHorario`, `idDia`, `descricao`) VALUES (NULL, '" . $idDia . "', '" . $descricaoHorario . "');";

        if (!mysql_query($sql)) {
            $idHorario = 0; //"Erro na inserção da tabela Horario"
        } else {
            $idHorario = mysql_insert_id();
        }
        $this->fecharConexao();
        return $idHorario;
    }

}

?>
