<?php
require_once 'Pessoa.class.php';

class Aluno extends Pessoa{
     
        private $_anoEscolar;
	private $_escola;
	private $_responsavel;
        private $_usuario;
        

        function __construct($nome="",$sexo="",$nascimento="",$email="",$anoEscolar="",$telResidencial="",$telCelular="",$escola="",$endereco_obj="",$responsavel_obj="", $user_obj=""){
            $this->setNome($nome);
            $this->setSexo($sexo);
            $this->setNascimento($nascimento);
            $this->setEmail($email);
            $this->setTelefoneResidencial($telResidencial);
            $this->setCelular($telCelular);
            $this->setEndereco($endereco_obj);
            $this->_anoEscolar = $anoEscolar;
            $this->_escola = $escola;
            $this->_responsavel = $responsavel_obj;
            $this->_usuario = $user_obj;
        }


        public function getAnoEscolar()
	{
            return $this->_anoEscolar;
	}
	
	public function getEscola()
	{
            return $this->_escola;
	}
            public function getResponsavel()
	{
	return $this->_responsavel;
	}
        
        public function getUsuario() {
            return $this->_usuario;
        }

 }

?>