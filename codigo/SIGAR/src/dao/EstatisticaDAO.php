<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estatistica
 *
 * @author Hebert
 */
class EstatisticaDAO {

    //put your code here

    /*
     * Seleciona o total de Agendamento realizados
     */

    public function selecionarNumeroAgendamentos() {
        $this->criarConexao();

        $sql = "SELECT count(idAgendamento) NumeroAgendamentos FROM agendamento;";
        $resultadoPesquisa = mysql_query($sql);
        $resultado = 0;

        while ($aux = mysql_fetch_array($resultadoPesquisa)) {
            $resultado = $aux['NumeroAgendamentos'];
        }
        if (mysql_num_rows($resultadoPesquisa) == 0) {
            $resultado = 0;
        }
        return $resultado;
    }

    /*
     * Seleciona o total de Alunos cadastrados
     */

    public function selecionarNumeroAlunos() {
        $this->criarConexao();

        $sql = "SELECT COUNT( idAluno ) NumeroAlunos FROM aluno;";
        $resultadoPesquisa = mysql_query($sql);
        $resultado = 0;

        while ($aux = mysql_fetch_array($resultadoPesquisa)) {
            $resultado = $aux['NumeroAlunos'];
        }
        if (mysql_num_rows($resultadoPesquisa) == 0) {
            $resultado = 0;
        }
        return $resultado;
    }

    /*
     * Seleciona o total de Professores cadastrados
     */

    public function selecionarNumeroProfessores() {
        $this->criarConexao();

        $sql = "SELECT COUNT( idProfessor ) NumeroProfessores FROM professor;";
        $resultadoPesquisa = mysql_query($sql);
        $resultado = 0;

        while ($aux = mysql_fetch_array($resultadoPesquisa)) {
            $resultado = $aux['NumeroProfessores'];
        }
        if (mysql_num_rows($resultadoPesquisa) == 0) {
            $resultado = 0;
        }
        return $resultado;
    }

}

?>
