<?php

//Lista todas as obras
function listarObras(){
    
    $conexao = conecta_bd();

    $sql = "SELECT * FROM reformando_banco.obras";

    $resultado = executar_sql($conexao, $sql);	

    $obras= array('Obras' => array() );

    foreach ($resultado as $key => $value) {
		$dadosObras['id'] = $value["idobras"];
		$dadosObras['nome'] = $value["nomeobra"];
		$dadosObras['descricao'] = $value["descricao"];
		$dadosObras['localizacao'] = $value["localizacao"];
		$dadosObras['profissional'] = $value["tipoprofissional"];
		$dadosObras['usuario'] = $value["usuarios_idusuarios"];


		$obras['Obras'][] = $dadosObras;
		//echo $key . "=>" .$value["nome"] . "<br>";
    }

    header("Access-Control-Allow-Origin: *");

	header('Content-Type: application/json');
    
    echo json_encode($obras);


}

//Exclui obra por ID
function excluirObraPorId($id){

	$conexao = conecta_bd();
	
	$sql = "DELETE FROM reformando_banco.obras WHERE idobras = $id";

	$result = executar_sql($conexao, $sql);			
	
	if ($result) {
	    echo json_encode(array('code' => 1, 'msg' => 'Produto excluído com sucesso!'));
	}
	else{
		echo json_encode(array('code' => 0, 'msg' => 'Erro!'));
	}	

}

//Editar Obras
function editarObraPorId($item, $id){

	$item = json_decode($item);

	$conexao = conecta_bd();

	$id = $item->id;
	$nome = $item->nome;
	$descricao = $item->descricao;
	$localizacao = $item->localizacao;
	$profissional = $item->profissional;
	$usuario = $item->usuario;	

	$sql = "UPDATE reformando_banco.obras SET nomeobra='$nome', descricao='$descricao', localizacao='$localizacao', tipoprofissional='$profissional' WHERE idobras=$id";	
	
	$result = executar_sql($conexao, $sql);

	if ($result) {
		echo json_encode(array('code' => 1, 'msg' => 'Obra alterada com sucesso!'));
	}
	else{
		echo json_encode(array('code' => 0, 'msg' => 'Erro!'));
	}

}

//Cadastrar nova Obra
function cadastrarObra($dados){

    $dados = json_decode($dados);

    $conexao = conecta_bd();

    $nomeobra = $dados->nomeobra;
	$descricao = $dados->descricao;
    $localizacao = $dados->localizacao;	
    $tipoprofissional = $dados->tipoprofissional;	
    $usuarios_idusuarios = $dados->usuarios_idusuarios;	
    

	$sql = "INSERT INTO reformando_banco.obras (nomeobra, descricao, localizacao, tipoprofissional, usuarios_idusuarios)
         VALUES ('$nomeobra', '$descricao', '$localizacao', '$tipoprofissional', $usuarios_idusuarios)";	

	$result = executar_sql($conexao, $sql);

	if ($result) {
	    echo json_encode(array('code' => 1, 'msg' => 'Sua Obra foi cadastrada com sucesso!'));
	}
	else{
		echo json_encode(array('code' => 0, 'msg' => 'Erro!'));
	}

}


//Ação de comando
if($acao == 'listarObras'){

    listarObras();

}

elseif($acao == 'excluirObraPorId'){

    $id = $_GET['idobras'];

    excluirObraPorId($id);
}

elseif($acao == 'editarObraPorId'){

	$id = $_GET['idobras'];
	$item = file_get_contents("php://input");

    editarObraPorId($item, $id);
}

elseif($acao == 'cadastrarObra'){	

	$dados = file_get_contents("php://input");

	cadastrarObra($dados);

	
}

?>