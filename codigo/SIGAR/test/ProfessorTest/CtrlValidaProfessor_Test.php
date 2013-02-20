<?php
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Professor.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/controller/ProfessorCtrl.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ProfessorDAO.php';
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/Conexao.class.php";
require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/utils/GeradorCpf.php";

/**
 * Description of CtrlListarProfessor_Test
 *
 * @author Matheus
 */
class CtrlValidaProfessor_Test extends PHPUnit_Framework_TestCase {
        
    protected $idProfessor;
    protected $retorno;

    public function setUp()
    {
        $gera = new GeradorCpf();
        $cpfProfessor = $gera->cpf(1);
        $nomeProfessor = 'Matheus';
        $sexoProfessor = 'm';
        $nascProfessor = '1995-02-19';
        $emailProfessor = $gera->cpf(0).'@gmail.com';
        $telResProfessor ='(61)3333-1111';
        $celularProfessor = '(61)8109-8502';
       
        //$cpfProfessor = '012.202.033-21';
        $meioDeTransporte = 'onibus';
        
        $cepProfessor = '72215096';
        $logradouroProfessor = 'QNM 09 CONJUNTO F';
        $numeroCasaProfessor = '10';
        $complementoProf = 'Casa';
        $bairoProfessor = 'Ceilandia Sul';
        $cidadeProfessor = 'Ceilandia';
        $ufProfessor = 'DF';
        $referenciaProfessor = 'Igreja';
        $materias[0] = 'Fisica';
        $enderecoProfessor='';
                
        $professorCtrl = new ProfessorCtrl();
        
        $this->retorno = $professorCtrl->validaProfessor(0, $nomeProfessor, $sexoProfessor,
                $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor,
                $enderecoProfessor, $cpfProfessor, $meioDeTransporte, $cepProfessor,
                $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor,
                $cidadeProfessor, $ufProfessor, $referenciaProfessor, $materias, 1);
    }
    
    /*
     * @test
     */
    public function testeCtrlValidaProfessor(){
        $this->assertEquals('<font color=green><b>Professor Cadastrado com sucesso!</b></font>',$this->retorno); 
    }

}

?>
