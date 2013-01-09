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
            if($_mesmoEnd == "sim"){
                $endereco_obj = new Endereco($_endereco,$_cep,$_bairro,$_cidade,$_complemento,$_numero,$_uf,$_referencia);
                $responsavel_obj = new Responsavel($_nomeResp,$_emailResp,$_telResResp, $_telCelResp, $_sexoResp, $_nascimentoResp, $_cpfResp, $_categoria, $_telTrabResp, $endereco_obj );
            }   
            else{
                $endereco_obj = new Endereco($_endereco,$_cep,$_bairro,$_cidade,$_complemento,$_numero,$_uf,$_referencia);
                $endereco_obj_resp = new Endereco($_enderecoResp,$_cepResp,$_bairroResp,$_cidadeResp,$_complementoResp,$_numeroResp,$_ufResp,$_referenciaResp);
                $responsavel_obj = new Responsavel($_nomeResp,$_emailResp,$_telResResp, $_telCelResp, $_sexoResp, $_nascimentoResp, $_cpfResp, $_categoria, $_telTrabResp, $endereco_obj_resp );
            }

            $user_obj = new User();
            $aluno_obj = new Aluno ($_nomeAluno,$_sexoAluno,$_nascimentoAluno,$_emailAluno,$_anoEscolar,$_telResidencial,$_telCelular,$_escola,$endereco_obj, $responsavel_obj, $user_obj);
            $user_obj = $aluno_obj->get_usuario();

            $alunoDAO = new AlunoDAO();

            $alunoDAO->salvarAluno($aluno_obj, $responsavel_obj, $user_obj);
        }
        
        public function listarAluno()
        {
            $alunoDAO = new AlunoDAO();
            $this->_res = $alunoDAO->listarAlunos();
        }
        
        public function getResposta() {
            return $this->_res;
        }
        
}     
?>