<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php";
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/dao/ProfessorDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Professor.class.php';

/**
 * Description of DAOAlterarProfessor_Test
 *
 * @author Hebert
 */
class DAOAlterarProfessor_Test extends PHPUnit_Framework_TestCase {

    //put your code here
    protected $professor_obj;
    protected $endereco_obj;
    protected $user_obj;
    protected $idEndProfessor;
    protected $idPessoaProf;
    protected $idPessoaUser;
    protected $idProfessor;
    protected $professorDao;
  
    

    public function setUp() {
               
        $nomeProfessor = 'Ajax';
        $sexoProfessor = 'm';
        $nascProfessor = '1995-02-19';
        $emailProfessor = 'matheus@gmail.com';
        $telResProfessor = '(61)3333-1111';
        $celularProfessor = '(61)8109-8502';
        $cpfProfessor = '012.202.033-21';
        $meioDeTransporte = 'carro';

        $cepProfessor = '72215096';
        $logradouroProfessor = 'QNM 09 CONJUNTO F';
        $numeroCasaProfessor = '10';
        $complementoProf = 'Casa';
        $bairoProfessor = 'Ceilandia Sul';
        $cidadeProfessor = 'Ceilandia';
        $ufProfessor = 'DF';
        $referenciaProfessor = 'Mercado';

        $this->endereco_obj = new Endereco($logradouroProfessor, $cepProfessor, $bairoProfessor, $cidadeProfessor,
                        $complementoProf, $numeroCasaProfessor, $ufProfessor, $referenciaProfessor);
        $this->user_obj = new User();
        $this->professor_obj = new Professor(utf8_decode($nomeProfessor), $sexoProfessor, $nascProfessor, $emailProfessor,
                        $telResProfessor, $celularProfessor, $cpfProfessor, $meioDeTransporte,
                        $this->endereco_obj, $this->user_obj);
    }

    /**
     * @test
     */
    public function TestAlterarProfessor() {
        $professorDao = new ProfessorDAO();
        $this->idPessoaProf = 6;
        $this->idProfessor = 1;
        
        $this->assertEquals('1',$professorDao->alterarPessoaProfessor($this->idPessoaProf, $this->professor_obj));
        $this->assertEquals('1',$professorDao->alterarUsuario($this->idPessoaProf, $this->user_obj));
        $this->assertEquals('1',$professorDao->alterarProfessor($this->idProfessor, $this->professor_obj));
        $this->assertEquals('1',$professorDao->alterarEndereco($this->idProfessor, $this->professor_obj));
        
    }

}

?>
