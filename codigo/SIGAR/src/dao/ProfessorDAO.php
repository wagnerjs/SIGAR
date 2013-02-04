<?php

class ProfessorDAO {

    protected $_obj_conecta;

    public function criarConexao() {
        $this->obj_conecta = new bd();
        $this->obj_conecta->conecta();
        $this->obj_conecta->seleciona_bd();
    }

    //Função retorna dados do Professor
    public function listarProfessor($idProfessor) {
        //Cria a conexão com o banco de dados
        $this->criarConexao();

        $sql = "SELECT `pessoa`.*, `professor`.*, `endereco`.* 
                    FROM `professor`,`pessoa`,`endereco`,`usuario`  
                    WHERE `professor`.`idUsuario` = `usuario`.`idUsuario` 
                    AND `usuario`.`idPessoa` = `pessoa`.`idPessoa`  
                    AND `endereco`.`idEndereco` IN 
                    (SELECT `idEndereco` FROM `endereco_pessoa` 
                    WHERE `endereco_pessoa`.`idPessoa` = `pessoa`.`idPessoa`)
                    AND `professor`.`idProfessor` =" . $idProfessor . ";";

        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = "Nada encontrado!";
        } else {
            $res = mysql_fetch_array($res);
        }

        return $res;
    }

    //Função retorna todas as materias que o Professor pode ministrar
    public function selecionarMateriasProfessor($idProfessor) {
        //Cria a conexão com o banco de dados
        $this->criarConexao();

        $sql = "SELECT `materia`.`descricaoMateria` FROM `materia` , `professorMateria` , `professor`
                WHERE `professorMateria`.`idProfessor` = `professor`.`idProfessor`
                AND `materia`.`idMateria` = `professorMateria`.`idMateria`
                AND `professor`.`idProfessor` = " . $idProfessor . ";";
        $resultadoBusca = mysql_query($sql);

        while ($aux = mysql_fetch_array($resultadoBusca)) {
            $listaMateria = $aux['descricaoMateria'];
        }
        if (mysql_num_rows($resultadoBusca) == 0) {
            $listaMateria = "Nada encontrado! "; //Nenhum materia encontrada
        }


        return $listaMateria;
    }

    public function deletarProfessor($idPessoaProfessor) {
        $this->criarConexao();

        $sql = "SELECT  `professor`.`idProfessor` FROM  `usuario`, `professor` WHERE  `usuario`.`idUsuario` = `professor`.`idProfessor` AND `usuario`.`idPessoa`= " . $idPessoaProfessor . " ;";

        $resultadoProfessor = mysql_query($sql);
        while ($aux = mysql_fetch_array($resultadoProfessor)) {
            $idProfessor = $aux['idProfessor'];
        }

        $sql = "DELETE FROM `sigar`.`aluno` WHERE `aluno`.`idAluno` = " . $idProfessor . ";";


        $sql = "DELETE FROM `sigar`.`usuario` WHERE `usuario`.`idPessoa` = " . $idPessoaProfessor . ";";


        $sql = "SELECT  `endereco_pessoa`.`idEndereco_Pessoa` FROM  `sigar`.`endereco_pessoa` WHERE  `endereco_pessoa`.`idPessoa` =" . $idPessoaProfessor . ";";

        $resultadoEnderecoPessoa = mysql_query($sql);

        while ($aux = mysql_fetch_array($resultadoEnderecoPessoa)) {
            $idEndereco_Pessoa = $aux['idEndereco_Pessoa'];
        }

        $sql = "DELETE FROM `sigar`.`endereco_pessoa` WHERE `endereco_pessoa`.`idEndereco_Pessoa` = " . $idEndereco_Pessoa . " ;";

        $sql = "SELECT  `endereco_pessoa`.`idEndereco` FROM  `sigar`.`endereco_pessoa` WHERE  `endereco_pessoa`.`idPessoa` =" . $idPessoaProfessor . ";";

        $resultadoEndereco = mysql_query($sql);
        while ($aux = mysql_fetch_array($resultadoEndereco)) {
            $idEndereco = $aux['idEndereco'];
        }

        $sql = "DELETE FROM 'sigar'.'endereco' WHERE 'endereco'.'idEndereco' = " . $idEndereco . " ;";


        $sql = "DELETE FROM `sigar`.`pessoa` WHERE `pessoa`.`idPessoa` = " . $idPessoaProfessor . " ;";

        $retorno = mysql_affected_rows();


        return $retorno;
    }

    public function salvarPessoa(Professor $professor) {
        $idPessoaProfessor = 0;
        
        $this->criarConexao();
        
        $sql = "INSERT INTO `pessoa` (`idPessoa`, `nome`, `email`, `telefoneResidencial`, `telefoneCelular`, `sexo`, `dataNascimento`, `cpf`) VALUES
            (NULL,  '" . $professor->getNome() . "', '" . $professor->getEmail() . "', '" . $professor->getTelefoneResidencial() . "', '" . $professor->getCelular() . "', '" . $professor->getSexo() . "', '" . $professor->getNascimento() . "', '" . $professor->getCpf() . "');";

        if (!mysql_query($sql)) {
            echo "Erro na inserção de PessoaProfessor";
        } else {
            $idPessoaProfessor = mysql_insert_id();
        }

        return $idPessoaProfessor;
    }

    public function salvarUsuario($idPessoaProfessor, User $user) {
        $idPessoaUsuario = 0;
        
        $this->criarConexao();
        
        $sql = "INSERT INTO `usuario` (`idUsuario`, `login`, `senha`, `idPessoa`) VALUES
                  (NULL, '" . $user->getLogin() . "', '" . $user->getSenha() . "', '.$idPessoaProfessor.');";

        if (!mysql_query($sql)) {
            echo "Erro na inserção de UsuarioProfessor";
        } else {
            $idPessoaUsuario = mysql_insert_id();
        }

        return $idPessoaUsuario;
    }

    public function salvarProfessor($idPessoaUsuario, Professor $professor) {
        $idPessoaProfessor = 0;
        
        $this->criarConexao();
        
        $sql = "INSERT INTO `sigar`.`professor` (`idProfessor`, `meioTransporte`, `idUsuario`) VALUES 
                    (NULL, '" . $professor->getMeioTransporte() . "', '.$idPessoaUsuario.');";

        if (!mysql_query($sql)) {
            echo "Erro na inserção do Professor";
        } else {
            $idPessoaProfessor = mysql_insert_id();
        }

        return $idPessoaProfessor;
    }

    public function salvarMateriasProfessor($idPessoaProfessor, Professor $professor) {
        $arrayMaterias = $professor->getMateria();

        foreach ($arrayMaterias as $materia) {
            $sql = "INSERT INTO `sigar`.`professormateria` (`idProfessor`, `idMateria`) 
                        VALUES (" . $idPessoaProfessor . ", " . $materia . ");";
            if (!mysql_query($sql)) {
                echo "Erro na inserção das materias Professor";
                return 0;
            } else {
                
            }
        }
        return 1;
    }

    public function salvarProfessorEndereco(Professor $professor) {
        $idEnderecoProfessor = 0;
        $enderecoProfessor = $professor->getEndereco();

        $sql = "INSERT INTO `endereco` (`idendereco`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `referencia`, `uf`) VALUES 
                (NULL, '" . $enderecoProfessor->getCep() . "', '" . $enderecoProfessor->getLogradouro() . "', 
                " . $enderecoProfessor->getNumeroCasa() . ", '" . $enderecoProfessor->getComplemento() . "',
                '" . $enderecoProfessor->getBairro() . "', '" . $enderecoProfessor->getCidade() . "',
                '" . $enderecoProfessor->getReferencia() . "', '" . $enderecoProfessor->getUf() . "');";

        if (!mysql_query($sql)) {
            echo "Erro na inserção do Professor";
        } else {
            $idEnderecoProfessor = mysql_insert_id();
        }

        return $idEnderecoProfessor;
    }

    public function salvarEnderecoAssociativa($idEnderecoProfessor, $idPessoaProfessor) {

        $sql = "INSERT INTO `endereco_pessoa` (`idEndereco_Pessoa`, `idEndereco`, `idPessoa`) VALUES 
              (NULL, '" . $idEnderecoProfessor . "', '" . $idPessoaProfessor . "');";

        if (!mysql_query($sql)) {
            echo "Erro na inserção da entidade Associativa entre Pessoa e Endereço";
            return 0;
        }

        return 1;
    }

}

?>
