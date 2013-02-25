<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/validacaoProfessor.php';

/**
 * Description of validacaoProfessor_Test
 *
 * @author Hebert
 */
class validacaoProfessor_Test extends PHPUnit_Framework_TestCase {

    protected $meioDeTransporte;
    protected $materia;

    public function setUp() {
        $this->meioDeTransporte = "Carro";
        $this->materia = "Matematica";

        $this->validaProf_obj = new validacaoProfessor();
    }

    /**
     * @test
     *
     */
    public function validaMeioDeTransporte() {
        
        $this->assertEquals('0', $this->validaProf_obj->valida_meio_transporte($this->meioDeTransporte));
        $this->assertEquals('1', $this->validaProf_obj->valida_meio_transporte(''));
    }
    
    /**
     * @test
     */
    public function validaMateria(){
         $this->assertEquals('0', $this->validaProf_obj->valida_Materias($this->materia));
         $this->assertEquals('1', $this->validaProf_obj->valida_Materias(''));
    }

}

?>
