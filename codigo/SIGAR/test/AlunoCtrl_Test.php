<?php

require_once '../src/model/Pessoa.class.php';
require_once '../src/model/Usuario.class.php';
require_once '../src/model/Aluno.class.php';
require_once '../src/model/Endereco.class.php';
require_once '../src/model/Responsavel.class.php';

/**
 * Description of AlunoCtrl_Test
 *
 * @author guilherme Baufaaker
 */
class AlunoCtrl_Test extends PHPUnit_Framework_TestCase 
{
   
    public function testCriarObjetoEndereco()
    {
        $endereco = 'QE 44 CONJUNTO X';
        $cep = '71070237';
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
   
   
    public function testCriarResponsavel()
    {
       $nomeResp = 'Juno';
       $cpfResp = '012202033';
       $telResResp='33013930'; 
       $telTrabResp = '334373022';
       $telCelResp = '93322392';
       $parentesco = 'pai';
       $emailResp = 'junorego@uol.com.br';
        
       $responsavel_obj = new Responsavel($nomeResp,$cpfResp,$telResResp, $telTrabResp, $telCelResp, $parentesco, $emailResp);
    
        $this->assertNotNull($responsavel_obj->getCategoria(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getCelular(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getCpf(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getEmail(), 'Campo não foi adicionado no HTML');
        //$this->assertNotNull($responsavel_obj->getNascimento(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getNome(), 'Campo não foi adicionado no HTML');
        //$this->assertNotNull($responsavel_obj->getSexo(), 'Campo não foi adicionado no HTML');
        $this->assertNotNull($responsavel_obj->getTelTrabalho(), 'Campo não foi adicionado no HTML');
       
    }
   //     
//        $aluno_obj = new Aluno ($nome,$sexo,$nascimento,$email,$anoEscolar,$telResidencial,$telCelular,$escola,$endereco_obj,$responsavel_obj);
}

?>
