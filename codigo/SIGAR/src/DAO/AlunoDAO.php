<?php
/*$diretorioRaiz = $_SERVER['DOCUMENT_ROOT'];
$urlBD =  $diretorioRaiz."/SIGAR/codigo/SIGAR/src/utils/conexao.class.php";
$urlEndereco = $diretorioRaiz."/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";*/
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";

class AlunoDAO {
    
    protected $_res;
    
    public function salvarAluno(Aluno $aluno, Responsavel $responsavel, User $user) {
        //Cria a conexão com o banco de dados
        $obj_conecta = new bd();
            $obj_conecta->conecta();
            $obj_conecta->seleciona_bd();
        
        $sql= "INSERT INTO `pessoa` (`idPessoa`, `nome`, `email`, `telefoneResidencial`, `telefoneCelular`, `sexo`, `dataNascimento`, `cpf`) VALUES
            (NULL,  '".$aluno->getNome()."', '".$aluno->getEmail()."', '".$aluno->get_telefoneResidencial()."', '".$aluno->getCelular()."', '".$aluno->getSexo()."', '".$aluno->getNascimento()."', '".$aluno->getCpf()."');";
        mysql_query($sql);
        $idPessoaAluno = mysql_insert_id();
        
        $sql= "INSERT INTO `usuario` (`idUsuario`, `login`, `senha`, `idPessoa`) VALUES 
        (NULL, '".$user->getLogin()."', '".$user->getSenha()."', '.$idPessoaAluno.');";
        mysql_query($sql);
        $idUsuarioAluno = mysql_insert_id();
        
        $sql= "INSERT INTO `pessoa` (`idPessoa`, `nome`, `email`, `telefoneResidencial`, `telefoneCelular`, `sexo`, `dataNascimento`, `cpf`) VALUES
        (NULL,  '".$responsavel->getNome()."', '".$responsavel->getEmail()."', '".$responsavel->get_telefoneResidencial()."', '".$responsavel->getCelular()."', '".$responsavel->getSexo()."', '".$responsavel->getNascimento()."', '".$responsavel->getCpf()."');";
        mysql_query($sql);
        $idPessoaResponsavel = mysql_insert_id();
        
        $sql = "INSERT INTO `responsavel` (`idResponsavel`, `categoria`, `telefoneTrabalho`, `idPessoa`) VALUES 
        (NULL, '".$responsavel->getCategoria()."', '".$responsavel->getTelTrabalho()."', '.$idPessoaResponsavel.');";
        mysql_query($sql);
        $idResponsavel = mysql_insert_id();
         
        $sql = "INSERT INTO `aluno` (`idAluno`, `anoEscolar`, `escola`, `idResponsavel`, `idUsuario`) VALUES 
        (NULL, '".$aluno->getAnoEscolar()."', '".$aluno->getEscola()."', '".$idResponsavel."', '".$idUsuarioAluno."');";
        mysql_query($sql);
        //$idAluno = mysql_insert_id();
        
        //$enderecoAluno = new Endereco();
        $enderecoAluno = $aluno->get_endereco();
        
        //$enderecoResponsavel = new Endereco();
        $enderecoResponsavel = $responsavel->get_endereco();
        
        $sql = "INSERT INTO `endereco` (`idendereco`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `referencia`, `uf`) VALUES 
        (NULL, '".$enderecoAluno->getCep()."', '".$enderecoAluno->getLogradouro()."', ".$enderecoAluno->getNumeroCasa().", '".$enderecoAluno->getComplemento()."', '".$enderecoAluno->getBairro()."', '".$enderecoAluno->getCidade()."', '".$enderecoAluno->getReferencia()."', '".$enderecoAluno->getUf()."');";
        mysql_query($sql);
        $idEnderecoAluno = mysql_insert_id();
        
        $sql= "INSERT INTO `endereco_pessoa` (`idEndereco_Pessoa`, `idEndereco`, `idPessoa`) VALUES 
        (NULL, '".$idEnderecoAluno."', '".$idPessoaAluno."');";
        mysql_query($sql);
        
        $sql = "INSERT INTO `endereco` (`idendereco`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `referencia`, `uf`) VALUES 
        (NULL, '".$enderecoResponsavel->getCep()."', '".$enderecoResponsavel->getLogradouro()."', ".$enderecoResponsavel->getNumeroCasa().", '".$enderecoResponsavel->getComplemento()."', '".$enderecoResponsavel->getBairro()."', '".$enderecoResponsavel->getCidade()."', '".$enderecoResponsavel->getReferencia()."', '".$enderecoResponsavel->getUf()."');";
        mysql_query($sql);
        $idEnderecoResponsavel = mysql_insert_id();
        
        $sql= "INSERT INTO `endereco_pessoa` (`idEndereco_Pessoa`, `idEndereco`, `idPessoa`) VALUES 
        (NULL, '". $idEnderecoResponsavel."', '".$idPessoaResponsavel."');";
        mysql_query($sql);
        
        $linha = mysql_affected_rows();

        return $linha;
    }
    
        public function listarAlunos(){
            //Cria a conexão com o banco de dados
            $obj_conecta = new bd();
                $obj_conecta->conecta();
                $obj_conecta->seleciona_bd();

            $sql = "SELECT  `pessoa`.`nome` ,  `pessoa`.`email` ,  `aluno`.`escola` ,`pessoa`.`dataNascimento`, `pessoa`.`sexo`, `pessoa`.`telefoneResidencial` , `aluno`.`anoEscolar` 
            FROM  `pessoa` ,  `aluno` ,  `usuario` 
            WHERE  `aluno`.`idUsuario` =  `usuario`.`idUsuario` 
            AND  `usuario`.`idPessoa` =  `pessoa`.`idPessoa` "; 
            $res=mysql_query($sql);

            if(mysql_num_rows($res)==0)
                $res="Nada encontrado!";

            $obj_conecta->fechaConexao();

            return $res;
        }
    
    

        public function alterarAluno($idPessoaAluno){

                $sql ="SELECT  `usuario`.`idUsuario` FROM  `usuario`,  `pessoa` WHERE  `usuario`.`idPessoa` = `pessoa`.`idPessoa` AND `pessoa`.`idPessoa`= ".$idPessoaAluno." ;";

                $idUsuario = mysql_query($sql);


                $sql = "UPDATE `aluno` SET  `anoEscolar` =  '".$aluno->getAnoEscolar()."',`escola` =  '".$aluno->getEscola()."' WHERE  `aluno`.`idUsuario` =".$idPessoaAluno."; "; 

                $altera = mysql_query($sql);

                        if($altera){

                        }
                        else {
                                echo "Tabela aluno alterado com sucesso";
                        }


                $sql = "UPDATE `usuario` SET  `login` =  `".$user->getLogin()."`, `senha` = `".$user->getSenha()."` WHERE  `usuario`.`idPessoa` = ".$idPessoaALuno.";";

                $altera = mysql_query($sql);

                        if($altera){

                        }
                        else {
                                echo "Tabela usuario alterado com sucesso";
                        }


                $sql = "UPDATE  `pessoa` SET  `nome` =  `".$aluno->getNome()."`, `email` =  `".$aluno->getEmail()."`, `telefoneResidencial` =  `".$aluno->get_telefoneResidencial()."`, `telefoneCelular` =  `".$aluno->getCelular()."`, `sexo` =  `".$aluno->getSexo()."`, `dataNascimento` =  `".$aluno->getNascimento()."`, `cpf` =  `NULL` WHERE  `pessoa`.`idPessoa` =".$idPessoaAluno." ;";

                $altera = mysql_query($sql);

                        if($altera){

                        }
                        else {
                                echo "Tabela pessoa alterada com sucesso";
                        }



        }



        public function alterarEndereco($idPessoa){

                $idEndereco = mysql_query("SELECT `endereco_pessoa`.`idEndereco` FROM `endereco_pessoa` WHERE `endereco_pessoa`.`idPessoa` = ".$idPessoa.";");

                $sql = "UPDATE `sigar`.`endereco` SET `cep` = '".$enderecoAluno->getCep()."',`logradouro` = '".$enderecoAluno->getLogradouro()."',`numero` = ".$enderecoAluno->getNumeroCasa().",`complemento` = '".$enderecoAluno->getComplemento()."',`bairro` = '".$enderecoAluno->getBairro()."',`cidade` = '".$enderecoAluno->getCidade()."',`referencia` = '".$enderecoAluno->getReferencia()."',`uf` = '".$enderecoAluno->getUf()."' WHERE `endereco`.`idendereco` = ".$idEndereco.";"; 

                $altera = mysql_query($sql);

                        if($altera){

                        }
                        else {
                                echo "Tabela endereco alterada com sucesso";
                        }


        }


        //Metodo a ser vai associar a nova pessoa ao Endereço já existente

        public function inserirMesmoEndereco($idPessoa,$idEndereco){

                $sql = "UPDATE  `sigar`.`endereco_pessoa` SET  `idEndereco` =  `".$idEndereco."`, `idPessoa` = ".$Pessoa." WHERE  `endereco_pessoa`.`idPessoa` =".$idPessoa."; "; 

        }


        public function alterarResponsavel($idPessoaResponsavel){

                $sql = "UPDATE  `sigar`.`responsavel` SET  `categoria` =  '".$responsavel->getCategoria()."', `telefoneTrabalho` =  '".$responsavel->getTelTrabalho()."' WHERE  `responsavel`.`idPessoa` =".$idPessoaResponsavel.";";

                $altera = mysql_query($sql);

                        if($altera){

                        }
                        else {
                                echo "Tabela responsavel alterada com sucesso";
                        }


                $sql = "UPDATE  `pessoa` SET  `nome` =  `".$responsavel->getNome()."`, `email` =  `".$responsavel->getEmail()."`, `telefoneResidencial` =  `".$responsavel->get_telefoneResidencial()."`, `telefoneCelular` =  `".$responsavel->getCelular()."`, `sexo` =  `".$responsavel->getSexo()."`, `dataNascimento` =  `".$responsavel->getNascimento()."`, `cpf` =  `".$responsavel->getCpf()."` WHERE  `pessoa`.`idPessoa` = ".$IdPessoaResponsavel.";";

                $altera = mysql_query($sql);

                        if($altera){

                        }
                        else {
                                echo "mysql_error()";
                        }

        }



        public function deletarAluno($idPessoaAluno){

                $sql ="SELECT  `aluno`.`idAluno` FROM  `usuario`, `aluno` WHERE  `usuario`.`idUsuario` = `aluno`.`idUsuario` AND `usuario`.`idPessoa`= ".$idPessoaAluno." ;";

                $idAluno = mysql_query($sql);

                $sql = "DELETE FROM `sigar`.`aluno` WHERE `aluno`.`idAluno` = ".$idAluno.";"; 

                $deleta = mysql_query($sql);

                        if($deleta){

                        }
                        else {
                                echo "Dados tabela aluno deletado com sucesso";
                        }

                $sql = "DELETE FROM `sigar`.`usuario` WHERE `usuario`.`idPessoa` = ".$idPessoaAluno.";"; 
                $deleta = mysql_query($sql);

                        if($deleta){

                        }
                        else {
                                echo "Dados tabela usuario deletado com sucesso";
                        }

                $sql = "SELECT  `endereco_pessoa`.`idEndereco_Pessoa` FROM  `sigar`.`endereco_pessoa` WHERE  `endereco_pessoa`.`idPessoa` =".$idPessoaAluno.";";
                $idEnderecoPessoa = mysql_query($sql);

                $sql = "SELECT  `endereco_pessoa`.`idEndereco` FROM  `sigar`.`endereco_pessoa` WHERE  `endereco_pessoa`.`idPessoa` =".$idPessoaAluno.";";

                $idEndereco = mysql_query($sql);

                $sql = "DELETE FROM `sigar`.`endereco_pessoa` WHERE `endereco_pessoa`.`idEndereco_Pessoa` = ".$idEnderecoPessoa." ;" ;

                $deleta = mysql_query($sql);

                        if($deleta){

                        }
                        else {
                                echo "Dados tabela endereco deletado com sucesso";
                        }

                $sql = "DELETE FROM `sigar`.`pessoa` WHERE `pessoa`.`idPessoa` = ".$idPessoaAluno." ;";

                $deleta = mysql_query($sql);

                        if($deleta){

                        }
                        else {
                                echo "Dados tabela PESSOA deletado com sucesso";
                        }



                //Não deletar o endereço pois pode estar sendo utilizado por outra pessoa

        }


        public function deletarResponsavel($idPessoaResponsavel){

                $sql = "SELECT  `responsavel`.`idResponsavel` FROM  `responsavel` WHERE  `responsavel`.`idPessoa` = ".$idPessoaResponsavel." ;";
                $idResponsavel = mysql_query($sql);

                $sql = "DELETE FROM `sigar`.`responsavel` WHERE `responsavel`.`idResponsavel` = ".$idResponsavel." ;"; 
                $deleta = mysql_query($sql);

                        if($deleta){

                        }
                        else {
                                echo "Dados da tabela RESPONSAVEL deletado com sucesso";
                        }


                $sql = "DELETE FROM `sigar`.`pessoa` WHERE `pessoa`.`idPessoa` = ".$idPessoaResponsavel." ;"; 
                $deleta = mysql_query($sql);

                        if($deleta){

                        }
                        else {
                                echo "Dados tabela PESSOA deletado com sucesso";
                        }
        }






        }
?>
