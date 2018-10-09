<?php

function listarObras(){
    
    $conexao = conecta_bd();

    $sql = "SELECT * FROM reformando_banco.obras";

    $resultado = executar_sql($conexao, $sql);	

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


}

if($acao == 'listarObras'){

    listarObras();

}

	

?>