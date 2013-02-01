<?php
/**
 * author Matheus 
 */
class ProfessorCtrl {
    
      public function instanciarProfessor($nomeProfessor, $sexoProfessor,
            $nascProfessor, $emailProfessor, $telResProfessor,
            $celularProfessor, $enderecoProfessor, $cpfProfessor, $meioDeTransporte,
            $cepProfessor,$logradouroProfessor,$numeroCasaProfessor,$complementoProf, $bairoProfessor,
            $cidadeProfessor, $ufProfessor, $referenciaProfessor)
    {
     
        $objEndProfessor = new Endereco($cepProfessor,$logradouroProfessor,$numeroCasaProfessor,$complementoProf, $bairoProfessor,
            $cidadeProfessor, $ufProfessor, $referenciaProfessor);
        
        $userObj = new User();
        $userObj->cria_Usuario_Padrao($nomeProfessor, $nascProfessor);
        
        $professor = new Professor($nomeProfessor, $sexoProfessor,$nascProfessor, $emailProfessor, $telResProfessor,
                                   $celularProfessor, $enderecoProfessor, $cpfProfessor, $meioDeTransporte, $objEndProfessor,$userObj);
        
        $professorDao = new ProfessorDAO();
        $idProfPessoa = $professorDao->salvarPessoa($professor);
        $idPessoaUser = $professorDao->salvarUsuario($idProfPessoa, $userObj);
        $professorDao->salvarProfessor($idPessoaUser, $professor);
         if($idProfPessoa == 1 && $idPessoaUser == 1)
        {
            return 'Cadastro de Professor com Sucesso';
        }
        
        else{
            return 'Cadastrado não Efetuado';
        }
        
       
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
