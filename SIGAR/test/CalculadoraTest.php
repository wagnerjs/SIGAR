<?php
require_once '../src/Calculadora.php';

class CalculadoraTest extends PHPUnit_Framework_TestCase
{

    public function testSoma()
    {
        $valor1 = '2';
        $valor2 = '3';

        $calculadora = new Calculadora();

        $this->assertEquals('5', $calculadora->soma($valor1, $valor2));
    }

}