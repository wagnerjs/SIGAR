<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/validacaoAluno.php';
/**
 * Description of validaAluno_Test
 *
 * @author Hebert
 */
class validacaoAluno_Test extends PHPUnit_Framework_TestCase {
    
     /**
     * @test
     *
     */
    
    public function validaTesteAluno(){
        $validacaoAluno = new validacaoAluno();
        $this->assertEquals('0', $validacaoAluno->valida_ano_escolar('3 ano'));
        $this->assertEquals('1', $validacaoAluno->valida_ano_escolar(''));
        
        $this->assertEquals('0', $validacaoAluno->valida_escola('Marista'));
        $this->assertEquals('1', $validacaoAluno->valida_escola(''));
    }
    
    
    
}

?>
