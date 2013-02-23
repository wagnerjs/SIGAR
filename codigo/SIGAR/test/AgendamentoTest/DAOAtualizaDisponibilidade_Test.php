<?php
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/DisponibilidadeDAO.php";
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
     
         
     /**
     * @test
     *
     */
         
     public function TestGravarProfessor(){
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
         
         //Teste do método deletarHorario da classe DAO
         $this->assertEquals('1', $disponibilidade_DAO->deletarHorario($this->idDia));
         $this->assertEquals('0', $disponibilidade_DAO->deletarHorario("erro"));
         
         //Teste do método deletarDia da classe DAO
         $this->assertEquals(1, $disponibilidade_DAO->deletarDia($this->disp));
         $this->assertEquals(0, $disponibilidade_DAO->deletarDia("erro"));
     }
}

?>
