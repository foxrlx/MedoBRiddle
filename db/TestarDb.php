<?php
function TestarDb() {
	include 'nfdb.php';
	$db = new NFDB();
//	$db->GravarInicio(1);
//	$db->GravarFim(1);
//	$db->GravarProgresso(1,1);
	echo "Teste<br />";
	$teste = $db->AutenticarUsuario("fox", "foxrlx");
	echo $teste-$Id . " - " . $teste->$Usuario;

	}
?>