<?php
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/AgendamentoDAO.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ProfessorDAO.php";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOAgendamento_Test
 *
 * @author Alex
 */
class DAOAgendamento_Test extends PHPUnit_Framework_TestCase{
    protected $agendObj;
    protected $objProfDAO;
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
    $this->objProfDAO = new ProfessorDAO();
    
    $this->idAgendamento = NULL;
    $this->idAluno = 1;
    $this->idAlunoErro = "erro";
    $this->idProfessor = 1;
    $this->idProfessorErro = "erro";
    $this->data = 2013-02-01;
    $this->horario = "10-12";
    $this->status = "Confirmado";
    $this->materia = "Matematica";
    $this->conteudo = "";
    
    $this->agendObj = new Agendamento($this->idAgendamento, $this->idAluno, $this->idProfessor, $this->data, $this->horario, $this->status, $this->materia, $this->conteudo);
    }
    
    
    /**
     * @test
     *
     */
    public function TestAgendaAula(){
        $this->agendamento = new AgendamentoDAO();    
        
        //Teste do método alterarStatus da classe AgendamentoDAO
        $this->assertEquals(1, $this->agendamento->alterarStatus($this->idProfessor, $this->idAluno, $this->data, $this->status));
        $this->assertEquals(0, $this->agendamento->alterarStatus($this->idProfessorErro, $this->idAluno, $this->data, $this->status));
    
        //Teste do método agendarAula da classe AgendamentoDAO
        $this->assertNotNull($this->agendamento->agendarAula($this->idAluno, $this->idProfessor, $this->agendObj));
        $this->assertNull($this->agendamento->agendarAula($this->idAlunoErro, $this->idProfessor, $this->agendObj));
        
        //Teste do método alterarAgendamento da classe AgendamentoDAO
        $this->assertNotNull($this->agendamento->alterarAgendamento(1, $this->agendObj));
      //  $this->assertNull($this->agendamento->alterarAgendamento("erro", $this->agendObj));
        
        //Teste do método excluirAgendamento da classe AgendamentoDAO
        $this->assertEquals(1, $this->agendamento->excluirAgendamento(1));
        $this->assertEquals(0, $this->agendamento->excluirAgendamento("erro"));
    }
    
    //Teste para função criarCheckMaterias da classe ProfessorDAO
     /*
     * @test
     * 
     * 
     */
    public function testCheckMaterias(){
        $this->assertNotNull($this->objProfDAO->criarCheckMaterias());
    }
}

?>
