<?php
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/AlunoDAO.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Aluno.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Endereco.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Pessoa.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/Responsavel.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/model/User.class.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/ValidacaoAluno.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/ValidacaoEndereco.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/ValidacaoPessoa.php';
require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/exception/ValidacaoResponsavel.php';
       
class AlunoCrtl {

        protected $_res;
        
        public function validaAluno($_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_telResidencial,$_telCelular,$_anoEscolar,$_escola,
                                        $_nomeResp,$_categoria,$_cpfResp,$_emailResp,$_telResResp,$_sexoResp,$_nascimentoResp,$_telCelResp,$_telTrabResp,
                                        $_mesmoEnd,$_endereco,$_numero,$_complemento,$_bairro,$_cidade,$_uf,$_cep,$_referencia,
                                        $_enderecoResp,$_numeroResp,$_complementoResp,$_bairroResp,$_cidadeResp,$_ufResp,$_cepResp,$_referenciaResp){
            $res = 0;
            
            $validaAluno = new validacaoAluno();
            $res = $res + $validaAluno->valida_escola($_escola);
            $res = $res + $validaAluno->valida_ano_escolar($_anoEscolar);
            
            $validaEndereco = new validacaoEndereco();
            $res = $res + $validaEndereco->valida_logradouro($_endereco);
            $res = $res + $validaEndereco->valida_numero_casa($_numero);
            $res = $res + $validaEndereco->valida_bairro($_bairro);
            $res = $res + $validaEndereco->valida_cidade($_cidade);
            $res = $res +$validaEndereco->valida_cep($_cep);
            
            $res = $res + $validaEndereco->valida_logradouro_resp($_enderecoResp, $_mesmoEnd);
            $res = $res + $validaEndereco->valida_numero_casa_resp($_numeroResp, $_mesmoEnd);
            $res = $res + $validaEndereco->valida_bairro_resp($_bairroResp, $_mesmoEnd);
            $res = $res + $validaEndereco->valida_cidade_resp($_cidadeResp, $_mesmoEnd);
            $res = $res +$validaEndereco->valida_cep_resp($_cepResp, $_mesmoEnd);
            
            $validaPessoa = new validacaoPessoa();
            $res = $res + $validaPessoa->valida_nome($_nomeAluno);
            $res = $res + $validaPessoa->valida_email($_emailAluno);
            $res = $res + $validaPessoa->valida_telefone_resid($_telResidencial);
            
            $res = $res + $validaPessoa->valida_nome($_nomeResp);
            $res = $res + $validaPessoa->valida_email($_emailResp);
            $res = $res + $validaPessoa->valida_telefone_resid($_telResResp);
            
            $validaResp = new validacaoResponsavel();
            $res = $res + $validaResp->validacpf($_cpfResp);
            $res = $res + $validaResp->cpf_repetido($_cpfResp);
          
            if($res==0){
                $this->instanciarAluno($_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_telResidencial,$_telCelular,$_anoEscolar,$_escola,
                                        $_nomeResp,$_categoria,$_cpfResp,$_emailResp,$_telResResp,$_sexoResp,$_nascimentoResp,$_telCelResp,$_telTrabResp,
                                        $_mesmoEnd,$_endereco,$_numero,$_complemento,$_bairro,$_cidade,$_uf,$_cep,$_referencia,
                                        $_enderecoResp,$_numeroResp,$_complementoResp,$_bairroResp,$_cidadeResp,$_ufResp,$_cepResp,$_referenciaResp);
            
                $mensagem = "<font color=green><b>Aluno Cadastrado com sucesso!</b></font>";
            }else{
                $mensagem = "<font color=red><b>Insira os dados corretamente!</b></font>";
            }
            return $mensagem;            
        }
        
        
        
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
        
        public function listarResponsavel($alunoID)
        {
            $alunoDAO = new AlunoDAO();
            $this->_res = $alunoDAO->listarResponsavel($alunoID);
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
