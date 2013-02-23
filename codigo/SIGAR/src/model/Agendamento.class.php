<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Agendamento
 *
 * @author Hebert
 */
class Agendamento {
    
    private $_idAgendamento;
    private $_idAluno;
    private $_idProfessor;
    private $_data;
    private $_horarioInicio;
    private $_duracaoMarcada;
    private $_duracaoReal;
    private $_status;
    private $_materia;
    private $_conteudo;

    function __construct($idAgendamento, $idAluno, $idProfessor, $data, $horarioInicio, $duracaoMarcada, $duracaoReal, $status, $materia, $conteudo) {
        $this->_idAgendamento = $idAgendamento;
        $this->_idAluno = $idAluno;
        $this->_idProfessor = $idProfessor;
        $this->_data = $data;
        $this->_horarioInicio = $horarioInicio;
        $this->_duracaoMarcada = $duracaoMarcada;
        $this->_duracaoReal = $duracaoReal;
        $this->_status = $status;
        $this->_materia = $materia;
        $this->_conteudo = $conteudo;
    }

    public function getIdAgendamento() {
        return $this->_idAgendamento;
    }

    public function setIdAgendamento($idAgendamento) {
        $this->_idAgendamento = $idAgendamento;
    }

    public function getIdAluno() {
        return $this->_idAluno;
    }

    public function setIdAluno($idAluno) {
        $this->_idAluno = $idAluno;
    }

    public function getIdProfessor() {
        return $this->_idProfessor;
    }

    public function setIdProfessor($idProfessor) {
        $this->_idProfessor = $idProfessor;
    }

    public function getData() {
        return $this->_data;
    }

    public function setData($data) {
        $this->_data = $data;
    }

    public function getHorarioInicio() {
        return $this->_horarioInicio;
    }

    public function setHorarioInicio($horarioInicio) {
        $this->_horarioInicio = $horarioInicio;
    }

    public function getDuracaoMarcada() {
        return $this->_duracaoMarcada;
    }

    public function setDuracaoMarcada($duracaoMarcada) {
        $this->_duracaoMarcada = $duracaoMarcada;
    }

    public function getDuracaoReal() {
        return $this->_duracaoReal;
    }

    public function setDuracaoReal($duracaoReal) {
        $this->_duracaoReal = $duracaoReal;
    }

    public function getStatus() {
        return $this->_status;
    }

    public function setStatus($status) {
        $this->_status = $status;
    }

    public function getMateria() {
        return $this->_materia;
    }

    public function setMateria($materia) {
        $this->_materia = $materia;
    }

    public function getConteudo() {
        return $this->_conteudo;
    }

    public function setConteudo($conteudo) {
        $this->_conteudo = $conteudo;
    }
}

?>
