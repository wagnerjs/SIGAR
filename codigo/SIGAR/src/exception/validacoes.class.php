<?php
    class valida{

        protected $_nome;
        protected $_res_nome;
        protected $_res_caracteres_nome;

        protected $_email;
        protected $_res_email;
        protected $_email_repetido;

        protected $_cpf;
    	protected $_res_valida_cpf;
    	protected $_res_cpf_repetido;

    	protected $_nome_usuario;
        protected $_res_nome_usuario;

    	protected $_senha;
    	protected $_res_senha;
    	protected $_res_caracteres_senha;

    	protected $_res_nome_senha;

        protected $_nrtelefone;
        protected $_res_nrtelefone;

    	protected $_descricao_endereco;
    	protected $_res_descricao_endereco;

        protected $_cep;
        protected $_res_cep;

    	protected $_bairro;
    	protected $_res_bairro;

    	protected $_cidade;
    	protected $_res_cidade;

    	protected $_complemento;
    	protected $_res_complemento;

	//Atributo para checagem de erro
    	protected $_erro = 0;


        function valida_nome()
        {
                if ( empty($this->_nome ))
                {
                    $this->_res_nome = "<b><font color=red> * </font>Favor digitar seu nome</b>";
                    $this->_erro = 1;
                }
        }

	function valida_email()
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
				`pessoa` = '$this->_email_repetido;'";
		mysql_query( $sql );

	//Se foi encontrado algum resultado retorna 1, caso contrario 0.
			if ( mysql_affected_rows() > 0 )
			{
				$this->_email_repetido = "<b><font color=red> * </font>Email já cadastrado";
				$this->_erro = 1;
			}
		$obj_bd->fechaConexao();
	
            if (( strlen ( $this->_email ) < 8 ) || strstr ( $this->_email,'@' ) == false || (strstr ( $this->_email,'.' ) == false))
            {
                $this->_res_email = "<b><font color=red> * </font>Favor digitar o seu e-mail corretamente.";
                $this->_erro = 1;
            }
	}
        
	function validacpf()
	{
		$this->_cpf = str_replace('.', '', $this->_cpf);
		$this->_cpf = str_replace('-', '', $this->_cpf);

		if( ($this->_cpf== '11111111111') || ($this->_cpf== '22222222222') ||
   		($this->_cpf == '33333333333') || ($this->_cpf == '44444444444') ||
  		($this->_cpf == '55555555555') || ($this->_cpf == '66666666666') ||
   		($this->_cpf == '77777777777') || ($this->_cpf == '88888888888') ||
   		($this->_cpf == '99999999999') || ($this->_cpf == '00000000000') ){
			$this->_res_valida_cpf = "<b><font color=red> * </font>CPF invalido!";
			$this->_erro = 1;
		}
		else{
		$aux_cpf = "";
    		for ( $j = 0; $j < strlen( $this->_cpf ); $j++ )
      			if ( substr( $this->_cpf,$j,1 ) >= "0" AND substr( $this->_cpf,$j,1 ) <= "9" )
         			$aux_cpf .= substr( $this->_cpf,$j,1 );
    			if ( strlen ( $aux_cpf ) != 11 )
				{
    				$this->_res_valida_cpf = "<b><font color=red> * </font>CPF invalido!";
      				$this->_erro = 1;
      			}
				  else
				{
    				$cpf1 = $aux_cpf;
      				$cpf2 = substr( $this->_cpf,-2 );
      				$controle = "";
      				$start = 2;
      				$end = 10;
      				$digito=0;
      					for ( $i = 1; $i <= 2; $i++ )
						{
      						$soma = 0;
        						for( $j = $start; $j <= $end; $j++ )
          				  			$soma += substr( $cpf1,( $j-$i-1 ),1 ) * ( $end+1+$i-$j );
        								if ( $i == 2 )
          				  					$soma += $digito * 2;
        									$digito = ( $soma * 10 ) % 11;
        								if ( $digito == 10 )
          				  					$digito = 0;
        									$controle .= $digito;
        									$start = 3;
        									$end = 11;
      					}
      						if( $controle != $cpf2 )
							  {
        						$this->_res_valida_cpf = "<b><font color=red> * </font>CPF inv�lido!";
								$this->_erro = 1;
							  }
  				}
  		}
	}

	function cpf_repetido()
	{
		$this->_cpf = str_replace( '.', '', $this->_cpf );
		$this->_cpf = str_replace( '-', '', $this->_cpf );

		$obj_bd = new bd;
			$obj_bd->conecta();
			$obj_bd->seleciona_bd();

		$sql = "
			SELECT
				cpf
			FROM
				`usuario`
			WHERE
				cpf = '$this->_cpf'";
		mysql_query( $sql );

			if ( mysql_affected_rows() > 0 )
			{
				$this->_res_cpf_repetido = "<b><font color=red> * </font>CPF j� cadastrado!";
				$this->_erro = 1;
			}
		$obj_bd->fechaConexao();
	}


	function valida_nomeusuario()
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
				`nomeusuario` = '$this->_nome_usuario'";
		mysql_query( $sql );

	//Se foi encontrado algum resultado retorna 1, caso contrario 0.
			if ( mysql_affected_rows() > 0 )
			{
				$this->_res_nome_usuario = "<b><font color=red> * </font>Usu�rio j� cadastrado";
				$this->_erro = 1;
			}
		$obj_bd->fechaConexao();
	}

	function caracteres_nome()
	{
            if ( strlen( $this->_nome_usuario ) < 5 )
            {
                $this->_res_caracteres_nome =  "<b><font color=red> * </font>O Nome do usu�rio  deve possuir no m�nimo 5 caracteres.";
                $this->_erro = 1;
            }
	}
        
	function caracteres_senha()
	{
		if ( strlen( $this->_senha ) < 5 )
		{
			$this->_res_caracteres_senha =  "<b><font color=red> * </font>A senha deve possuir no m�nimo 5 caracteres.";
			$this->_erro = 1;
		}
	}

	function valida_nome_senha()
	{
		if ( $this->_nome_usuario == $this->_senha )
		{
			$this->_res_nome_senha =  "<b><font color=red> * </font>O nome do usu�rio � a senha devem ser diferentes.";
			$this->_erro = 1;
		}
	}

	function valida_telefone()
	{
		if ( is_numeric( $this->_nrtelefone ) == false )
		{
			$this->_res_nrtelefone =  "<b><font color=red> * </font>Favor digitar o seu Telefone corretamente.";
			$this->_erro = 1;
		}
	}

	function valida_descricao_endereco()
	{
		if ( empty ( $this->_descricao_endereco ) or strstr ( $this->_descricao_endereco,' ' ) == false )
		{
			$this->_res_descricao_endereco =  "<b><font color=red> * </font>Favor digitar o seu Endere�o corretamente.";
			$this->_erro = 1;
		}
	}

	function valida_bairro()
	{
		if ( empty( $this->_bairro ))
		{
			$this->_res_bairro = "<b><font color=red> * </font>Favor digitar o seu Bairro corretamente.";
			$this->_erro = 1;
		}
	}

	function valida_cidade()
	{
		if ( empty( $this->_cidade ))
		{
			$this->_res_cidade = "<b><font color=red> * </font>Favor digitar o seu Cidade corretamente.";
			$this->_erro = 1;
		}
	}

	function valida_complemento()
	{
		if ( empty( $this->_complemento ))
		{
			$this->_res_complemento = "<b><font color=red> * </font>Favor digitar o seu Complemento corretamente.";
			$this->_erro = 1;
		}
	}
        
	function valida_cep()
	{
		if ( is_numeric( $this->_cep ) == false )
		{
			$this->_res_cep = "<b><font color=red> * </font>Favor digitar o seu CEP corretamente.";
			$this->_erro = 1;
		}
	}

	function valida_idperfil()
	{
		if (( $this->_idperfil <= 0 ) || ( $this->_idperfil > 2 ))
		{
			$this->_ResIdPerfil = "<b><font color=red> * </font>Perfil inv�lido!";
			$this->_erro = 1;
		}

	}

	function SetNome( $nome )
	{
		$this->_nome = $nome;
	}

	function SetEmail( $email )
	{
		$this->_email = $email;
	}

	function SetCpf( $cpf )
	{
		$this->_cpf = $cpf;
	}

	function SetNomeUsuario( $nome_usuario )
	{
		$this->_nome_usuario = $nome_usuario;
	}

	function SetSenha( $senha )
	{
		$this->_senha = $senha;
	}

	function SetNrtelefone( $nrtelefone )
	{
            $this->_nrtelefone = $nrtelefone;
            $this->_nrtelefone = str_replace( '-', '', $this->_nrtelefone );
            $this->_nrtelefone = str_replace( '(', '', $this->_nrtelefone );
            $this->_nrtelefone = str_replace( ')', '', $this->_nrtelefone );
            $this->_nrtelefone = str_replace( ' ', '', $this->_nrtelefone );
	}

	function SetDescricaoEndereco( $descricao_endereco )
	{
		$this->_descricao_endereco = $descricao_endereco;
	}

	function SetCep( $cep )
	{
		$this->_cep = $cep;
		$this->_cep = str_replace( '-', '', $this->_cep );
	}

	function SetBairro( $bairro )
	{
		$this->_bairro = $bairro;
	}

	function SetCidade( $cidade )
	{
		$this->_cidade = $cidade;
	}

	function SetComplemento( $complemento )
	{
		$this->_complemento = $complemento;
	}

	function SetIdPerfil( $idperfil )
	{
		$this->_idperfil = $idperfil;
	}

	function GetResNome()
	{
		return $this->_res_nome ;
	}

	function GetResCaracteresNome()
	{
		return $this->_res_caracteres_nome;
	}


	function GetResEmail()
	{
		return $this->_res_email ;
	}

	function GetResValidaCpf()
	{
		return $this->_res_valida_cpf ;
	}

	function GetResCpfRepetido()
	{
		return $this->_res_cpf_repetido ;
	}

	function GetResNomeUsuario()
	{
		return $this->_res_nome_usuario ;
	}

	function GetResSenha()
	{
		return $this->_res_senha ;
	}

	function GetResCaracteresSenha()
	{
		return $this->_res_caracteres_senha;
	}

	function GetResNomeSenha()
	{
		return $this->_res_nome_senha ;
	}

	function GetResNrtelefone()
	{
		return $this->_res_nrtelefone ;
	}

	function GetResDescricaoEndereco()
	{
		return $this->_res_descricao_endereco ;
	}

	function GetResCep()
	{
		return $this->_res_cep;
	}

	function GetResBairro()
	{
		return $this->_res_bairro;
	}

	function GetResCidade()
	{
		return $this->_res_cidade;
	}

	function GetResComplemento()
	{
		return $this->_res_complemento;
	}

	function GetErro()
	{
		return $this->_erro;
	}

	function GetResIdPerfil()
	{
		return $this->_ResIdPerfil;
	}
}
?>