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
            $res = NULL; // "Nada encontrado!"
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
        $obj_conecta = new bd();
        $obj_conecta->conecta();
        $obj_conecta->seleciona_bd();

        $sql = "SELECT `professor`.`idProfessor`,`materia`.`descricaoMateria`  FROM `materia`,`professor_materia`, `professor` WHERE `materia`.`idMateria`=`professor_materia`.`idMateria` AND `professor`.`idProfessor`=`professor_materia`.`idProfessor` AND `professor`.`idProfessor` = " . $idProfessor . ";";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = NULL; // "Nada encontrado!"
        } else {
            $res = mysql_fetch_array($res);
        }
        //$this->fecharConexao();

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
            $res = NULL; // "Nenhuma aula marcada!"
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
            $res = NULL; // "Nenhum dia disponível!"
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
        AND `professor`.`idProfessor` = `disponibilidade`.`idProfessor`
	AND `disponibilidade`.`idDisponibilidade`=`dia`.`idDisponibilidade` 
	AND `dia`.`idDia`=`horario`.`idDia` 
	AND `disponibilidade`.`idProfessor` = " . $idProfessor . ";";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = NULL; // "Nenhum dia disponível!"
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
            $idDisponibilidade = NULL;
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
            $idDia = NULL;
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
            $idHorario = NULL; //"Erro na inserção da tabela Horario"
        } else {
            $idHorario = mysql_insert_id();
        }
        $this->fecharConexao();
        return $idHorario;
    }

    /*
     * Antes de deletar utilize o metodo selecionaIdDia
     * Deletar horário
     */

    public function deletarHorario($idDia) {
        $retorno = 0;
        $this->criarConexao();
        $sql = "DELETE FROM `sigar`.`horario` WHERE `horario`.`idDia` = " . $idDia . ";";

        if (mysql_query($sql)) {
            $retorno = 1; //deletado com sucesso
        } else {
            $retorno = 0; //Erro a deletar horario
        }
        $this->fecharConexao();
        return $retorno;
    }

    /*
     * Deletar dados da tabela dia
     */

    public function deletarDia($idDisponibilidade) {
        $retorno = 0;
        $this->criarConexao();
        $sql = "DELETE FROM `sigar`.`dia` WHERE `dia`.`idDisponibilidade` = " . $idDisponibilidade . ";";

        if (mysql_query($sql)) {
            $retorno = 1; //deletado com sucesso
        } else {
            $retorno = 0; //Erro a deletar dia
        }
        $this->fecharConexao();
        return $retorno;
    }

    /*
     * Selecionar idDisponibilidade de acordo com o professor
     */

    public function selecionarIdDisponibilidade($idProfessor) {
        $this->criarConexao();

        $sql = "SELECT `disponibilidade`.`idDisponibilidade` FROM `disponibilidade` WHERE `disponibilidade`.`idProfessor` = " . $idProfessor . ";";
        $res = mysql_query($sql);
        $idDisponibilidade = 0;
        if (mysql_num_rows($res) == 0) {
            $idDisponibilidade = NULL; //Falha a selecionar o idDisponibilidade do professor
        } else {
            while ($aux = mysql_fetch_array($res)) {
                $idDisponibilidade = $aux['idDisponibilidade'];
            }
        }
        $this->fecharConexao();

        return $idDisponibilidade;
    }

    /*
     * Busca todos os idDia com o idDisponibilidade
     */

    public function selecionarArrayIdDia($idDisponibilidade) {
        $this->criarConexao();
        $retorno = 0;
        $sql = "SELECT `dia`.`idDia` FROM `dia` WHERE `dia`.`idDisponibilidade` = " . $idDisponibilidade . ";";

        $resultadoIdDia = mysql_query($sql);

        if (mysql_num_rows($resultadoIdDia) == 0) {
            $retorno = NULL; //Nenhum IdAluno encontrado
        } else {
            $retorno = $resultadoIdDia;
        }
        $this->fecharConexao();
        return $retorno;
    }

    /*
     * Busca todos os idDia com o idDisponibilidade
     */

    public function selecionarIdDia($idDisponibilidade, $diaDaSemana) {
        $this->criarConexao();

        $sql = "SELECT `dia`.`idDia` FROM `dia` WHERE `dia`.`idDisponibilidade` = " . $idDisponibilidade . " 
            AND `dia`.`diaDaSemana` = '" . $diaDaSemana . "';";

        $res = mysql_query($sql);
        $idDia = 0;
        if (mysql_num_rows($res) == 0) {
            $idDia = NULL; //Falha a selecionar o idDisponibilidade do professor
        } else {
            while ($aux = mysql_fetch_array($res)) {
                $idDia = $aux['idDia'];
            }
        }
        $this->fecharConexao();

        return $idDia;
    }

}

?>
