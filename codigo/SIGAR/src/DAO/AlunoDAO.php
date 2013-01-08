<?php
/*$diretorioRaiz = $_SERVER['DOCUMENT_ROOT'];
$urlBD =  $diretorioRaiz."/SIGAR/codigo/SIGAR/src/utils/conexao.class.php";
$urlEndereco = $diretorioRaiz."/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";*/
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/conexao.class.php";

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
    
}
?>
