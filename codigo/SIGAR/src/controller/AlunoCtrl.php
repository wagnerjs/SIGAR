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
       
class AlunoCrtl {

        protected $_res = 0;
        
        public function validaAluno($_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_telResidencial,$_telCelular,$_anoEscolar,$_escola,
                                        $_nomeResp,$_categoria,$_cpfResp,$_emailResp,$_telResResp,$_sexoResp,$_nascimentoResp,$_telCelResp,$_telTrabResp,
                                        $_mesmoEnd,$_endereco,$_numero,$_complemento,$_bairro,$_cidade,$_uf,$_cep,$_referencia,
                                        $_enderecoResp,$_numeroResp,$_complementoResp,$_bairroResp,$_cidadeResp,$_ufResp,$_cepResp,$_referenciaResp,$_op){
            
            $validaAluno = new validacaoAluno();
                $this->_res += $validaAluno->valida_escola($_escola);
                $this->_res += $validaAluno->valida_ano_escolar($_anoEscolar);
                
            // DEBUG PARA ACHAR ERRO - 
            //$mensagem = "Validacao de Aluno -> $this->_res ";
            
            $validaEndereco = new validacaoEndereco();
                $this->_res += $validaEndereco->valida_logradouro($_endereco);
                $this->_res += $validaEndereco->valida_numero_casa($_numero);
                $this->_res += $validaEndereco->valida_bairro($_bairro);
                $this->_res += $validaEndereco->valida_cidade($_cidade);
                $this->_res += $validaEndereco->valida_cep($_cep);       
                $this->_res += $validaEndereco->valida_logradouro_resp($_enderecoResp, $_mesmoEnd);
                $this->_res += $validaEndereco->valida_numero_casa_resp($_numeroResp, $_mesmoEnd);
                $this->_res += $validaEndereco->valida_bairro_resp($_bairroResp, $_mesmoEnd);
                $this->_res += $validaEndereco->valida_cidade_resp($_cidadeResp, $_mesmoEnd);
                $this->_res += $validaEndereco->valida_cep_resp($_cepResp, $_mesmoEnd);
                
            // DEBUG PARA ACHAR ERRO
            //$mensagem .= "Validacao de End -> $this->_res";
            
            $validaPessoa = new validacaoPessoa();
                $this->_res += $validaPessoa->valida_nome($_nomeAluno);
                 //$mensagem = "Validacao nome -> $this->_res";
                $this->_res += $validaPessoa->valida_email($_emailAluno);
                 $mensagem .= "\nValidacao email -> $this->_res";
                $this->_res += $validaPessoa->valida_telefone_resid($_telResidencial);
                 $mensagem .= "\nValidacao tel resid -> $this->_res";
                $this->_res += $validaPessoa->valida_nome($_nomeResp);
                 $mensagem .= "\nValidacao nome resp -> $this->_res";
                $this->_res += $validaPessoa->valida_email($_emailResp);
                 $mensagem .= "\nValidacao email resp -> $this->_res";
                $this->_res += $validaPessoa->valida_telefone_resid($_telResResp); 
                 $mensagem .= "\nValidacao tel resid resp -> $this->_res";
                $this->_res += $validaPessoa->validacpf($_cpfResp);
                 $mensagem .= "\nValidacao cpf -> $this->_res";
                $this->_res += $validaPessoa->cpf_repetido($_cpfResp);
                 $mensagem .= "\nValidacao cpf repetido -> $this->_res";
          
             //$mensagem .= "Validacao de Pessoa -> $this->_res";
             
            if($this->_res == 0){
                if($_op == 1){
                    $this->instanciarAluno($_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_telResidencial,$_telCelular,$_anoEscolar,$_escola,
                                        $_nomeResp,$_categoria,$_cpfResp,$_emailResp,$_telResResp,$_sexoResp,$_nascimentoResp,$_telCelResp,$_telTrabResp,
                                        $_mesmoEnd,$_endereco,$_numero,$_complemento,$_bairro,$_cidade,$_uf,$_cep,$_referencia,
                                        $_enderecoResp,$_numeroResp,$_complementoResp,$_bairroResp,$_cidadeResp,$_ufResp,$_cepResp,$_referenciaResp);   
                                        $mensagem .= "<font color=green><b>Aluno Cadastrado com sucesso!</b></font>";
                }
                else{
                    $this->instanciarAlunoAlterar($_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_telResidencial,$_telCelular,$_anoEscolar,$_escola,
                                        $_nomeResp,$_categoria,$_cpfResp,$_emailResp,$_telResResp,$_sexoResp,$_nascimentoResp,$_telCelResp,$_telTrabResp,
                                        $_mesmoEnd,$_endereco,$_numero,$_complemento,$_bairro,$_cidade,$_uf,$_cep,$_referencia,
                                        $_enderecoResp,$_numeroResp,$_complementoResp,$_bairroResp,$_cidadeResp,$_ufResp,$_cepResp,$_referenciaResp);
                                        $mensagem .= "<font color=green><b>Aluno alterado com sucesso!</b></font>";
                }
            }else{
                $mensagem .= "<font color=red><b>Erro! Insira os dados corretamente!</b></font>";
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
                return 'Cadastro efetuado com sucesso!';
            }
            else {
                return 'Cadastro não foi efetuado com sucesso!';
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
            
            $alunoDAO->alterarAlunoBanco($idPessoaAluno,$aluno_obj);
            $alunoDAO->alterarUsuario($idPessoaAluno, $user_obj);
            $alunoDAO->alterarPessoaAluno($idPessoaAluno, $aluno_obj);
            
                    
            if($alunoDAO->alterarAluno($idPessoaAluno,$aluno_obj,$user_obj,$responsavel_obj) == 2)
            {
                return 'Alteração efetuado com sucesso!';
            }
             else {
                 return 'Cadastro não foi efetuado com sucesso!';
             }
            
        }
        
        public function listarAluno()
        {
            $alunoDAO = new AlunoDAO();
            $this->_res = $alunoDAO->listarAlunos();
        }
        
        public function listarPessoaAluno($alunoID)
        {
            $alunoDAO = new AlunoDAO();
            return $alunoDAO->listarPessoaAlunos($alunoID);
        }
        
        public function listarResponsavel($alunoID)
        {
            $alunoDAO = new AlunoDAO();
            return $alunoDAO->listarResponsavel($alunoID);
        }
        
        public function listaPessoaResponsavel($alunoID)
        {
            $alunoDAO = new AlunoDAO();
            return $alunoDAO->listarPessoaResponsavel($alunoID);
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
