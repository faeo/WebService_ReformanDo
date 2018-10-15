<?php

function listarUsuarios(){
    
    $conexao = conecta_bd();

    $sql = "SELECT * FROM reformando_banco.pessoas INNER JOIN reformando_banco.usuarios ON pessoas.idpessoas = usuarios.pessoas_idpessoas";

    $resultado = executar_sql($conexao, $sql);	

    $usuarios= array('Usuarios' => array() );

    foreach ($resultado as $key => $value) {
		$dadosUsuarios['id pessoa'] = $value["idpessoas"];
		$dadosUsuarios['nome'] = $value["nome"];
		$dadosUsuarios['apelido'] = $value["apelido"];
		$dadosUsuarios['cpf'] = $value["cpf"];
		$dadosUsuarios['endereco'] = $value["endereco"];
        $dadosUsuarios['bairro'] = $value["bairro"];
        $dadosUsuarios['cidade'] = $value["cidade"];
        $dadosUsuarios['telefone'] = $value["telefone"];
        $dadosUsuarios['idusuarios'] = $value["idusuarios"];
        $dadosUsuarios['login'] = $value["login"];
        $dadosUsuarios['senha'] = $value["senha"];
		$dadosUsuarios['pessoas_idpessoas'] = $value["pessoas_idpessoas"];


		$usuarios['Usuarios'][] = $dadosUsuarios;
		//echo $key . "=>" .$value["nome"] . "<br>";
    }

    header("Access-Control-Allow-Origin: *");

	header('Content-Type: application/json');
    
    echo json_encode($usuarios);


}

function listarUsuarioPorId($id){

    $id = json_decode($id);

    $conexao = conecta_bd();

    $sql = "SELECT * FROM reformando_banco.pessoas INNER JOIN reformando_banco.usuarios ON pessoas.idpessoas = usuarios.pessoas_idpessoas WHERE idpessoas = $id";

    $resultado = executar_sql($conexao, $sql);	

    $usuarios= array('Usuarios' => array() );

    if ($resultado) {
	    
	    while ($row = $resultado->fetch_assoc()) {

	    	// $respostaAux = array();

	    	// $respostaAux['Codigo'] = $row->id;
	    	// $respostaAux['NomeProduto'] = $row->nome;

	    	$usuarios['Usuarios'][] = $row;

	    }
	}


    header("Access-Control-Allow-Origin: *");

	header('Content-Type: application/json');
    
    echo json_encode($row);


}

function cadastrarUsuario($dados){

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

if($acao == 'listarUsuarios'){

    listarUsuarios();

}

elseif($acao == 'listarUsuarioPorId'){

    listarUsuarioPorId($id);
}

elseif($acao == 'cadastrarUsuario'){

    cadastrarUsuario($dados);
}

	

?>