<?php 
try {
	$pdo = new PDO("mysql:dbname=agendamento;host=localhost;", "root", "");
} catch (Exception $e) {
	echo "ERRO: ".$e->getMessage();
	exit();
}


?>