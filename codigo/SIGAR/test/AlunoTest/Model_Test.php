<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Aluno.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Responsavel.class.php';

/**
 * @author Guilherme Baufaker  <gbre.111@gmail.com>
 */
class Model_Test extends PHPUnit_Framework_TestCase {
    
    protected $aluno_obj; 
    protected $endereco_obj;
    protected $reponsavel_obj;
    protected $user_obj;
    
    /**
     * 
     */
    public function setUp()
    {
        $logradouro = 'QE 32 CONJUNTO H';
        $cep = '710283832';
        $bairro = 'Guara';
        $cidade = 'Brasilia';
        $complemento = 'casa';
        $numero = '19';
        $uf = 'DF';
        $referencia = 'Brasilia';
        
        
       $nomeResp = 'Pai do Aluno';
       $sexoResp = 'masculino';
       $cpf = '012202033';
       $telResResp='33012392'; 
       $telefoneTrabalho = '334373022';
       $telCelResp = '93322392';
       $categoria = 'pai';
       $nascimentoResp = '1990-11-12';
       $emailResp = 'pai@emai.com.br';
       
       $nome = 'Aluno de teste';
       $sexo = 'masculino';
       $email = 'gbre';
       $nascimento = '1995-11-24';
       $anoEscolar = '3 ano';
       $telResidencial = '(61) 330133239';
       $telCelular = '(61) 9332292';
       $escola = 'Sigma';
       
       $this->endereco_obj=new Endereco($logradouro,$cep,$bairro,$cidade,$complemento,$numero,$uf,$referencia);
       $this->user_obj = new User();
       $this->responsavel_obj = new Responsavel(utf8_decode($nomeResp),$emailResp,$telResResp, $telCelResp, $sexoResp ,$nascimentoResp, $cpf, $categoria, $telefoneTrabalho, $this->endereco_obj);
       $this->aluno_obj=new Aluno (utf8_decode($nome),$sexo,$nascimento,$email,$anoEscolar,$telResidencial,$telCelular,$escola,  $this->endereco_obj,$this->responsavel_obj,$this->user_obj);
       
    }

     public function testCriarResponsavel()
    {
       
       $this->assertNotNull($this->responsavel_obj->getCategoria(), 'Campo não foi adicionado no HTML');
       $this->assertNotNull($this->responsavel_obj->getCelular(), 'Campo não foi adicionado no HTML');
       $this->assertNotNull($this->responsavel_obj->getCpf(), 'Campo não foi adicionado no HTML');
       $this->assertNotNull($this->responsavel_obj->getEmail(), 'Campo não foi adicionado no HTML');
       $this->assertNotNull($this->responsavel_obj->getNascimento(), 'Campo não foi adicionado no HTML');
       $this->assertNotNull($this->responsavel_obj->getNome(), 'Campo não foi adicionado no HTML');
       $this->assertNotNull($this->responsavel_obj->getSexo(), 'Campo não foi adicionado no HTML');
       $this->assertNotNull($this->responsavel_obj->getTelTrabalho(), 'Campo não foi adicionado no HTML');
      
    }
    
     public function testCriarObjetoEndereco()
    {
        $this->assertNotNull($this->endereco_obj->getUf());
        $this->assertNotNull($this->endereco_obj->getLogradouro());
        $this->assertNotNull($this->endereco_obj->getBairro());
        $this->assertNotNull($this->endereco_obj->getCep());
        $this->assertNotNull($this->endereco_obj->getCidade());
        $this->assertNotNull($this->endereco_obj->getReferencia());
        $this->assertNotNull($this->endereco_obj->getNumeroCasa());
        $this->assertNotNull($this->endereco_obj->getComplemento());
    }
    public function testCriarAluno()
    {
        $this->assertNotNull($this->aluno_obj->getEscola());
        $this->assertNotNull($this->aluno_obj->getResponsavel());
        $this->assertNotNull($this->aluno_obj->getAnoEscolar());
        $this->assertNotNull($this->aluno_obj->getUsuario());
        $this->assertNotNull($this->aluno_obj->getResponsavel());
       
    }
    public function testCriarUserNulo()
    {
        $this->assertEquals("",$this->user_obj->getLogin());
        $this->assertEquals("",$this->user_obj->getSenha());
    }
    
    public function testCriarUserPadrao()
    {
        $this->assertNotNull($this->user_obj->cria_Usuario_Padrao($this->aluno_obj->getNome(), $this->aluno_obj->getNascimento()));
    }
}
?>
