<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/DisponibilidadeCtrl.php';
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
    
       public function setUp(){
        $this->idProfessor = 1;
        $this->diaDaSemana = "quarta";
        $this->descricaoHorario = "14:00 às 15:00";
    }
    
    
    public function testAdicionarDisponibilidade (){
       $DisponiblidadeCtrl = new DisponibilidadeCtrl();  
       $DisponiblidadeCtrl->adicionarDisponibilidade($this->idProfessor, $this->diaDaSemana, $this->descricaoHorario);
       
       $this->assertArrayHasKey(1,$DisponiblidadeCtrl->adicionarDisponibilidade($this->idProfessor, $this->diaDaSemana, $this->descricaoHorario));
       
    }
    
    public function testDeletarDisponibilidade(){
         $DisponiblidadeCtrl = new DisponibilidadeCtrl();  
         $DisponiblidadeCtrl->deletarDisponibilidade($this->idProfessor);
    }
    

}

?>
