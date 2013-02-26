<?php
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Agendamento.class.php";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOAgendamento_Test
 *
 * @author Alex
 */
class DAOAgendamentoClass_Test extends PHPUnit_Framework_TestCase{
    protected $agendObj;
    protected $agendamento;
    protected $idAgendamento;
    protected $idAluno;
    protected $idProfessor;
    protected $idProfessorErro;
    protected $data;
    protected $horario;
    protected $status;
    protected $materia;
    protected $conteudo;
    
    
    public function setUP(){
    
    $this->idAgendamento = 1;
    $this->idAluno = 1;
    $this->idAlunoErro = "erro";
    $this->idProfessor = 1;
    $this->idProfessorErro = "erro";
    $this->data = 2013-02-01;
    $this->horario = "10-12";
    $this->status = "Marcado";
    $this->materia = "Matematica";
    $this->conteudo = "Trigonometria";
    }
    
    
    /**
     * @test
     *
     */
    public function TestAgendaAula(){

        
        $this->agendamento = new Agendamento();
        $this->agendamento->setConteudo($this->conteudo);
        $this->agendamento->setData($this->data);
        $this->agendamento->setHorario($this->horario);
        $this->agendamento->setIdAgendamento($this->idAgendamento);
        $this->agendamento->setIdAluno($this->idAluno);
        $this->agendamento->setIdProfessor($this->idProfessor);
        $this->agendamento->setMateria($this->materia);
        $this->agendamento->setStatus($this->status);
        
        
        $this->assertEquals($this->conteudo, $this->agendamento->getConteudo($this->conteudo));
        $this->assertEquals($this->data, $this->agendamento->getData($this->data));
        $this->assertEquals($this->horario, $this->agendamento->getHorario($this->horario));
        $this->assertEquals($this->idAluno, $this->agendamento->getIdAluno($this->idAluno));
        $this->assertEquals($this->idAgendamento, $this->agendamento->getIdAgendamento($this->idAgendamento));
        $this->assertEquals($this->idProfessor, $this->agendamento->getIdProfessor($this->idProfessor));
        $this->assertEquals($this->materia, $this->agendamento->getMateria($this->materia));
        $this->assertEquals($this->status, $this->agendamento->getStatus($this->status));
         
    }
}

?>
