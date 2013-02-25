<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/DisponibilidadeCtrl.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/dao/DisponibilidadeDAO.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrtlDisponibilidade
 *
 * @author Guilherme Baufaker
 */
class CrtlDisponibilidade_Test extends PHPUnit_Framework_TestCase {

    protected $idProfessor;
    protected $diaDaSemana;
    protected $descricaoHorario;

    public function setUp() {
        $this->idProfessor = 1;
        $this->diaDaSemana = "quarta";
        $this->descricaoHorario = "14:00 às 15:00";
    }

    /**
     * @test
     *
     */
    public function testAdicionarDisponibilidade() {
        $DisponiblidadeCtrl = new DisponibilidadeCtrl();
        $DisponiblidadeDAO = new DisponibilidadeDAO();
        $idDisponibilidade = $DisponiblidadeDAO->salvarDisponibilidade($this->idProfessor);

        //$DisponiblidadeCtrl->adicionarDisponibilidade($this->idProfessor, $this->diaDaSemana, $this->descricaoHorario);

        $this->assertArrayHasKey(1, $DisponiblidadeCtrl->adicionarDisponibilidade($this->idProfessor, $this->diaDaSemana, $this->descricaoHorario));
    }

    /**
     * @test
     *
     */
    public function testDeletarDisponibilidade() {
        $DisponiblidadeCtrl = new DisponibilidadeCtrl();
        $this->assertEquals('1',$DisponiblidadeCtrl->deletarDisponibilidade($this->idProfessor));
    }

    /**
     * @test
     *
     */
    public function testDeletarDisponibilidadeCascata() {
        $DisponiblidadeCtrl = new DisponibilidadeCtrl();
        $DisponiblidadeDAO = new DisponibilidadeDAO();
        $idDisponibilidade = $DisponiblidadeDAO->salvarDisponibilidade($this->idProfessor);
        $idDia = $DisponiblidadeDAO->salvarDia($idDisponibilidade, 'terça');
        $DisponiblidadeDAO->salvarHorario($idDia,'23:00-24:00');

        $this->assertEquals('1', $DisponiblidadeCtrl->deletarDisponibilidadeCascata($this->idProfessor));
        
        
    }
    
    /**
     * @test
     *
     */
    public function testListarHorariosDisponiveis() {
        $DisponiblidadeCtrl = new DisponibilidadeCtrl();
        $this->assertNull($DisponiblidadeCtrl->listarHorariosDisponiveis($this->idProfessor));
        $this->assertNull($DisponiblidadeCtrl->getResposta());
    }

}

?>
