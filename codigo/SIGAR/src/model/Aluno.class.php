<?php 
 class Aluno extends Pessoa{
     
     

        private $_anoEscolar;
	private $_escola;
	private $_responsavel;
 
	
        function __construct($nome,$sexo,$nascimento,$email,$anoEscolar,$telResidencial,$telCelular,$escola,$endereco_obj,$responsavel_obj){
            $this->setNome($nome);
            $this->setSexo($sexo);
            $this->setNascimento($nascimento);
            $this->setEmail($email);
            $this->set_telefoneResidencial($telResidencial);
            $this->setCelular($telCelular);
            $this->set_($endereco_obj);
            $this->set_endereco($endereco_obj);
            $this->_anoEscolar = $anoEscolar;
            $this->_escola = $escola;
            $this->_responsavel = $responsavel_obj;        
                    
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
 }



?>