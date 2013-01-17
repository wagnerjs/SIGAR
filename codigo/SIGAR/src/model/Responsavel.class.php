<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Responsavel
 *
 * @author Andre
 */
class Responsavel extends Pessoa {

    private $_categoria;
    private $_telTrabalho;
    
    function __construct($nomeResp="",$emailResp="",$telResResp="", $telCelResp="", $sexo="",$nascimento="", $cpf="", $categoria="", $telefoneTrabalho="", $endereco_obj="") {
        $this->setNome($nomeResp);
        $this->setSexo($sexo);
        $this->setNascimento($nascimento);
        $this->setEmail($emailResp);
        $this->setTelefoneResidencial($telResResp);
        $this->setCelular($telCelResp);
        $this->setEndereco($endereco_obj);
        $this->setCpf($cpf);
        $this->_categoria = $categoria;
        $this->_telTrabalho = $telefoneTrabalho;
    }


    public function setCpf($_cpf) {
        $this->_cpf = $_cpf;
    }

    public function getCategoria() {
        return $this->_categoria;
    }

    public function getCpf() {
        return $this->_cpf;
    }

    public function getTelTrabalho() {
        return $this->_telTrabalho;
    }
    
    public function verifica_Endereco_Responsavel($enderecoAluno, $enderecoResponsavel,$mesmoEndereco){

            if($mesmoEndereco == "sim"){
                    $enderecoResponsavel = $enderecoAluno;
            }   
            else{
                    //Não altera o objeto com o enereço de responsavel        
            }



            return $enderecoResponsavel;
    }
}

?>
