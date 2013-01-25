<?php
require_once '../DAO/AlunoDAO.php';
require_once '../model/Aluno.class.php';
require_once '../model/Endereco.class.php';
require_once '../model/Pessoa.class.php';
require_once '../model/Responsavel.class.php';
require_once '../model/User.class.php';
       
class AlunoCrtl {

        protected $_res;
        
        public function instanciarAluno($_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_telResidencial,$_telCelular,$_anoEscolar,$_escola,
                                        $_nomeResp,$_categoria,$_cpfResp,$_emailResp,$_telResResp,$_sexoResp,$_nascimentoResp,$_telCelResp,$_telTrabResp,
                                        $_mesmoEnd,$_endereco,$_numero,$_complemento,$_bairro,$_cidade,$_uf,$_cep,$_referencia,
                                        $_enderecoResp,$_numeroResp,$_complementoResp,$_bairroResp,$_cidadeResp,$_ufResp,$_cepResp,$_referenciaResp)
        {
        
            $endereco_aluno = new Endereco($_endereco,$_cep,$_bairro,$_cidade,$_complemento,$_numero,$_uf,$_referencia);
            $endereco_responsavel = new Endereco($_enderecoResp,$_cepResp,$_bairroResp,$_cidadeResp,$_complementoResp,$_numeroResp,$_ufResp,$_referenciaResp);


            $objeto_Resp = new Responsavel();
            $enderecoResp = $objeto_Resp->verifica_Endereco_Responsavel($endereco_aluno, $endereco_responsavel,$_mesmoEnd);

            $responsavel_obj = new Responsavel($_nomeResp,$_emailResp,$_telResResp, $_telCelResp, $_sexoResp, $_nascimentoResp, $_cpfResp, $_categoria, $_telTrabResp, $enderecoResp );


            $user_obj = new User();
            $user_objeto = $user_obj->cria_Usuario_Padrao($_nomeAluno, $_nascimentoAluno);
            $aluno_obj = new Aluno ($_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_anoEscolar,$_telResidencial,$_telCelular,$_escola,$endereco_aluno, $responsavel_obj, $user_objeto);


            $alunoDAO = new AlunoDAO();

            if ($alunoDAO->salvarAluno($aluno_obj, $responsavel_obj, $user_objeto) == '1')
            {
                return 'Cadastro Efetuado Com Sucesso';
            }
             else {
                 return 'Cadastro Não Foi Eftuado Com Sucesso';
             }
            
            
        }
        
        public function instanciarAlunoAlterar($idPessoaAluno,$_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_telResidencial,$_telCelular,$_anoEscolar,$_escola,
                                        $_nomeResp,$_categoria,$_cpfResp,$_emailResp,$_telResResp,$_sexoResp,$_nascimentoResp,$_telCelResp,$_telTrabResp,
                                        $_mesmoEnd,$_endereco,$_numero,$_complemento,$_bairro,$_cidade,$_uf,$_cep,$_referencia,
                                        $_enderecoResp,$_numeroResp,$_complementoResp,$_bairroResp,$_cidadeResp,$_ufResp,$_cepResp,$_referenciaResp)
        {
        
            $endereco_aluno = new Endereco($_endereco,$_cep,$_bairro,$_cidade,$_complemento,$_numero,$_uf,$_referencia);
            $endereco_responsavel = new Endereco($_enderecoResp,$_cepResp,$_bairroResp,$_cidadeResp,$_complementoResp,$_numeroResp,$_ufResp,$_referenciaResp);


            $objeto_Resp = new Responsavel();
            $enderecoResp = $objeto_Resp->verifica_Endereco_Responsavel($endereco_aluno, $endereco_responsavel,$_mesmoEnd);

            $responsavel_obj = new Responsavel($_nomeResp,$_emailResp,$_telResResp, $_telCelResp, $_sexoResp, $_nascimentoResp, $_cpfResp, $_categoria, $_telTrabResp, $enderecoResp );


            $user_obj = new User();
            $user_objeto = $user_obj->cria_Usuario_Padrao($_nomeAluno, $_nascimentoAluno);
            $aluno_obj = new Aluno ($_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_anoEscolar,$_telResidencial,$_telCelular,$_escola,$endereco_aluno, $responsavel_obj, $user_objeto);


            $alunoDAO = new AlunoDAO();
            if($alunoDAO->alterarAluno($idPessoaAluno, $aluno_obj, $user_objeto, $responsavel_obj) == '1')
            {
                return 'Cadastro Efetuado Com Sucesso';
            }
             else {
                 return 'Cadastro Não Foi Eftuado Com Sucesso';
             }
            
            
        }
        
        public function listarAluno()
        {
            $alunoDAO = new AlunoDAO();
            $this->_res = $alunoDAO->listarAlunos();
        }
        
        public function apagarAluno($idPessoaAluno){
            $alunoDAO = new AlunoDAO();
            $alunoDAO->deletarAluno($idPessoaAluno);
        }
        
    
       
        
        public function getResposta() {
            return $this->_res;
        }
        
        public function listarAlunoAjax($alunoID) {            
            $alunoDAO = new AlunoDAO();
            return $alunoDAO->listarAluno($alunoID);          
        }
        
}     
?>
