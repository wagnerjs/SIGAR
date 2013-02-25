<?php

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";

class ProfessorDAO {

    protected $_obj_conecta;

    public function criarConexao() {
        $this->obj_conecta = new bd();
        $this->obj_conecta->conecta();
        $this->obj_conecta->seleciona_bd();
    }

    //Função retorna dados do Professor
    public function listarTodosProfessores() {
        //Cria a conexão com o banco de dados
        $this->criarConexao();

        $sql = "SELECT `pessoa`.*, `professor`.*, `endereco`.* 
                    FROM `professor`,`pessoa`,`endereco`,`usuario`  
                    WHERE `professor`.`idUsuario` = `usuario`.`idUsuario` 
                    AND `usuario`.`idPessoa` = `pessoa`.`idPessoa`  
                    AND `endereco`.`idEndereco` IN 
                    (SELECT `idEndereco` FROM `endereco_pessoa` 
                    WHERE `endereco_pessoa`.`idPessoa` = `pessoa`.`idPessoa`);";

        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = "Nada encontrado!";
        }

        return $res;
    }

    public function selecionarIdPessoaProfessor($idProfessor) {
        $this->criarConexao();

        $sql = "SELECT `usuario`.`idPessoa` FROM `usuario`,`professor` 
                    WHERE `usuario`.`idUsuario` = `professor`.`idUsuario` AND
                    `professor`.`idProfessor` =" . $idProfessor . ";";

        $resultadoIdProfessor = mysql_query($sql);
        $idPessoaProfessor = 0;
        while ($aux = mysql_fetch_array($resultadoIdProfessor)) {
            $idPessoaProfessor = $aux['idPessoa'];
        }
        if (mysql_num_rows($resultadoIdProfessor) == 0) {
            $idPessoaProfessor = "Nada encontrado! "; //Nenhum IdAluno encontrado
        }

        return $idPessoaProfessor;
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

        $sql = "SELECT `materia`.`descricaoMateria`,`materia`.`idMateria` FROM `materia` , `professor_Materia` , `professor`
                WHERE `professor_Materia`.`idProfessor` = `professor`.`idProfessor`
                AND `materia`.`idMateria` = `professor_Materia`.`idMateria`
                AND `professor`.`idProfessor` = " . $idProfessor . ";";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            return 0; //"Nada encontrado!"
        }
        return $res;
    }

    public function deletarProfessor($idProfessor) {
        $this->criarConexao();

        $res = $this->deletarMateriasProfessor($idProfessor);
        if ($res == 1) {
            //DAdos deletados da asociativa com sucesso
        } else {
            echo "Falha ao deletar os dados da tabela associativa materiasProfessor para alterar";
            return 0;
        }

        $idPessoaProfessor = $this->selecionarIdPessoaProfessor($idProfessor);

        $sql = "DELETE FROM `sigar`.`professor` WHERE `professor`.`idProfessor` = " . $idProfessor . ";";
        $res = mysql_query($sql);
        if ($res) {
            //deletedo com sucesso
            $retorno = 1;
        } else {
            //erro ao deletar
            $retorno = 0;
        }

        $sql = "DELETE FROM `sigar`.`usuario` WHERE `usuario`.`idPessoa` = " . $idPessoaProfessor . ";";
        $res = mysql_query($sql);
        if ($res) {
            //deletedo com sucesso
            $retorno = 1;
        } else {
            //erro ao deletar
            $retorno = 0;
        }

        $idEndereco = $this->selecionarIdEndereco($idPessoaProfessor);

        $sql = "DELETE FROM `sigar`.`endereco_pessoa` WHERE `endereco_pessoa`.`idEndereco` = " . $idEndereco . " ;";
        $res = mysql_query($sql);
        if ($res) {
            //deletedo com sucesso
            $retorno = 1;
        } else {
            //erro ao deletar
            $retorno = 0;
        }


        $sql = "DELETE FROM `sigar`.`endereco` WHERE `endereco`.`idEndereco` = " . $idEndereco . " ;";
        $res = mysql_query($sql);
        if ($res) {
            //deletedo com sucesso
            $retorno = 1;
        } else {
            //erro ao deletar
            $retorno = 0;
        }


        $sql = "DELETE FROM `sigar`.`pessoa` WHERE `pessoa`.`idPessoa` = " . $idPessoaProfessor . " ;";
        $res = mysql_query($sql);
        if ($res) {
            //deletedo com sucesso
            $retorno = 1;
        } else {
            //erro ao deletar
            $retorno = 0;
        }

        return $retorno;
    }

    public function deletarMateriasProfessor($idProfessor) {

        $sql = "DELETE FROM  `sigar`.`professor_materia` WHERE  `professor_materia`.`idProfessor` =" . $idProfessor . ";";
        mysql_query($sql);

        return 1;
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
        echo $sql;
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
                    (NULL, '" . $professor->getMeioDeTransporte() . "', '.$idPessoaUsuario.');";

        if (!mysql_query($sql)) {
            echo "Erro na inserção do Professor";
        } else {
            $idPessoaProfessor = mysql_insert_id();
        }

        return $idPessoaProfessor;
    }

    public function salvarMateriasProfessor($idProfessor, Professor $professor) {
        $arrayMaterias = $professor->getMateria();
        $count = count($arrayMaterias);
        for ($i = 0; $i < $count; $i++) {
            $sql = "INSERT INTO `sigar`.`professor_materia` (`idProfessor`, `idMateria`) 
                        VALUES (" . $idProfessor . ", " . $arrayMaterias[$i] . ");";
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

    public function alterarProfessor($idProfessor, Professor $professor) {
        $retorno = 0;

        if ($idProfessor <= 0) {
            return 0;
        }
        $this->criarConexao();

        $sql = "UPDATE `sigar`.`professor` SET `meioTransporte` = '" . $professor->getMeioDeTransporte() . "' WHERE `professor`.`idProfessor` =" . $idProfessor . ";";
        $alteraTabProfessor = mysql_query($sql);

        if ($alteraTabProfessor) {
            $retorno++;
        } else {
            //Usuario não pode ser alterado         
        }

        return $retorno;
    }

    public function alterarMateriasProfessor($idProfessor, Professor $professor) {
        $res = $this->deletarMateriasProfessor($idProfessor);
        if ($res == 1) {
            //DAdos deletados da asociativa com sucesso
        } else {
            echo "Falha ao deletar os dados da tabela associativa materiasProfessor para alterar";
            return 0;
        }

        $retorno = $this->salvarMateriasProfessor($idProfessor, $professor);
        if ($retorno == 1) {
            //Tabela associativa de materias alterada com sucesso
        } else {
            echo "Falha na alteração da tabela associativa materiasProfessor";
            return 0;
        }
        return $retorno;
    }

    public function alterarUsuario($idPessoaProfessor, User $user) {
        $retorno = 0;

        if ($idPessoaProfessor <= 0) {
            return 0;
        }

        $this->criarConexao();

        $sql = "UPDATE `usuario` SET  `login` =  '" . $user->getLogin() . "', `senha` = '" . $user->getSenha() . "' WHERE  `usuario`.`idPessoa` = " . $idPessoaProfessor . ";";

        $alteraTabUsuario = mysql_query($sql);
        echo "<alteraTAB>" . $alteraTabUsuario . "<alteraTAB>";

        if ($alteraTabUsuario) {
            $retorno++;
        } else {
            //Usuario não pode ser alterado         
        }

        return $retorno;
    }

    public function alterarPessoaProfessor($idPessoaProfessor, Professor $professor) {
        $retorno = 0;
        $this->criarConexao();

        if ($idPessoaProfessor <= 0) {
            return 0;
        }

        $sql = "UPDATE  `pessoa` SET  `nome` =  '" . $professor->getNome() . "', `email` =  '" . $professor->getEmail() . "', 
                        `telefoneResidencial` =  '" . $professor->getTelefoneResidencial() . "', `telefoneCelular` =  '" . $professor->getCelular() . "',
                        `sexo` =  '" . $professor->getSexo() . "', `dataNascimento` =  '" . $professor->getNascimento() . "', 
                        `cpf` = '" . $professor->getCpf() . "' WHERE  `pessoa`.`idPessoa` =" . $idPessoaProfessor . " ;";

        $alteraTabPessoa = mysql_query($sql);

        if ($alteraTabPessoa) {
            $retorno++;
        } else {
            //Pessoa não pode ser alterado         
        }

        return $retorno;
    }

    public function selecionarIdEndereco($idPessoaProfessor) {
        //Cria a conexão com o banco de dados
        $this->criarConexao();

        if ($idPessoaProfessor <= 0) {
            return 0;
        }

        $sql = "SELECT `endereco_pessoa`.`idEndereco` FROM `endereco_pessoa` 
                WHERE `endereco_pessoa`.`idPessoa` = " . $idPessoaProfessor . ";";

        $resultadoBusca = mysql_query($sql);

        while ($aux = mysql_fetch_array($resultadoBusca)) {
            $idEndereco = $aux['idEndereco'];
        }
        if (mysql_num_rows($resultadoBusca) == 0) {
            $idEndereco = -1; //Nenhum endereco encontrado
            echo "ERRO no metodo [selecionarIdEndereco] ";
        }


        return $idEndereco;
    }

    public function alterarEndereco($idPessoaProfessor, Professor $professor) {
        $retorno = 0;
        $this->criarConexao();

        if ($idPessoaProfessor <= 0) {
            return 0;
        }

        $idEndereco = $this->selecionarIdEndereco($idPessoaProfessor);

        $enderecoProfessor = $professor->getEndereco();

        $sql = "UPDATE `sigar`.`endereco` SET `cep` = '" . $enderecoProfessor->getCep() . "',`logradouro` = '" . $enderecoProfessor->getLogradouro() . "',`numero` = " . $enderecoProfessor->getNumeroCasa() . ",`complemento` = '" . $enderecoProfessor->getComplemento() . "',`bairro` = '" . $enderecoProfessor->getBairro() . "',`cidade` = '" . $enderecoProfessor->getCidade() . "',`referencia` = '" . $enderecoProfessor->getReferencia() . "',`uf` = '" . $enderecoProfessor->getUf() . "' WHERE `endereco`.`idendereco` = " . $idEndereco . ";";

        $alteraTabEndereco = mysql_query($sql);

        if ($alteraTabEndereco) {
            $retorno++; //Tabela endereço professor alterada com sucesso
        } else {
            echo "ERRO no metodo [alterarEndereco] ";
        }
        return $retorno;
    }

    public function selecionarIdProfessor($idUsuario) {
        $this->criarConexao();

        $sql = "SELECT `professor`.`idProfessor` FROM `usuario`,`professor`
                WHERE `usuario`.`idUsuario` = `professor`.`idUsuario` 
                AND `usuario`.`idUsuario` =".$idUsuario.";";

        $resultadoIdProfessor = mysql_query($sql);
        $idProfessor = 0;
        while ($aux = mysql_fetch_array($resultadoIdProfessor)) {
            $idProfessor = $aux['idProfessor'];
        }
        if (mysql_num_rows($resultadoIdProfessor) == 0) {
            $idProfessor = "Nada encontrado! "; //Nenhum IdAluno encontrado
        }

        return $idProfessor;
    }

    function criarCheckMaterias() {
        $this->criarConexao();

        $sql = "SELECT * FROM `materia`;";
        $res = mysql_query($sql);

        if (mysql_num_rows($res) == 0) {
            $res = "Nada encontrado!";
        }

        return $res;
    }

}

?>
