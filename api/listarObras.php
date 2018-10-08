<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once("../config/conexao_bd.php");
	
	$db = new DB();

	$sql = "SELECT * FROM obras";

	$query = $db->query($sql);

	$resultado = $db->resultSet($query);

	$obras= array('Obras' => array() );

	foreach ($resultado as $key => $value) {
		$dadosObras['id obra'] = $value["idobras"];
		$dadosObras['nome obra'] = $value["nomeobra"];
		$dadosObras['descricao'] = $value["descricao"];
		$dadosObras['localizacao'] = $value["localizacao"];
		$dadosObras['tipo profissional'] = $value["tipoprofissional"];
		$dadosObras['id usuario'] = $value["usuarios_idusuarios"];


		$obras['Obras'][] = $dadosObras;
		//echo $key . "=>" .$value["nome"] . "<br>";
	}


	header("Access-Control-Allow-Origin: *");

	header('Content-Type: application/json');
	echo json_encode($obras);

?>