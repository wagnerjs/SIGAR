<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DiaSemana
 *
 * @author Hebert
 */
class DiaSemana {

    public function diaSemana($data) {
        $ano = substr("$data", 0, 4);
        $mes = substr("$data", 5, -3);
        $dia = substr("$data", 8, 9);

        $diasemana = date("w", mktime(0, 0, 0, $mes, $dia, $ano));

        switch ($diasemana) {
            case"0": $diasemana = "Domingo";
                break;
            case"1": $diasemana = "Segunda";
                break;
            case"2": $diasemana = "Terça";
                break;
            case"3": $diasemana = "Quarta";
                break;
            case"4": $diasemana = "Quinta";
                break;
            case"5": $diasemana = "Sexta";
                break;
            case"6": $diasemana = "Sábado";
                break;
        }

        return $diasemana;
    }

}

?>
