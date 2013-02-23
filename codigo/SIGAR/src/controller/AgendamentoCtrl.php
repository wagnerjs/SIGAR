<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Agendamento.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/AgendamentoDAO.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AgendamentoCtrl
 *
 * @author Hebert
 */
class AgendamentoCtrl {

    protected $resProfessoresDisponiveis;

    public function salvarAgendamento($idAluno, $idProfessor, $data, $horario, $status, $materia, $conteudo) {
        $agendamento_obj = new AgendamentoDAO();

        $agendamento = new Agendamento(NULL, $idAluno, $idProfessor, $data, $horario, $status, $materia, $conteudo);

        $agendamento_obj->agendarAula($idAluno, $idProfessor, $agendamento);
    }

    public function alterarStatus($idProfessor, $idAluno, $data, $status) {
        $agendamento_obj = new AgendamentoDAO();
        $agendamento_obj->alterarStatus($idProfessor, $idAluno, $data, $status);
    }

    public function listarProfessoresDisponiveis($data, $horario) {
        $disponibilidade_obj = new DisponibilidadeDAO();
        $agendamento_obj = new AgendamentoDAO();
        //listar todos os professores disponiveis naquele dia e horario
        $arrayProfessores = $agendamento_obj->selecionaProfessoresDisponiveis($data, $horario);
        if (mysql_num_rows($arrayProfessores) > 0) {
            $j = 0;
            for ($i = 0; $i < mysql_num_rows($arrayProfessores); $i++) {
                $idProfessor = mysql_result($arrayProfessores, $i, 'idProfessor');
                //Verificar se o professor já tem aula marcada naquele dia
                if ($disponibilidade_obj->verificaAulaMarcada($idProfessor, $data) == 0) {
                    //Se o professor não tem aula marcada então ele é retornado
                    $this->resProfessoresDisponiveis[$j] = mysql_result($arrayProfessores, $i);
                    $j++;
                }
            }
        }
    }

    public function getResposta() {
        return $this->resProfessoresDisponiveis;
    }

    /*
     * Seleciona a materia
     * Seleciona o dia
     * Seleciona o horário
     * Agenda um aula
     * **Listar professores que estão disponiveis pela materia dia e horário
     * 
     */
}

?>
