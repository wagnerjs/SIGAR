<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfessorCtrl
 *
 * @author Alex
 */
class ProfessorCtrl {
    
         public function apagarProfessor($idPessoaProfessor){
            $professorDAO = new ProfessorDAO();
            $professorDAO->deletarProfessor($idPessoaProfessor);
        }
}

?>
