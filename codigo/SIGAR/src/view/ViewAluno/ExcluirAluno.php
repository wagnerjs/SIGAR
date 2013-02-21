<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/AlunoCtrl.php';

    $alunoCtrl = new AlunoCrtl();
    $idPessoaAluno = $_GET["alunoPessoaID"];
    $alunoCtrl->apagarAluno($idPessoaAluno);
            
    echo "<script type='text/javascript'>alert('Registro deletado com sucesso!');</script>";
    
    header("location: PesquisaAluno.php");
        
    
?>