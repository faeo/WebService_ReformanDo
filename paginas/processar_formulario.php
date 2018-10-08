<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("config/conexao_bd.php");
	
	$db = new DB();
	
	if(isset($_POST['enviar'])){
		
		$nomeObra = $_POST['nomeObra'];
		$descObra = $_POST['descObra'];
		$cidadeObra = $_POST['localObra']; 
		$profObra = $_POST['profObra'];
		

		$sql = "INSERT INTO obras ( nomeobra, descricao, localizacao, tipoprofissional, usuarios_idusuarios) VALUES ('".$nomeObra."', '".$descObra."', '".$cidadeObra."', '".$profObra."', '1')";


		$query = $db->query($sql);

		if($db->execute()){
			echo "Cadastrado com sucesso";
		}
		




	}

?>