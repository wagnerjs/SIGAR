<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . "/SIGAR/codigo/SIGAR/src";
    require $url.'/view/ValidaSession.php';
    require_once $url.'/controller/ProfessorCtrl.php';
    require_once $url.'/controller/DisponibilidadeCtrl.php';

    $professorCtrl = new ProfessorCtrl();
    $idProfessor = $_GET["professorID"];
    $objCtrlDisp = new DisponibilidadeCtrl();
    $objCtrlDisp->deletarDisponibilidade($idProfessor);
    $professorCtrl->apagarProfessor($idProfessor);
        
    echo "<script type='text/javascript'>alert('Registro deletado com sucesso!');</script>";
    
    header("location: PesquisaProfessor.php");
        
    
?>
