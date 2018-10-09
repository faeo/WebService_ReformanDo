<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");

require_once("../configuracoes/conexao_bd.php");

$acao = "";

if (!isset($_GET['acao'])) {
	echo "Bem-vindo à API";
}
else{

	$acao = $_GET['acao'];

}

include('obras.php');
include('profissionais.php');
include('usuarios.php');

?>