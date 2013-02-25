<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Agendamento.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/AgendamentoDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/DisponibilidadeDAO.php';

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
    protected $res;

    public function salvarAgendamento($idAluno, $idProfessor, $data, $horario, $status, $materia, $conteudo) {
        $agendamento_obj = new AgendamentoDAO();

        $agendamento = new Agendamento(NULL, $idAluno, $idProfessor, $data, $horario, $status, $materia, $conteudo);

        $retorno = $agendamento_obj->agendarAula($idAluno, $idProfessor, $agendamento);
        
        return $retorno;
    }

    public function alterarStatus($idAgendamento, $status) {
        $agendamento_obj = new AgendamentoDAO();
        $agendamento_obj->alterarStatus($idAgendamento, $status);
    }
     
    public function listarProfessoresDisponiveis($diaDaSemana, $horario, $materia) {
        $agendamento_obj = new AgendamentoDAO();
        //listar todos os professores disponiveis naquele dia e horario
        //echo "Dia da Semana: ".$diaDaSemana." Horário: ".$horario." Matéria: ".$materia;
        $this->resProfessoresDisponiveis = $agendamento_obj->selecionaProfessoresDisponiveis($diaDaSemana, $horario, $materia);
        //echo "Resposta dentro CTRL".$this->resProfessoresDisponiveis."</br>";
        
    }
    /*
    if (mysql_num_rows($arrayProfessores) > 0) {
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
     * 
     */
    public function verificaAulaMarcada($idProfessor, $data){
        $disponibilidade_obj = new DisponibilidadeDAO();
        $retorno = 0;
        if($disponibilidade_obj->verificaAulaMarcada($idProfessor, $data) == NULL){
            $retorno = 0;    
        }else{
            $retorno = 1;
        }
        return $retorno;
        
    }

    public function getResposta() {
        return $this->resProfessoresDisponiveis;
    }
    
    public function listarAgendamento(){
        $agendamento_obj = new AgendamentoDAO();
        $this->res = $agendamento_obj->listarAgendamento();
    }
    
    public function listarAgendamentoEspec($idAgendamento){
        $agendamento_obj = new AgendamentoDAO();
        $this->res = $agendamento_obj->listarAgendamentoEspec($idAgendamento);
    }
    
    public function getRes() {
        return $this->res;
    }

}

?>
