<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


require_once("../config/conexao_bd.php");
	
	$db = new DB();

	$sql = "SELECT * FROM pessoas INNER JOIN profissionais ON pessoas.idpessoas = profissionais.pessoas_idpessoas";
	// $sql = "SELECT * FROM pessoas INNER JOIN profissionais ON pessoas.idpessoas = profissionais.pessoas_idpessoas where id = ".$GET["id"]."";

	$query = $db->query($sql);

	$resultado = $db->resultSet($query);

	$obras= array('Profissionais' => array() );

	foreach ($resultado as $key => $value) {
		$dadosObras['id'] = $value["idpessoas"];
		$dadosObras['nome'] = $value["nome"];
		$dadosObras['apelido'] = $value["apelido"];
		$dadosObras['cpf'] = $value["cpf"];
		$dadosObras['endereco'] = $value["endereco"];
		$dadosObras['bairro'] = $value["bairro"];
		$dadosObras['cidade'] = $value["cidade"];
		$dadosObras['telefone'] = $value["telefone"];
		$dadosObras['id profissional'] = $value["idprofissionais"];
		$dadosObras['id pessoas'] = $value["pessoas_idpessoas"];
		$dadosObras['profissao'] = $value["profissao"];
		$dadosObras['qualificacao'] = $value["qualificacao"];


		$obras['Obras'][] = $dadosObras;
		//echo $key . "=>" .$value["nome"] . "<br>";
	}


	header("Access-Control-Allow-Origin: *");

	header('Content-Type: application/json');
	echo json_encode($obras);

?>