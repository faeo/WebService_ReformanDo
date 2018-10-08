<?php

if(isset($_POST['cadastrar'])){

	$nomeObra = $_POST['nomeObra'];
	$descObra = $_POST['descObra'];
	$cidadeObra = $_POST['localObra']; 
	$profObra = $_POST['profObra'];

	$sqlInsert = "INSERT INTO obras ( nomeobra, descricao, localizacao, tipoprofissional, usuarios_idusuarios) VALUES ('".$nomeObra."', '".$descObra."', '".$cidadeObra."', '".$profObra."','1')";

	mysqli_query($link, $sqlInsert);

	if(mysqli_affected_rows($link) > 0){
		echo "Obra cadastrada!";
	}
	else{
		echo "Erro ao enviar!";	
		echo "<textarea>".$sqlInsert."</textarea>";
	}
}

?>