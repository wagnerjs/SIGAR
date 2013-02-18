<?php

/**
 * Description of Professor
 *
 * @author Matheus
 */
class Professor extends Pessoa{
        
    private $meioDeTransporte = null;
    private $usuario;
    private $materias;
    
    public function __construct($nome="", $email="",$telefoneResidencial="",$celular="",$sexo="",$dataNascimento="",
                              $cpf="", $meioDeTransporte="", $endereco_obj="", $user_obj="", $materias="")
    {
        
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTelefoneResidencial($telefoneResidencial);
        $this->setCelular($celular);
        $this->setNascimento($dataNascimento);
        $this->setSexo($sexo);
        $this->setCpf($cpf);
        $this->setEndereco($endereco_obj);
        $this->meioDeTransporte = $meioDeTransporte;
        $this->usuario= $user_obj;
        $this->materias = $materias;
        
   }
      
    public function getMeioDeTransporte(){
        return $this->meioDeTransporte;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function getMateria(){
      return $this->materias;  
    }






}

?>
