<?php
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/dao/EstatisticaDAO.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstatisticaCtrl
 *
 * @author Hebert
 */
class EstatisticaCtrl {
    //put your code here
    
    public function selecionarNumeroAgendamentos() {
        $estatisticaDao_obj = new EstatisticaDAO();
        
        $numeroAgendamentos = $estatisticaDao_obj->selecionarNumeroAgendamentos();
        
        return $numeroAgendamentos;
        
    }
    
    public function selecionarNumeroAlunos() {
        $estatisticaDao_obj = new EstatisticaDAO();
        
        $numeroAlunos = $estatisticaDao_obj->selecionarNumeroAlunos();
        
        return $numeroAlunos;
    }
    
    public function selecionarNumeroProfessores() {
         $estatisticaDao_obj = new EstatisticaDAO();
        
        $numeroProfessores = $estatisticaDao_obj->selecionarNumeroProfessores();
        
        return $numeroProfessores;
        
    }
}

?>
