<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$link = mysqli_connect("localhost", "admin", "admin", "reformando_banco");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//echo "Conexão realizada<br><br>";

function conecta_bd($host='localhost', $usuario='admin', $senha='admin', $bd='reformando_banco'){
	
	$mysqli = null;

	$mysqli = new mysqli($host, $usuario, $senha, $bd);

	if ($mysqli->connect_error) {
	    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}

	return $mysqli;

}

function executar_sql($conexao, $sql){

	$result_query = $conexao->query($sql);

	return $result_query;

}

?>
