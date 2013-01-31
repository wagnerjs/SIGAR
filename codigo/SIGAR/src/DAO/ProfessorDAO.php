<?php
class ProfessorDAO  {
    
        protected $_obj_conecta;
        
        public function criarConexao(){
            $this->obj_conecta = new bd();
            $this->obj_conecta->conecta();
            $this->obj_conecta->seleciona_bd();
          
        }
 
        
        //Função retorna dados do Professor
        public function listarProfessor($idProfessor){
            //Cria a conexão com o banco de dados
            $this->criarConexao();
                            
            $sql = "SELECT `pessoa`.*, `professor`.*, `endereco`.* 
                    FROM `professor`,`pessoa`,`endereco`,`usuario`  
                    WHERE `professor`.`idUsuario` = `usuario`.`idUsuario` 
                    AND `usuario`.`idPessoa` = `pessoa`.`idPessoa`  
                    AND `endereco`.`idEndereco` IN 
                    (SELECT `idEndereco` FROM `endereco_pessoa` 
                    WHERE `endereco_pessoa`.`idPessoa` = `pessoa`.`idPessoa`)
                    AND `professor`.`idProfessor` =".$idProfessor.";";
                      
            $res= mysql_query($sql);

            if(mysql_num_rows($res)==0)
            {
                $res="Nada encontrado!";
            }                
            else{
                $res = mysql_fetch_array ($res);
            }
                
            return $res;
        } 
        
        //Função retorna todas as materias que o Professor pode ministrar
        public function selecionarMateriasProfessor($idProfessor)    {
            //Cria a conexão com o banco de dados
            $this->criarConexao();
            
            $sql = "SELECT `materia`.`descricaoMateria` FROM `materia` , `professorMateria` , `professor`
                WHERE `professorMateria`.`idProfessor` = `professor`.`idProfessor`
                AND `materia`.`idMateria` = `professorMateria`.`idMateria`
                AND `professor`.`idProfessor` = ".$idProfessor.";";
            $resultadoBusca =  mysql_query($sql);
            
            while($aux = mysql_fetch_array($resultadoBusca)){
                $listaMateria = $aux['descricaoMateria'];
            }
            if(mysql_num_rows($resultadoBusca)== 0){
                $listaMateria= "Nada encontrado! ";//Nenhum materia encontrada
            }
            
            
            return $listaMateria;
            
        }
        
<<<<<<< HEAD
        public function deletarAluno($idPessoaProfessor){
                $obj_conecta = new bd();
                $obj_conecta->conecta();
                $obj_conecta->seleciona_bd();

                $sql ="SELECT  `professor`.`idProfessor` FROM  `usuario`, `professor` WHERE  `usuario`.`idUsuario` = `professor`.`idProfessor` AND `usuario`.`idPessoa`= ".$idPessoaProfessor." ;";

                $resultadoProfessor = mysql_query($sql);
                while ($aux = mysql_fetch_array($resultadoProfessor)){
                    $idProfessor = $aux['idProfessor'];
                }

                $sql = "DELETE FROM `sigar`.`aluno` WHERE `aluno`.`idAluno` = ".$idProfessor.";"; 


                $sql = "DELETE FROM `sigar`.`usuario` WHERE `usuario`.`idPessoa` = ".$idPessoaProfessor.";"; 


                $sql = "SELECT  `endereco_pessoa`.`idEndereco_Pessoa` FROM  `sigar`.`endereco_pessoa` WHERE  `endereco_pessoa`.`idPessoa` =".$idPessoaProfessor.";";
                
                $resultadoEnderecoPessoa = mysql_query($sql);
                
                while ($aux = mysql_fetch_array($resultadoEnderecoPessoa)){
                    $idEndereco_Pessoa = $aux['idEndereco_Pessoa'];
                }

                $sql = "DELETE FROM `sigar`.`endereco_pessoa` WHERE `endereco_pessoa`.`idEndereco_Pessoa` = ".$idEndereco_Pessoa." ;" ;
                
                $sql = "SELECT  `endereco_pessoa`.`idEndereco` FROM  `sigar`.`endereco_pessoa` WHERE  `endereco_pessoa`.`idPessoa` =".$idPessoaProfessor.";";

                $resultadoEndereco = mysql_query($sql);
                while ($aux = mysql_fetch_array($resultadoEndereco)){
                    $idEndereco = $aux['idEndereco'];
                }

                $sql = "DELETE FROM 'sigar'.'endereco' WHERE 'endereco'.'idEndereco' = ".$idEndereco." ;";


                $sql = "DELETE FROM `sigar`.`pessoa` WHERE `pessoa`.`idPessoa` = ".$idPessoaProfessor." ;";

                $retorno = mysql_affected_rows();

                
                return $retorno;

        }
        
=======
>>>>>>> 786f20055168c67d44e15e7460a5ed80695deb5e
}
?>
