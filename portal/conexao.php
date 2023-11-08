<?php

$hostname = "localhost";
$bancodedados = "maissorriso_db";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

if($mysqli->errno) {
	echo "Falha ao conectar (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


	
?>