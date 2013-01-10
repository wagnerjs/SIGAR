<?php
	//inclusão da página que valida a sessão do usuário
	include "validaSession.php";
	//destroi a sessão do usuário
	$ObjSessao->logoff();
?>