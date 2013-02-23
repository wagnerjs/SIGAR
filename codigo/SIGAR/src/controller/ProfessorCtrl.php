<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/ProfessorDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/DisponibilidadeDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Responsavel.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Professor.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/ValidacaoProfessor.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/ValidacaoEndereco.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/ValidacaoPessoa.php';

/**
 * author Matheus 
 */
class ProfessorCtrl {

    protected $_res = 0;
    protected $_resMaterias;

    public function validaProfessor($idProfessor, $nomeProfessor, $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $enderecoProfessor, $cpfProfessor, $meioDeTransporte, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor, $materias, $opcao) {

        $validaProfessor = new validacaoProfessor();
        $this->_res += $validaProfessor->valida_meio_transporte($meioDeTransporte);
        $this->_res += $validaProfessor->valida_Materias($materias);

        $validaEndereco = new validacaoEndereco();
        $this->_res += $validaEndereco->valida_logradouro($logradouroProfessor);
        $this->_res += $validaEndereco->valida_numero_casa($numeroCasaProfessor);
        $this->_res += $validaEndereco->valida_bairro($bairoProfessor);
        $this->_res += $validaEndereco->valida_cidade($cidadeProfessor);
        $this->_res += $validaEndereco->valida_cep($cepProfessor);

        $validaPessoa = new validacaoPessoa();
        $this->_res += $validaPessoa->valida_nome($nomeProfessor);
        $this->_res += $validaPessoa->valida_email($emailProfessor);
        $this->_res += $validaPessoa->valida_telefone_resid($telResProfessor);

        $this->_res += $validaPessoa->validacpf($cpfProfessor);
        

        if ($opcao == 1) {
            $this->_res += $validaPessoa->cpf_repetido($cpfProfessor);
        }


        if ($this->_res == 0) {
            if ($opcao == 1) {
                $this->instanciarProfessor($nomeProfessor, $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $cpfProfessor, $meioDeTransporte, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor, $materias);
                $mensagem = "<font color=green><b>Professor Cadastrado com sucesso!</b></font>";
            } else {

                $this->instanciarAlterarProfessor($idProfessor, $nomeProfessor, $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $cpfProfessor, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor, $meioDeTransporte, $materias);
                $mensagem = "<font color=green><b>Professor Alterado com sucesso!</b></font>";
            }
        } else {
            $mensagem = "<font color=red><b>Insira os dados corretamente!</b></font>";
        }

        return $mensagem;
    }

    public function instanciarProfessor($nomeProfessor, $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $cpfProfessor, $meioDeTransporte, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor, $materias) {

        $objEndProfessor = new Endereco($logradouroProfessor, $cepProfessor,
                        $bairoProfessor, $cidadeProfessor, $complementoProf,
                        $numeroCasaProfessor, $ufProfessor, $referenciaProfessor);

        $userObj = new User();
        $userObj->cria_Usuario_Padrao($nomeProfessor, $nascProfessor);

        $professor = new Professor($nomeProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $sexoProfessor,
                        $nascProfessor, $cpfProfessor, $meioDeTransporte, $objEndProfessor, $userObj,$materias);

        $professorDao = new ProfessorDAO();
        $idPessoaProf = $professorDao->salvarPessoa($professor);
        $idPessoaUser = $professorDao->salvarUsuario($idPessoaProf, $userObj);
        $idProfessor = $professorDao->salvarProfessor($idPessoaUser, $professor);
        $idEndProfessor = $professorDao->salvarProfessorEndereco($professor);
        $erro = $professorDao->salvarMateriasProfessor($idProfessor, $professor);
        $professorDao->salvarEnderecoAssociativa($idEndProfessor, $idPessoaProf);
        $disponibilidadeDAO = new DisponibilidadeDAO();
        $disponibilidadeDAO->salvarDisponibilidade($idProfessor);



        if ($idProfessor) {
            return 'Cadastro de Professor Efetuado com Sucesso';
        } else {
            return 'Cadastrado não Efetuado';
        }
    }

    public function instanciarAlterarProfessor($idProfessor, $nomeProfessor, $sexoProfessor, $nascProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $cpfProfessor, $cepProfessor, $logradouroProfessor, $numeroCasaProfessor, $complementoProf, $bairoProfessor, $cidadeProfessor, $ufProfessor, $referenciaProfessor, $meioDeTransporte, $materias) {

        $objEndProfessor = new Endereco($logradouroProfessor, $cepProfessor,
                        $bairoProfessor, $cidadeProfessor, $complementoProf,
                        $numeroCasaProfessor, $ufProfessor, $referenciaProfessor);

        $userObj = new User();
        $userObj->cria_Usuario_Padrao($nomeProfessor, $nascProfessor);

        $professor = new Professor($nomeProfessor, $emailProfessor, $telResProfessor, $celularProfessor, $sexoProfessor,
                        $nascProfessor, $cpfProfessor, $meioDeTransporte, $objEndProfessor, $userObj, $materias);

        $professorDao = new ProfessorDAO();
        $idPessoaProfessor = $professorDao->selecionarIdPessoaProfessor($idProfessor);

        $retorno = $professorDao->alterarPessoaProfessor($idPessoaProfessor, $professor);
        $retorno += $professorDao->alterarProfessor($idProfessor, $professor);
        $retorno += $professorDao->alterarEndereco($idPessoaProfessor, $professor);
        $retorno += $professorDao->alterarMateriasProfessor($idProfessor, $professor);


        if ($retorno == 3) {
            return 'Professor alterado com Sucesso';
        } else {
            return 'Falha na ateração de Professor';
        }
    }

    public function listarTodosProfessores() {
        $professorDao = new ProfessorDAO();
        $this->_res = $professorDao->listarTodosProfessores();
    }

    public function listarProfessor($idProfessor) {
        $professorDao = new ProfessorDAO();
        return $professorDao->listarProfessor($idProfessor);
    }
    
    public function selecionarMateriasProfessor($idProfessor){
        $professorDao = new ProfessorDAO();
        $this->_resMaterias = $professorDao->selecionarMateriasProfessor($idProfessor);
    }

    public function apagarProfessor($idProfessor) {
        $professorDao = new ProfessorDAO();
        $professorDao->deletarProfessor($idProfessor);
    }

    public function getResposta() {
        return $this->_res;
    }
    
     public function getMaterias() {
        return $this->_resMaterias;
    }
    
    
    public function criarCheckMaterias(){
       $professorDao = new ProfessorDAO();
       $this->_res = $professorDao->criarCheckMaterias();
    }

}

?>
