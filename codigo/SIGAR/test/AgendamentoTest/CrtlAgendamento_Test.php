<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/AgendamentoCtrl.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/dao/AgendamentoDAO.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrtlDisponibilidade
 *
 * @author Guilherme Baufaker
 */
class CrtlAgendamento_Test extends PHPUnit_Framework_TestCase {

    protected $idAluno;
    protected $idProfessor;
    protected $data;
    protected $horario;
    protected $status;
    protected $materia;
    protected $conteudo;
    protected $diaDaSemana;
    protected $idAgendamento;

    public function setUp() {
        $this->idProfessor = 1;
        $this->idAluno = 2;
        $this->data = "2030-06-04";
        $this->horario = "21:00-23:00";
        $this->status = "Confirmado";
        $this->diaDaSemana = "segunda";
        $this->materia = "Filosofia";
        $this->conteudo = "Filosofos";
        $this->idAgendamento = "1";
    }

    /**
     * @test
     *
     */
    public function testSalvarAgendamento() {
        $agendamentoCtrl = new AgendamentoCtrl();
        $this->assertNotNull($agendamentoCtrl->salvarAgendamento($this->idAluno, $this->idProfessor, $this->data, $this->horario, $this->status, $this->materia, $this->conteudo));
        
    }

    /**
     * @test
     *
     */
    public function testVerificaAulaMarcada() {
        $agendamentoCtrl = new AgendamentoCtrl();
        $this->assertEquals(1, $agendamentoCtrl->verificaAulaMarcada($this->idProfessor, $this->data));
    }

    /**
     * @test
     *
     */
    public function testListarProfessoresDisponiveis() {
        $agendamentoCtrl = new AgendamentoCtrl();
        $this->assertNull($agendamentoCtrl->listarProfessoresDisponiveis($this->diaDaSemana, $this->horario, $this->materia));
    }

    /**
     * @test
     *
     */
    public function testListarAgendamento() {
        $agendamentoCtrl = new AgendamentoCtrl();
        $this->assertNull($agendamentoCtrl->listarAgendamento());
       
    }

    /**
     * @test
     *
     */
    public function testListarAgendamentoEspec() {
        $agendamentoCtrl = new AgendamentoCtrl();
        $this->assertNull($agendamentoCtrl->listarAgendamentoEspec($this->idAgendamento));
    }
    
    /**
     * @test
     *
     */
    public function testAlterarStatus() {
        $agendamentoCtrl = new AgendamentoCtrl();
        $this->assertNull($agendamentoCtrl->alterarStatus($this->idAgendamento, $this->status));
    }

}

?>
