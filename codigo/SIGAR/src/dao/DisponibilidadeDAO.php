<?php

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";

/**
 * Description of DisponibilidadeDAO
 *
 * @author Hebert
 */
class DisponibilidadeDAO {

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
     * Selecionar professores que ministram uma matéria determinada
     */

    public function selecionaProfessor($materia) {
        $this->criarConexao();

        $sql = "SELECT `professor`.`idProfessor`,`pessoa`.`nome` FROM `pessoa`, `usuario`,`professor_materia`,`materia`,`professor` WHERE `usuario`.`idPessoa` = `pessoa`.`idPessoa` AND `professor`.`idUsuario` = `usuario`.`idUsuario` AND `professor`.`idProfessor` = `professor_materia`.`idProfessor` AND `professor_materia`.`idMateria`=`materia`.`idMateria` AND `materia`.`descricaoMateria` = '" . $materia . "';";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = 0; // "Nada encontrado!"
        } else {
            $res = mysql_fetch_array($res);
        }
        $this->fecharConexao();
        return $res;
    }

    /*
     * Selecionar materias ministradas por um professor
     */

    public function selecionaMaterias($idProfessor) {
        $this->criarConexao();

        $sql = "SELECT `professor`.`idProfessor`,`materia`.`descricaoMateria`  FROM `materia`,`professor_materia`, `professor` WHERE `materia`.`idMateria`=`professor_materia`.`idMateria` AND `professor`.`idProfessor`=`professor_materia`.`idProfessor` AND `professor`.`idProfessor` = " . $idProfessor . ";";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = 0; // "Nada encontrado!"
        } else {
            $res = mysql_fetch_array($res);
        }
        $this->fecharConexao();

        return $res;
    }

    /*
     * Verifica se em um determinado dia o professor já tem aula marcada. 
     */

    public function verificaAulaMarcada($idProfessor, $data) {
        $this->criarConexao();
        $sql = "SELECT `agendamento`.`idAgendamento` FROM `agendamento` WHERE `agendamento`.`idProfessor`=" . $idProfessor . " AND `agendamento`.`data`='" . $data . "';";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = 0; // "Nenhuma aula marcada!"
        } else {
            $res = mysql_fetch_array($res);
        }

        $this->fecharConexao();
        return $res;
    }

    /*
     * Saber disponibilidade de um  professor de acordo com dia da semana e horário
     */

    public function verificaDisponibilidade($idProfessor, $diaDaSemana, $descricaoHorario) {
        $this->criarConexao();

        $sql = "SELECT `disponibilidade`.`idProfessor`,`dia`.`diaDaSemana`, `horario`.`descricao` FROM `disponibilidade`,`dia`,`horario` 
	WHERE `disponibilidade`.`idDisponibilidade`=`dia`.`idDisponibilidade` AND `dia`.`idDia`=`horario`.`idDia` AND `disponibilidade`.`idProfessor` = " . $idProfessor . " AND `dia`.`diaDaSemana`='" . $diaDaSemana . "' AND `horario`.`descricao`='" . $descricaoHorario . "';";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = 0; // "Nenhum dia disponível!"
        } else {
            $res = mysql_fetch_array($res);
        }

        $this->fecharConexao();
        return $res;
    }

    /*
     * Listar dias e horários disponiveis de um determinado professor 
     */

    public function listarDiasHorariosDisponiveis($idProfessor) {
        $this->criarConexao();

        $sql = "SELECT `disponibilidade`.`idProfessor`,`pessoa`.`nome`,`dia`.`diaDaSemana`, `horario`.`descricao` FROM `disponibilidade`,`dia`,`horario`,`pessoa`,`usuario`,`professor`
	WHERE `usuario`.`idPessoa` = `pessoa`.`idPessoa` 
	AND `professor`.`idUsuario` = `usuario`.`idUsuario` 
	AND `disponibilidade`.`idDisponibilidade`=`dia`.`idDisponibilidade` 
	AND `dia`.`idDia`=`horario`.`idDia` 
	AND `disponibilidade`.`idProfessor` = " . $idProfessor . ";";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = 0; // "Nenhum dia disponível!"
        } else {
            $res = mysql_fetch_array($res);
        }

        $this->fecharConexao();
        return $res;
    }

    /*
     * Função que insere na tabela disponibilidade
     */

    public function salvarDisponibilidade($idProfessor) {
        $idDisponibilidade = 0;
        $this->criarConexao();
        $sql = "INSERT INTO `sigar`.`disponibilidade` (`idDisponibilidade`, `idProfessor`) VALUES (NULL, '" . $idProfessor . "');";

        if (!mysql_query($sql)) {
            echo "Erro na inserção da tabela disponibilidade";
        } else {
            $idDisponibilidade = mysql_insert_id();
        }
        $this->fecharConexao();
        return $idDisponibilidade;
    }

    /*
     * Função que insere na tabela dia
     */

    public function salvarDia($idDisponibilidade, $diaDaSemana) {
        $idDia = 0;
        $this->criarConexao();
        $sql = "INSERT INTO `sigar`.`dia` (`idDia`, `idDisponibilidade`, `diaDaSemana`) VALUES (NULL, '" . $idDisponibilidade . "', '" . $diaDaSemana . "');";

        if (!mysql_query($sql)) {
            echo "Erro na inserção da tabela dia";
        } else {
            $idDia = mysql_insert_id();
        }
        $this->fecharConexao();
        return $idDia;
    }

    /*
     * Insere dados na tabela horário
     */

    public function salvarHorario($idDia, $descricaoHorario) {
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

    /*
     * Deletar horário
     */

    public function deletarHorario($idHorario) {
        $this->criarConexao();
        $sql = "DELETE FROM `sigar`.`horario` WHERE `horario`.`idHorario` = " . $idHorario . ";";

        if (mysql_query($sql)) {
            return 1; //deletado com sucesso
        } else {
            return 0; //Erro a deletat horario
        }
        $this->fecharConexao();
    }

    /*
     * Deletar dados da tabela dia
     */

    public function deletarDia($idDisponibilidade) {
        $this->criarConexao();
        $sql = "DELETE FROM `sigar`.`dia` WHERE `dia`.`idDisponibilidade` = " . $idDisponibilidade . ";";

        if (mysql_query($sql)) {
            return 1; //deletado com sucesso
        } else {
            return 0; //Erro a deletar dia
        }
        $this->fecharConexao();
    }
    
}

?>
