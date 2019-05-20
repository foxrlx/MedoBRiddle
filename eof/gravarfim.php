<?php
        session_start();
	$nome = $_POST['Nome'];
	$arq = fopen("../final.txt", "a");
	fwrite($arq, $nome . " - " . " Inicio: " . $_SESSION['inicio'] . " FIM: " . date("d/m/y H:i:s") . "\r\n");
	fclose($arq);
	echo "1";
?>