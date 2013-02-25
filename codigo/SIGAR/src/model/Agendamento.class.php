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

    private $idAgendamento;
    private $idAluno;
    private $idProfessor;
    private $data;
    private $horario;
    private $status;
    private $materia;
    private $conteudo;

    function __construct($idAgendamento = "", $idAluno = "", $idProfessor = "", $data = "", $horario = "", $status = "", $materia = "", $conteudo = "") {
        $this->idAgendamento = $idAgendamento;
        $this->idAluno = $idAluno;
        $this->idProfessor = $idProfessor;
        $this->data = $data;
        $this->horario = $horario;
        $this->status = $status;
        $this->materia = $materia;
        $this->conteudo = $conteudo;
    }

    public function getIdAgendamento() {
        return $this->idAgendamento;
    }

    public function setIdAgendamento($idAgendamento) {
        $this->idAgendamento = $idAgendamento;
    }

    public function getIdAluno() {
        return $this->idAluno;
    }

    public function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
    }

    public function getIdProfessor() {
        return $this->idProfessor;
    }

    public function setIdProfessor($idProfessor) {
        $this->idProfessor = $idProfessor;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function setHorario($horario) {
        $this->horario = $horario;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getMateria() {
        return $this->materia;
    }

    public function setMateria($materia) {
        $this->materia = $materia;
    }

    public function getConteudo() {
        return $this->conteudo;
    }

    public function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

}

?>
