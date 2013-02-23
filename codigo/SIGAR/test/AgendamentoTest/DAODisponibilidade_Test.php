<?php

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/DisponibilidadeDAO.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOValidaDisponibilidade
 *
 * @author Alex
 */

    

class DAOAtualizaDisponibilidade_Test extends PHPUnit_Framework_TestCase {

    protected $idProfessor = 1;
    protected $idProfessorErro = 1500;
    protected $disp;
    protected $dispErro = 3000;
    protected $diaSemana = "segunda";
    protected $idDia;
    protected $idDiaErro = 3000;
    protected $descricaoHorario = "10-12";
    protected $materia = "Matematica";
    protected $materiaErro = "erro";
    protected $dispObj;
    protected $data;
    protected $obj_conecta;
    protected $idAgendamento;
           


    public function criarConexao() {
        $this->obj_conecta = new bd();
        $this->obj_conecta->conecta();
        $this->obj_conecta->seleciona_bd();
    }

    public function fecharConexao() {
        $this->obj_conecta->fechaConexao();
    }

    public function popula_bd(){
        $this->criarConexao();
        
        $query = "INSERT INTO `sigar`.`agendamento` (`idAgendamento`, `idAluno`, `idProfessor`, `data`, `horario`, `status`, `materia`, `conteudo`) VALUES ('1', '2', '1', '2013-02-01', '14', 'marcada', 'matematica', 'xpto')";
        mysql_query($query);
        $this->idAgendamento = mysql_insert_id();
        $this->fecharConexao();
        
        
    }
    
    public function limpa_bd(){
        $this->criarConexao();
        
        $query = "DELETE FROM `agendamento` WHERE `idAgendamento` = $this->idAgendamento";
        mysql_query($query);
        $this->fecharConexao();
    }


    public function setUp() {
        $this->data = 2013-02-02;
                
        $dispObj = new DisponibilidadeDAO();
        $dispObj->verificaAulaMarcada($this->idProfessor, $this->data);
    }
    
    /**
     * @test
     *
     */
    public function TestGravarProfessor() {
        $this->popula_bd();
        $disponibilidade_DAO = new DisponibilidadeDAO();

        //Teste do método salvarDisponibilidade da classe DAO
        $this->assertNotNull($this->disp = $disponibilidade_DAO->salvarDisponibilidade($this->idProfessor));
        $this->assertNull($disponibilidade_DAO->salvarDisponibilidade($this->idProfessorErro));

        //Teste do método salvarDia da classe  DAO
        $this->assertNotNUll($this->idDia = $disponibilidade_DAO->salvarDia($this->disp, $this->diaSemana));
        $this->assertNUll($disponibilidade_DAO->salvarDia($this->dispErro, $this->diaSemana));

        //Teste do método salvarHorario da classe DAO
        $this->assertNotNUll($disponibilidade_DAO->salvarHorario($this->idDia, $this->descricaoHorario));
        $this->assertNUll($disponibilidade_DAO->salvarHorario($this->idDiaErro, $this->descricaoHorario));

        //Teste do método verificaDisponibilidade da classe DAO
        $this->assertNotNull($disponibilidade_DAO->verificaDisponibilidade($this->idProfessor, $this->diaSemana, $this->descricaoHorario));
        $this->assertNull($disponibilidade_DAO->verificaDisponibilidade($this->idProfessorErro, $this->diaSemana, $this->descricaoHorario));

        //Teste do método listarDiasHorariosDisponiveis da classe DAO
        $this->assertNotNull($disponibilidade_DAO->listarDiasHorariosDisponiveis($this->idProfessor));
        $this->assertNull($disponibilidade_DAO->listarDiasHorariosDisponiveis($this->idProfessorErro));

        //Teste do método selecionarIdDisponibilidade da classe DAO
        $this->assertNotNull($disponibilidade_DAO->selecionarIdDisponibilidade($this->idProfessor));
        $this->assertNull($disponibilidade_DAO->selecionarIdDisponibilidade($this->idProfessorErro));

        //Teste do método selecionarArrayIdDia da classe DAO
        $this->assertNotNull($disponibilidade_DAO->selecionarArrayIdDia($this->disp));
        $this->assertNull($disponibilidade_DAO->selecionarArrayIdDia($this->dispErro));
        
        //Teste do método selecionaProfessor da classe DAO
        $this->assertNotNull($disponibilidade_DAO->selecionaProfessor($this->materia));
        $this->assertNull($disponibilidade_DAO->selecionaProfessor($this->materiaErro));
        
        //Teste do método selecionaMaterias da classe DAO
        $this->assertNotNull($disponibilidade_DAO->selecionaMaterias($this->idProfessor));
        $this->assertNull($disponibilidade_DAO->selecionaMaterias($this->idProfessorErro));
        
        //Teste do método verificaAulaMarcada da classe DAO
        $this->assertNotNull($disponibilidade_DAO->verificaAulaMarcada($this->idProfessor, "2013-02-01"));
        $this->assertNull($disponibilidade_DAO->verificaAulaMarcada($this->idProfessorErro, "2013-02-01"));
        
        //Teste do método selecionarDia da classe DAO
        $this->assertNotNull($disponibilidade_DAO->selecionarIdDia($this->disp, $this->diaSemana));
        $this->assertNull($disponibilidade_DAO->selecionarIdDia($this->dispErro, $this->diaSemana));
            
        //Teste do método deletarHorario da classe DAO
        $this->assertEquals('1', $disponibilidade_DAO->deletarHorario($this->idDia));
        $this->assertEquals('0', $disponibilidade_DAO->deletarHorario("erro"));

        //Teste do método deletarDia da classe DAO
        $this->assertEquals(1, $disponibilidade_DAO->deletarDia($this->disp));
        $this->assertEquals(0, $disponibilidade_DAO->deletarDia("erro"));
        
        $this->limpa_bd();
    }

}

?>
