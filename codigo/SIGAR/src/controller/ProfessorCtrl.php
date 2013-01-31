<?php
/**
 * author Matheus 
 */
class ProfessorCtrl {
    
      public function instanciarProfessor($nomeProfessor, $sexoProfessor,
            $nascProfessor, $emailProfessor, $telResProfessor,
            $celularProfessor, $enderecoProfessor, $cpfProfessor,
            $cepProfessor,$logradouroProfessor,$numeroCasaProfessor,$complementoProf, $bairoProfessor,
            $cidadeProfessor, $ufProfessor, $referenciaProfessor)
    {
     
        $objEndProfessor = new Endereco($cepProfessor,$logradouroProfessor,$numeroCasaProfessor,$complementoProf, $bairoProfessor,
            $cidadeProfessor, $ufProfessor, $referenciaProfessor);
        
     }
     
     public function instanciarAlterarProfessor($idPessoaProfessor,$nomeProfessor, $sexoProfessor,
            $nascProfessor, $emailProfessor, $telResProfessor,
            $celularProfessor, $enderecoProfessor, $cpfProfessor,
            $cepProfessor,$logradouroProfessor,$numeroCasaProfessor,$complementoProf, $bairoProfessor,
            $cidadeProfessor, $ufProfessor, $referenciaProfessor)
     {
         
     }
     
     public function listarProfessor()
     {
         $professorDao = new ProfessorDAO();
         $professorDao->listarProfessor($idPessoaProfessor);
         
     }

     
     public function listarMaterias($idPessoaProfessor)
     {
         $professorDao = new ProfessorDAO();
         $professorDao->selecionarMateriasProfessor($idPessoaProfessor);
         
     }
     
     public function apagarProfessor($idPessoaProfessor)
     {
         $professorDao = new ProfessorDAO();
         $professorDao->deletarProfessor($idPessoaProfessor);
     } 
}

?>
