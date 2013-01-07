<?php 

class Aluno extends Pessoa{
     
        private $_anoEscolar;
	private $_escola;
	private $_responsavel;
        private $_usuario;
        

                function __construct($nome,$sexo,$nascimento,$email,$anoEscolar,$telResidencial,$telCelular,$escola,$endereco_obj,$responsavel_obj, $user_obj){
            $this->setNome($nome);
            $this->setSexo($sexo);
            $this->setNascimento($nascimento);
            $this->setEmail($email);
            $this->set_telefoneResidencial($telResidencial);
            $this->setCelular($telCelular);
            $this->set_endereco($endereco_obj);
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
	public function setAnoEscolar( $_anoEscolar )
	{
            $this->_anoEscolar = $_anoEscolar;
	}
	
	public function setEscola( $_escola )
	{
            $this->_escola = $_escola;
	}
 
	public function setResponsavel($_responsavel)
	{
            $this->_responsavel=$_responsavel;
	}
            public function getResponsavel()
	{
	return $this->_responsavel;
	}
        
        public function get_usuario() {
            return $this->_usuario;
        }

        public function set_usuario($_usuario) {
            $this->_usuario = $_usuario;
        }
 }



?>