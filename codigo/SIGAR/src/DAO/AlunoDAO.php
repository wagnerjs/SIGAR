<?php


class AlunoDAO {
    
    public function salvarAluno(Aluno $aluno, Endereco $endereco, Responsavel $responsavel) {
        $query="Insert into endereco (cep, logradouro, numero, complemento, bairro, cidade, referencia, uf) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);     
        $stmt->bindValue(1, $endereco->getCep());
        $stmt->bindValue(2, $endereco->getEndereco());
        $stmt->bindValue(3, $endereco->getNumeroCasa());
        $stmt->bindValue(4, $endereco->getComplemento());
        $stmt->bindValue(5, $endereco->getBairro());
        $stmt->bindValue(6, $endereco->getCidade());
        $stmt->bindValue(7, $endereco->getReferencia());
        $stmt->bindValue(8, $endereco->getUf());
        
        $query2="Insert into pessoa (nome, email, endereco, telefoneResidencial, telefoneCelular, sexo, dataNascimento) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindValue(1, $aluno->getNome());
        $stmt2->bindValue(2, $aluno->getEmail());
        $stmt2->bindValue(3, $aluno->get_endereco());
        $stmt2->bindValue(4, $aluno->get_telefoneResidencial());
        $stmt2->bindValue(5, $aluno->getCelular());
        $stmt2->bindValue(6, $aluno->getSexo());
        $stmt2->bindValue(7, $aluno->getNascimento());
        
        $query3="Insert into aluno (anoEscolar, escola) VALUES(?, ?)";
        $stmt3 = $pdo->prepare($query3);
        $stmt3->bindValue(1, $aluno->getAnoEscolar());
        $stmt3->bindValue(2, $aluno->getEscola());
        
        $query4="Insert into responsavel (categoria, telefoneTrabalho, cpf) VALUES(?, ?, ?)";
        $stmt4 = $pdo->prepare($query4);
        $stmt4->bindValue(1, $responsavel->getCategoria());
        $stmt4->bindValue(2, $responsavel->getTelTrabalho());
        $stmt4->bindValue(3, $responsavel->getCpf());
        
        $stmt->execute();
        $stmt2->execute();
        $stmt3->execute();
        $stmt4->execute();
        
    } 
    

}

?>
