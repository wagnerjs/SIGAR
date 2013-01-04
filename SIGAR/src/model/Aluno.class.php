<?php 
 class Aluno extends Usuario{
 
	private $_anoEscolar;
	private $_escola;
	private $_responsavel;
	
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