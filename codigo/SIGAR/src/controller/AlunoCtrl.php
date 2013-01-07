<?php
require_once '../DAO/AlunoDAO.php';
require_once '../model/Aluno.class.php';
require_once '../model/Endereco.class.php';
require_once '../model/Pessoa.class.php';
require_once '../model/Responsavel.class.php';
require_once '../model/User.class.php';

       
class AlunoCrtl {
        protected $_nomeAluno;
        protected $_sexoAluno;
        protected $_nascimentoAluno;
        protected $_emailAluno;
        protected $_telResidencial;
        protected $_telCelular;
        protected $_anoEscolar;
        protected $_escola;
        
        protected $_nomeResp;
        protected $_categoria;
        protected $_cpfResp;
        protected $_emailResp;
        protected $_telResResp;
        protected $_sexoResp;
        protected $_nascimentoResp;
        protected $_telCelResp;
        protected $_telTrabResp;

        protected $_mesmoEnd;
        
        protected $_endereco;
        protected $_numero;
        protected $_complemento;
        protected $_bairro;
        protected $_cidade;
        protected $_uf;
        protected $_cep;
        protected $_referencia;

        /*protected $_enderecoResp;
        protected $_numeroResp;
        protected $_complementoResp;
        protected $_bairroResp;
        protected $_cidadeResp;
        protected $_ufResp;
        protected $_cepResp;
        protected $_referenciaResp;*/
        
        public function instanciarAluno()
        {
            if($this->mesmoEnd == "sim"){
                $endereco_obj = new Endereco($this->endereco,$this->cep,$this->bairro,$this->cidade,$this->complemento,$this->numero,$this->uf,$this->referencia);
                $responsavel_obj = new Responsavel($this->nomeResp,$this->emailResp,$this->telResResp, $this->telCelResp, $this->sexoResp, $this->nascimentoResp, $this->cpfResp, $this->categoria, $this->telTrabResp, $endereco_obj );
            }   
            else{
                $endereco_obj = new Endereco($this->enderecoResp,$this->cepResp,$this->bairroResp,$this->cidadeResp,$this->complementoResp,$this->numeroResp,$this->ufResp,$this->referenciaResp);
                $responsavel_obj = new Responsavel($this->nomeResp,$this->emailResp,$this->telResResp, $this->telCelResp, $this->sexoResp, $this->nascimentoResp, $this->cpfResp, $this->categoria, $this->telTrabResp, $endereco_obj );
            }

            $user_obj = new User();
            $aluno_obj = new Aluno ($this->nomeAluno,$this->sexoAluno,$this->nascimentoAluno,$this->emailAluno,$this->anoEscolar,$this->telResidencial,$this->telCelular,$this->escola,$endereco_obj, $responsavel_obj, $user_obj);
            $user_obj = $aluno_obj->get_usuario();

            $alunoDAO = new AlunoDAO();

            $alunoDAO->salvarAluno($aluno_obj, $responsavel_obj, $user_obj);
        }
        
        public function getNomeAluno() {
            return $this->_nomeAluno;
        }

        public function setNomeAluno($nomeAluno) {
            $this->_nomeAluno = $nomeAluno;
        }

        public function getSexoAluno() {
            return $this->_sexoAluno;
        }

        public function setSexoAluno($sexoAluno) {
            $this->_sexoAluno = $sexoAluno;
        }

        public function getNascimentoAluno() {
            return $this->_nascimentoAluno;
        }

        public function setNascimentoAluno($nascimentoAluno) {
            $this->_nascimentoAluno = $nascimentoAluno;
        }

        public function getEmailAluno() {
            return $this->_emailAluno;
        }

        public function setEmailAluno($emailAluno) {
            $this->_emailAluno = $emailAluno;
        }

        public function getTelResidencial() {
            return $this->_telResidencial;
        }

        public function setTelResidencial($telResidencial) {
            $this->_telResidencial = $telResidencial;
        }

        public function getTelCelular() {
            return $this->_telCelular;
        }

        public function setTelCelular($telCelular) {
            $this->_telCelular = $telCelular;
        }

        public function getAnoEscolar() {
            return $this->_anoEscolar;
        }

        public function setAnoEscolar($anoEscolar) {
            $this->_anoEscolar = $anoEscolar;
        }

        public function getEscola() {
            return $this->_escola;
        }

        public function setEscola($escola) {
            $this->_escola = $escola;
        }

        public function getNomeResp() {
            return $this->_nomeResp;
        }

        public function setNomeResp($nomeResp) {
            $this->_nomeResp = $nomeResp;
        }

        public function getCategoria() {
            return $this->_categoria;
        }

        public function setCategoria($categoria) {
            $this->_categoria = $categoria;
        }

        public function getCpfResp() {
            return $this->_cpfResp;
        }

        public function setCpfResp($cpfResp) {
            $this->_cpfResp = $cpfResp;
        }

        public function getEmailResp() {
            return $this->_emailResp;
        }

        public function setEmailResp($emailResp) {
            $this->_emailResp = $emailResp;
        }

        public function getTelResResp() {
            return $this->_telResResp;
        }

        public function setTelResResp($telResResp) {
            $this->_telResResp = $telResResp;
        }

        public function getSexoResp() {
            return $this->_sexoResp;
        }

        public function setSexoResp($sexoResp) {
            $this->_sexoResp = $sexoResp;
        }

        public function getNascimentoResp() {
            return $this->_nascimentoResp;
        }

        public function setNascimentoResp($nascimentoResp) {
            $this->_nascimentoResp = $nascimentoResp;
        }

        public function getTelCelResp() {
            return $this->_telCelResp;
        }

        public function setTelCelResp($telCelResp) {
            $this->_telCelResp = $telCelResp;
        }

        public function getTelTrabResp() {
            return $this->_telTrabResp;
        }

        public function setTelTrabResp($telTrabResp) {
            $this->_telTrabResp = $telTrabResp;
        }

        public function getMesmoEnd() {
            return $this->_mesmoEnd;
        }

        public function setMesmoEnd($mesmoEnd) {
            $this->_mesmoEnd = $mesmoEnd;
        }

        public function getEndereco() {
            return $this->_endereco;
        }

        public function setEndereco($endereco) {
            $this->_endereco = $endereco;
        }

        public function getNumero() {
            return $this->_numero;
        }

        public function setNumero($numero) {
            $this->_numero = $numero;
        }

        public function getComplemento() {
            return $this->_complemento;
        }

        public function setComplemento($complemento) {
            $this->_complemento = $complemento;
        }

        public function getBairro() {
            return $this->_bairro;
        }

        public function setBairro($bairro) {
            $this->_bairro = $bairro;
        }

        public function getCidade() {
            return $this->_cidade;
        }

        public function setCidade($cidade) {
            $this->_cidade = $cidade;
        }

        public function getUf() {
            return $this->_uf;
        }

        public function setUf($uf) {
            $this->_uf = $uf;
        }

        public function getCep() {
            return $this->_cep;
        }

        public function setCep($cep) {
            $this->_cep = $cep;
        }

        public function getReferencia() {
            return $this->_referencia;
        }

        public function setReferencia($referencia) {
            $this->_referencia = $referencia;
        }

        public function getEnderecoResp() {
            return $this->_enderecoResp;
        }

        public function setEnderecoResp($enderecoResp) {
            $this->_enderecoResp = $enderecoResp;
        }

        public function getNumeroResp() {
            return $this->_numeroResp;
        }

        public function setNumeroResp($numeroResp) {
            $this->_numeroResp = $numeroResp;
        }

        public function getComplementoResp() {
            return $this->_complementoResp;
        }

        public function setComplementoResp($complementoResp) {
            $this->_complementoResp = $complementoResp;
        }

        public function getBairroResp() {
            return $this->_bairroResp;
        }

        public function setBairroResp($bairroResp) {
            $this->_bairroResp = $bairroResp;
        }

        public function getCidadeResp() {
            return $this->_cidadeResp;
        }

        public function setCidadeResp($cidadeResp) {
            $this->_cidadeResp = $cidadeResp;
        }

        public function getUfResp() {
            return $this->_ufResp;
        }

        public function setUfResp($ufResp) {
            $this->_ufResp = $ufResp;
        }

        public function getCepResp() {
            return $this->_cepResp;
        }

        public function setCepResp($cepResp) {
            $this->_cepResp = $cepResp;
        }

        public function getReferenciaResp() {
            return $this->_referenciaResp;
        }

        public function setReferenciaResp($referenciaResp) {
            $this->_referenciaResp = $referenciaResp;
        }
}     
?>