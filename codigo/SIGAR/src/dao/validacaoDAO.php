<?php
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";

class validacaoDAO {
    //put your code here
    
        protected $_email_repetido;
        protected $linhas_afetadas;


	function email_repetido($email)
	{
                
		$obj_bd = new bd;
			$obj_bd->conecta();
			$obj_bd->seleciona_bd();

		$sql = "
			SELECT
				`email`
			FROM
				`pessoa`
			WHERE
				`email` = '$email'";
		mysql_query( $sql );
                $linhas_afetadas = mysql_affected_rows();
                $obj_bd->fechaConexao();
                return $linhas_afetadas;
	}
        
        	function cpf_repetidoDAO($cpf)
	{
		$obj_bd = new bd;
		$obj_bd->conecta();
		$obj_bd->seleciona_bd();

		$sql = " SELECT `pessoa`.`cpf` FROM `pessoa`
			WHERE `pessoa`.`cpf` = '".$cpf."';";
                
		mysql_query( $sql );
                
                
                $linhas_afetadas = mysql_affected_rows();
                $obj_bd->fechaConexao();
                return $linhas_afetadas;

	}
        
        function valida_nomeusuario($nome_usuario)
	{
		$obj_bd = new bd;
			$obj_bd->conecta();
			$obj_bd->seleciona_bd();

		$sql = "SELECT `usuario`.`login` FROM `usuario`
			WHERE `login` = '".$nome_usuario."';";
                echo $sql;
		mysql_query( $sql );
                
                $linhas_afetadas = mysql_affected_rows();
                $obj_bd->fechaConexao();
                return $linhas_afetadas;
	}
    
}

?>
