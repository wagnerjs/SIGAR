<?php

require_once '../src/model/Pessoa.class.php';
require_once '../src/model/Usuario.class.php';
require_once '../src/model/Aluno.class.php';
require_once '../src/model/Endereco.class.php';
require_once '../src/model/Responsavel.class.php';
require_once '../src/DAO/AlunoDAO.php';

/**
 * Description of AlunoCtrl_Test
 *
 * @author guilherme Baufaaker
 */
class AlunoCtrl_Test extends PHPUnit_Framework_TestCase 
{
    /**
     * @test
     * @return \Endereco
     */
    public function testCriarObjetoEndereco()
    {
        $endereco = 'QE 32 CONJUNTO H';
        $cep = '710283832';
        $bairro = 'Guara';
        $cidade = 'Brasília';
        $complemento = 'casa';
        $numero = '19';
        $uf = 'DF';
        $referencia = 'Brasília';
        
        
        $endereco_obj = new Endereco($endereco,$cep,$bairro,$cidade,$complemento,$numero,$uf,$referencia);
        
       
      
        $this->assertNotNull($endereco_obj->getBairro());
        $this->assertNotNull($endereco_obj->getCep());
        $this->assertNotNull($endereco_obj->getCidade());
        $this->assertNotNull($endereco_obj->getReferencia());
        $this->assertNotNull($endereco_obj->getNumeroCasa());
        $this->assertNotNull($endereco_obj->getComplemento());
        
        return $endereco_obj;
    
      

    }
   
   /**
    * @test
    * @return \Responsavel
    */
    public function testCriarResponsavel()
    {
       $nomeResp = 'Pai';
       $cpfResp = '012202033';
       $telResResp='33012392'; 
       $telTrabResp = '334373022';
       $telCelResp = '93322392';
       $parentesco = 'pai';
       $emailResp = 'pai@emai.com.br';
        
       $responsavel_obj = new Responsavel($nomeResp,$cpfResp,$telResResp, $telTrabResp, $telCelResp, $parentesco, $emailResp);
        $this->assertNotNull($responsavel_obj->getCategoria(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getCelular(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getCpf(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getEmail(), 'Campo não foi adicionado no HTML');
        //$this->assertNotNull($responsavel_obj->getNascimento(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getNome(), 'Campo não foi adicionado no HTML');
        //$this->assertNotNull($responsavel_obj->getSexo(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getTelTrabalho(), 'Campo não foi adicionado no HTML');
       
        return $responsavel_obj;
    }
    /**
     * @test
     * @depends testCriarResponsavel
     * @depends testCriarObjetoEndereco
     */
    public function testALuno(Responsavel $responsavel_obj, Endereco $endereco_obj)
    {
       $nome = 'Aluno';
       $sexo = 'masculino';
       $email = 'gbre';
       $nascimento = '24/11/1995';
       $anoEscolar = '3 ano';
       $telResidencial = '(61) 330133239';
       $telCelular = '(61) 9332292';
       $escola = 'sigma';
       
        $aluno_obj = new Aluno ($nome,$sexo,$nascimento,$email,$anoEscolar,$telResidencial,$telCelular,$escola,$endereco_obj,$responsavel_obj);
        
        
        echo print_r($aluno_obj, true);
        return $aluno_obj;
    }
    
    /**
     * 
     * @depends testAluno
     * @depends testCriarResponsavel
     * @depends testCriarObjetoEndereco
     */
    public function testDAO(Responsavel $responsavel_obj, Endereco $endereco_obj, Aluno $aluno_obj)
    {
       
       $crtrl_aluno = new AlunoCtrl_Test($responsavel_obj, $endereco_obj, $aluno_obj);
    }
    

}

?>
