<?php
require_once '../src/model/Pessoa.class.php';
require_once '../src/model/Usuario.class.php';
require_once '../src/model/Aluno.class.php';


class CalculadoraTest extends PHPUnit_Framework_TestCase
{

    public function testSoma()
    {

        $aluno = new Aluno("gbre", "12345");

  
        $this->assertEquals('Guilherme', $aluno->getNome());
    }

}
?>