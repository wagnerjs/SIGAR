<?php

/**
 * Description of Professor
 *
 * @author Matheus
 */
class Professor extends Pessoa{
        
    private $meioDeTransporte = null;
    private $usuario;
    
    public function constructPessoa($nome="", $email="",$telefoneResidencial="",$celular="",$sexo="",$dataNascimento="",
                              $cpf="", $meioDeTransporte="", $endereco_obj="", $user_obj="")
    {
        
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTelefoneResidencial($telefoneResidencial);
        $this->setCelular($celular);
        $this->setNascimento($dataNascimento);
        $this->setSexo($sexo);
        $this->setCpf($cpf);
        $this->setEndereco($endereco_obj);
        $this->meioDeTransporte($meioDeTransporte);
        $this->usuario($user_obj);
        
   }
      
    public function getMeioDeTransporte(){
        return $meioDeTransporte;
    }
    
    
    
}

?>
