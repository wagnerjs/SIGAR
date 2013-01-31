<?php

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

		$sql = "
			SELECT
				cpf
			FROM
				`usuario`
			WHERE
				cpf = '$cpf'";
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

		$sql = "
			SELECT
				`nomeusuario`
			FROM
				`usuario`
			WHERE
				`nomeusuario` = '$this->$nome_usuario'";
		mysql_query( $sql );
                
                $linhas_afetadas = mysql_affected_rows();
                $obj_bd->fechaConexao();
                return $linhas_afetadas;
	}
    
}

?>
