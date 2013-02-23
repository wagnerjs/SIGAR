<?php

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Agendamento.class.php";

/**
 * Description of AgendamentoDAO
 *
 * @author Hebert
 */
class AgendamentoDAO {

    protected $obj_conecta;

    /*
     * Função para criar conexão e selecionar banco
     */

    public function criarConexao() {
        $this->obj_conecta = new bd();
        $this->obj_conecta->conecta();
        $this->obj_conecta->seleciona_bd();
    }

    public function fecharConexao() {
        $this->obj_conecta->fechaConexao();
    }

    /*
     * Alterar Status do agendamento
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

    public function agendarAula($idAluno, $idProfessor, Agendamento $agendamento) {
        $this->criarConexao();
        $idAgendamento = 0;
        $sql = "INSERT INTO `sigar`.`agendamento` (`idAgendamento`, `idAluno`, `idProfessor`, `data`, `horario`, `status`, `materia`, `conteudo`)
                                                    VALUES ('".  $idAgendamento."', '" . $idAluno . "', '" . $idProfessor . "', '" . $agendamento->getData() . "', '" . $agendamento->getHorario() . "',
                                                     '" . $agendamento->getStatus() . "', '" . $agendamento->getMateria() . "', '" . $agendamento->getConteudo() . "');";
        echo $idAgendamento;
        if (mysql_query($sql)) {
            $idAgendamento = mysql_insert_id(); 
        } else {
            $idAgendamento = null;
        }
        
        $this->fecharConexao();
        return $idAgendamento;
    }

    /*
     * Alterar um agendamento já existente
     */

    public function alterarAgendamento($idAgendamento, Agendamento $agendamento) {
        $this->criarConexao();
        $idAgendamento = 0;                                                                                                                                                             //(`idAgendamento`, `idAluno`, `idProfessor`, `data`, `horarioInicio`, `duracaoMarcada`, `duracaoReal`, `status`, `materia`, `conteudo`)
        $sql = "UPDATE  `sigar`.`agendamento` SET  `idAluno` =  '" . $agendamento->getIdAluno() . "',
                       `idProfessor` =  '" . $agendamento->getIdProfessor() . "',
                       `data` =  '" . $agendamento->getData() . "',
                       `horario` =  '" . $agendamento->getHorario() . "',
                       `status` =  '" . $agendamento->getStatus() . "',
                       `materia` =  '" . $agendamento->getMateria() . "',
                       `conteudo` =  '" . $agendamento->getConteudo() . "' 
                WHERE  `agendamento`.`idAgendamento` =" . $idAgendamento . ";";

        if (!mysql_query($sql)) {
            //Erro ao alterar dados
            echo "Erro: " . mysql_error();
            $idAgendamento = NULL;
        } else {
            $idAgendamento = mysql_insert_id();
        }
        $this->fecharConexao();
        return $idAgendamento;
    }

    /*
     * Excluir Agendamento
     */

    public function excluirAgendamento($idAgendamento) {
        $this->criarConexao();

        $sql = "DELETE FROM `sigar`.`agendamento` WHERE `agendamento`.`idAgendamento` = " . $idAgendamento . ";";

        if (!mysql_query($sql)) {
            return 0; //Erro a excluir agendamento
            echo "ERRO: " . mysql_error();
        } else {
            return 1; //Agendamento deletado com sucesso
        }

        $this->fecharConexao();
    }

    /*
     * Seleciona o idAgendamento de acordo com aluno, professor, data e horário
     */
    public function selecionaIdAgendamento(Agendamento $agendamento){
        $this->criarConexao();
        $sql = "SELECT * FROM  `agendamento` WHERE  `idAluno` =".$agendamento->getIdAluno()." 
                                             AND  `idProfessor` =".$agendamento->getIdProfessor()."
                                             AND  `data` =  '".$agendamento->getData()."'
                                             AND  `horario` =  '".$agendamento->getHorario()."';";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = 0; // "Nenhum agendamento!"
        } else {
            $res = mysql_fetch_array($res);
        }

        $this->fecharConexao();
        return $res;
        
    }
    
    /*
     * Seleciona professores que tem disponibilidade em um determinado dia e horário 
     */

    public function selecionaProfessoresDisponiveis($diaDaSemana,$horario,$materia) {
        $this->criarConexao();
        $sql = "SELECT `disponibilidade`.`idProfessor`,`pessoa`.`nome`,`dia`.`diaDaSemana`, `horario`.`descricao` 
                FROM `disponibilidade`,`dia`,`horario`,`pessoa` ,`usuario`,`professor`,`professor_materia`,`materia`
                WHERE `usuario`.`idPessoa` = `pessoa`.`idPessoa` 
                AND `professor`.`idUsuario` = `usuario`.`idUsuario` 
                AND `professor`.`idProfessor` = `professor_materia`.`idProfessor`
                AND `materia`.`idMateria` = `professor_materia`.`idMateria`
                AND `professor`.`idProfessor` = `disponibilidade`.`idProfessor` 
                AND `disponibilidade`.`idDisponibilidade`=`dia`.`idDisponibilidade` 
                AND `dia`.`idDia`=`horario`.`idDia` 
                AND `dia`.`diaDaSemana`='".$diaDaSemana."' 
                AND `horario`.`descricao`='".$horario."'
                AND `materia`.`descricaoMateria`='".$materia."';";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = 0; // "Nenhuma aula marcada!"
        } 
        $this->fecharConexao();
        return $res;
    }

    
}

?>
