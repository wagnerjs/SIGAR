<?php

require_once '../src/include/conexao.class.php';
class AlunoDAO {
    
    
    
    public function salvarAluno(Aluno $aluno) {
        //Cria a conexão com o banco de dados
        $obj_conecta = new bd();
            $obj_conecta->conecta();
            $obj_conecta->seleciona_bd();
        
        $sql= "INSERT INTO `pessoa` (`idPessoa`, `nome`, `email`, `telefoneResidencial`, `telefoneCelular`, `sexo`, `dataNascimento`, `cpf`) VALUES
            (NULL,  '".$aluno->getNome()."', '".$aluno->getEmail()."', '".$aluno->get_telefoneResidencial()."', '".$aluno->getCelular()."', '".$aluno->getSexo()."', '".$aluno->getNascimento()."', '".$aluno->getCpf()."');";
        mysql_query($sql);
        
        $linha = mysql_affected_rows();

        return $linha;
    }
}
?>
