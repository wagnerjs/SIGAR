<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/EstatisticaCtrl.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CTRLEstatistica_test
 *
 * @author Alex
 */
class CTRLEstatistica_test extends PHPUnit_Framework_TestCase {

    protected $estat;

    public function setUp() {
        $this->estat = new EstatisticaCtrl();
    }

    /**
     * @test
     *
     */
    public function TesteSelecionaNumAgendamentos() {
        $this->assertNotNull($this->estat->selecionarNumeroAgendamentos());
    }

    /**
     * @test
     *
     */
    public function TesteSelecionaNumAlunos() {
        $this->assertNotNull($this->estat->selecionarNumeroAlunos());
    }

    /**
     * @test
     *
     */
    public function TesteSelecionaNumProfessores() {
        $this->assertNotNull($this->estat->selecionarNumeroProfessores());
    }

}

?>
