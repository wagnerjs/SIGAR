<?php

/**
 * author Matheus 
 */
class ProfessorCtrl {

    public function validaProfessor($nomeProfessor, $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $enderecoProfessor, $cpfProfessor, $meioDeTransporte, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor) {

        $res = 0;

        $validaProfessor = new validacaoProfessor();
        $res = $res + $validaProfessor->valida_meio_transporte($meioDeTransporte);

        $validaEndereco = new validacaoEndereco();
        $res = $res + $validaEndereco->valida_logradouro($logradouroProfessor);
        $res = $res + $validaEndereco->valida_numero_casa($numeroCasaProfessor);
        $res = $res + $validaEndereco->valida_bairro($bairoProfessor);
        $res = $res + $validaEndereco->valida_cidade($cidadeProfessor);
        $res = $res + $validaEndereco->valida_cep($cepProfessor);

        $validaPessoa = new validacaoPessoa();
        $res = $res + $validaPessoa->valida_nome($nomeProfessor);
        $res = $res + $validaPessoa->valida_email($emailProfessor);
        $res = $res + $validaPessoa->valida_telefone_resid($telResProfessor);
        $res = $res + $validaPessoa->validacpf($cpfProfessor);
        $res = $res + $validaPessoa->cpf_repetido($cpfProfessor);

        if ($res == 0) {
            $this->instanciarProfessor($nomeProfessor, $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $enderecoProfessor, $cpfProfessor, $meioDeTransporte, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor);

            $mensagem = "<font color=green><b>Professor Cadastrado com sucesso!</b></font>";
        } else {
            $mensagem = "<font color=red><b>Insira os dados corretamente!</b></font>";
        }
        return $mensagem;
    }

    public function instanciarProfessor($nomeProfessor, $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $cpfProfessor, $meioDeTransporte, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor) {

        $objEndProfessor = new Endereco($cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor,
                        $cidadeProfessor, $ufProfessor, $referenciaProfessor);

        $userObj = new User();
        $userObj->cria_Usuario_Padrao($nomeProfessor, $nascProfessor);

        $professor = new Professor($nomeProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $sexoProfessor,
                                    $nascProfessor, $cpfProfessor, $meioDeTransporte, $objEndProfessor, $userObj);
        
        $professorDao = new ProfessorDAO();
        $idPessoaProf = $professorDao->salvarPessoa($professor);
        $idPessoaUser = $professorDao->salvarUsuario($idPessoaProf, $userObj);
        $idProfessor = $professorDao->salvarProfessor($idPessoaUser, $professor);
        $idEndProfessor = $professorDao->salvarProfessorEndereco($professor);
        $professorDao->salvarEnderecoAssociativa($idEndProfessor, $idPessoaProf);
        
        
        
        if ($idProfessor) {
            return 'Cadastro de Professor Efetuado com Sucesso';
        } else {
            return 'Cadastrado não Efetuado';
        }
    }

    public function instanciarAlterarProfessor($idPessoaProfessor, $idProfessor, $nomeProfessor, $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $cpfProfessor, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor,$meioDeTransporte) {
        $objEndProfessor = new Endereco($cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor,
                        $cidadeProfessor, $ufProfessor, $referenciaProfessor);

        $userObj = new User();
        $userObj->cria_Usuario_Padrao($nomeProfessor, $nascProfessor);

        $professor = new Professor($nomeProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $sexoProfessor,
                                    $nascProfessor, $cpfProfessor, $meioDeTransporte, $objEndProfessor, $userObj);
        
        $professorDao = new ProfessorDAO();
        
    
        $retorno = $professorDao->alterarPessoaProfessor($idPessoaProfessor, $professor);
        $retorno = $retorno + $professorDao->alterarProfessor($idProfessor, $professor);
        $retorno = $retorno + $professorDao->alterarEndereco($idPessoaProfessor, $professor);
        
             
        if ($retorno == 3) {
            return 'Professor alterado com Sucesso';
        } else {
            return 'Falha na ateração de Professor';
        }
    }

    public function listarProfessor($idProfessor) {
        $professorDao = new ProfessorDAO();
        $professorDao->listarProfessor($idProfessor);
     }

    public function apagarProfessor($idPessoaProfessor) {
        $professorDao = new ProfessorDAO();
        $professorDao->deletarProfessor($idPessoaProfessor);
    }

}

?>
