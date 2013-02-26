<?php
$url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
require $url.'/utils/ezpdf/class.ezpdf.php';
require $url.'/utils/conexao.class.php';
require_once $url.'/controller/AlunoCtrl.php';
require_once $url.'/controller/ProfessorCtrl.php';

$pdf = new cezpdf('A4'); //instancia classe aqui voce poder� definir o tipo de papel a ser utilizado (A4, A5, A6, A7, e outros)
$pdf->selectFont($url.'/utils/ezpdf/fonts/Helvetica-Bold.afm'); // Seleciona a fonte a ser utilizada na geracao do PDF
//$pdf = new Cezpdf('A4');

        $obj_conecta = new bd();
            $obj_conecta->conecta();
            $obj_conecta->seleciona_bd();
            
        $professorCtrl = new ProfessorCtrl();
        $alunoCtrl = new AlunoCrtl();

	//Selecionando os dados do perfil
	$sql = "SELECT * FROM `agendamento`";
	$rs = mysql_query($sql);

	//Montando o array dos dados selecionados
	$dadosTb = array();
        
        while( $linha = mysql_fetch_array($rs) )
	{
		$resultado = $alunoCtrl->selecionarNome($linha['idAluno']);
                $result = $professorCtrl->listarProfessor($linha['idProfessor']);
                $dataRecebida = $linha['data'];
                $data = implode("/",array_reverse(explode("-",$dataRecebida)));
                $dadosTb [] = array(
			'nomeAluno' => utf8_decode($resultado['nome']),
                        'nomeProfessor' => utf8_decode($result['nome']),
			'data' => $data,
                        'horario' => $linha['horario'],
			'status' => utf8_decode($linha['status']),
			'conteudo' => utf8_decode($linha['conteudo']),
		);
	}

	//Montando os títulos
	$titulos = array(
                'nomeAluno' => '<b>Aluno</b>',
                'nomeProfessor' => '<b>Professor</b>',
                'data' => '<b>Data</b>',
                'horario' => utf8_decode('<b>Horário</b>'),
                'conteudo' => utf8_decode('<b>Conteúdo</b>'),
                'status' => '<b>Status</b>',
	);

	//Opções de impressão do relatório PDF
	$opcoes = array(
		'width' => '550', 'fontSize' => '10',
		'xOrientation' => ('center')
	);
	//xOrientation' => 'left','right','center'; define a posicao da tabela na folha
	//'fontSize' => 10 // tamanho da fonte na tabela
	//'width'=> 600 // tamanho da tabela

	//Configurações do logotipo do relatório
	$options = array('justification'=>'center');
	$pdf->ezText("<b>Aulas agendadas</b>\n",18,$options);// Define o texto do seu pdf, e o tamanho da fonte;
	$pdf->ezTable($dadosTb,$titulos,'',$opcoes); //define os dados que irão na tabela, titulos e outras especificacoes
	$pdf->ezStream(); //Escreve a saida do PDF via stream;

?>