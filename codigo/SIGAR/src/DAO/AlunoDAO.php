<?php

require_once '../src/include/conexao.class.php';
class AlunoDAO {
    
    //Salvar ALuno
    public function salvarAluno(Aluno $aluno) {
           
        $obj_conecta = new bd;
			$obj_conecta->conecta();
			$obj_conecta->seleciona_bd();
        
            $sql= "INSERT INTO `pessoa` (`idPessoa`, `nome`, `email`, `telefoneResidencial`, `telefoneCelular`, `sexo`, `dataNascimento`, `cpf`) VALUES
                (NULL,  '".$aluno->getNome()."', '".$aluno->getEmail()."', '".$aluno->get_telefoneResidencial()."', '".$aluno->getCelular()."', '".$aluno->getSexo()."', '".$aluno->getNascimento()."', '".$aluno->getCpf()."');";
            
            mysql_query($sql);
            
            

            if(mysql_affected_rows()==1){
                return 1;
            }
        else {
                return 0;
             }
           
            
            
           
           
        
    } 
    

}

?>
