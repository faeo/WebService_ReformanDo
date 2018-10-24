<?php

function listarUsuarios(){
    
    $conexao = conecta_bd();

    $sql = "SELECT * FROM reformando_banco.pessoas INNER JOIN reformando_banco.usuarios ON pessoas.idpessoas = usuarios.pessoas_idpessoas";

    $resultado = executar_sql($conexao, $sql);	

    $usuarios= array('Usuarios' => array() );

    foreach ($resultado as $key => $value) {
		$dadosUsuarios['id'] = $value["idpessoas"];
		$dadosUsuarios['nome'] = $value["nome"];
		$dadosUsuarios['apelido'] = $value["apelido"];
		$dadosUsuarios['cpf'] = $value["cpf"];
		$dadosUsuarios['endereco'] = $value["endereco"];
        $dadosUsuarios['bairro'] = $value["bairro"];
        $dadosUsuarios['cidade'] = $value["cidade"];
        $dadosUsuarios['telefone'] = $value["telefone"];
        $dadosUsuarios['idusuarios'] = $value["idusuarios"];
        $dadosUsuarios['email'] = $value["email"];
        $dadosUsuarios['senha'] = $value["senha"];
		$dadosUsuarios['pessoas_idpessoas'] = $value["pessoas_idpessoas"];


		$usuarios['Usuarios'][] = $dadosUsuarios;
		//echo $key . "=>" .$value["nome"] . "<br>";
    }

    header("Access-Control-Allow-Origin: *");

	header('Content-Type: application/json');
    
    echo json_encode($usuarios);


}

function listarUsuariosPorId($id){
    
    $conexao = conecta_bd();

    $sql = "SELECT * FROM reformando_banco.pessoas INNER JOIN reformando_banco.usuarios ON pessoas.idpessoas = usuarios.pessoas_idpessoas WHERE idpessoas = '$id'";

    $resultado = executar_sql($conexao, $sql);	

    $usuarios= array('Usuarios' => array() );

    foreach ($resultado as $key => $value) {
		$dadosUsuarios['id'] = $value["idpessoas"];
		$dadosUsuarios['nome'] = $value["nome"];
		$dadosUsuarios['apelido'] = $value["apelido"];
		$dadosUsuarios['cpf'] = $value["cpf"];
		$dadosUsuarios['endereco'] = $value["endereco"];
        $dadosUsuarios['bairro'] = $value["bairro"];
        $dadosUsuarios['cidade'] = $value["cidade"];
        $dadosUsuarios['telefone'] = $value["telefone"];
        $dadosUsuarios['idusuarios'] = $value["idusuarios"];
        $dadosUsuarios['email'] = $value["email"];
        $dadosUsuarios['senha'] = $value["senha"];
		$dadosUsuarios['pessoas_idpessoas'] = $value["pessoas_idpessoas"];


		$usuarios['Usuarios'][] = $dadosUsuarios;
		//echo $key . "=>" .$value["nome"] . "<br>";
    }

    header("Access-Control-Allow-Origin: *");

	header('Content-Type: application/json');
    
    echo json_encode($usuarios);


}

function cadastrarUsuario($dados){

    $dados = json_decode($dados);

    $conexao = conecta_bd();

    $nome = $dados->nome;
    $apelido = $dados->apelido;
    $cpf = $dados->cpf;
    $endereco = $dados->endereco;
    $bairro= $dados->bairro;
    $cidade= $dados->cidade;
    $telefone = $dados->telefone;	
    $email = $dados->email;
    $senha = $dados->senha;	
    

	$sql = "INSERT INTO reformando_banco.pessoas (nome, apelido, cpf, endereco, bairro, cidade, telefone) 
         VALUES ('$nome','$apelido','$cpf', '$endereco', '$bairro', '$cidade', '$telefone')";	

	$result = executar_sql($conexao, $sql);

	if ($result) {

        $sql1 = "SELECT idpessoas FROM reformando_banco.pessoas WHERE cpf = '$cpf'";

        $result = executar_sql($conexao, $sql1);

        $row = mysqli_fetch_assoc($result);

        $id = $row['idpessoas'];

        $sql2 = "INSERT INTO usuarios (pessoas_idpessoas, email, senha) 
                VALUES ('$id', '$email', '$senha')";
        
        $result = executar_sql($conexao, $sql2);

        if ($result) {

	        echo json_encode(array('code' => 1, 'msg' => 'Usuario cadastrado com sucesso!'));
    
        }
        else{
            echo json_encode(array('code' => 0, 'msg' => 'Erro2!'));
        }
    }
	else{
		echo json_encode(array('code' => 0, 'msg' => 'Erro1!'));
	}

}

function logarApp($dados){

    $dados = json_decode($dados);

    $email = $dados->email;
    $senha = $dados->senha;

    $conexao = conecta_bd();

    $sql = "SELECT * FROM reformando_banco.usuarios  WHERE email = '$email' AND senha = '$senha'";

    $result = executar_sql($conexao, $sql);	

    $usuarios= array('Usuarios' => array() );
    

    foreach ($result as $key => $value) {
		
        $dadosUsuarios['idusuarios'] = $value["idusuarios"];
        $dadosUsuarios['email'] = $value["email"];
        $dadosUsuarios['senha'] = $value["senha"];
		$dadosUsuarios['pessoas_idpessoas'] = $value["pessoas_idpessoas"];


		$usuarios['Usuarios'][] = $dadosUsuarios;
		//echo $key . "=>" .$value["nome"] . "<br>";
    }


    header("Access-Control-Allow-Origin: *");

	header('Content-Type: application/json');
    
    echo json_encode($usuarios);

}

if($acao == 'listarUsuarios'){

    listarUsuarios();

}

elseif($acao == 'cadastrarUsuario'){

    $dados = file_get_contents("php://input");

    cadastrarUsuario($dados);
}

elseif($acao == 'logarApp'){

    $dados = file_get_contents("php://input");

    logarApp($dados);
}

elseif($acao == 'listarUsuariosPorId'){

    $id = $_GET['id'];

    listarUsuariosPorId($id);

}



	

?>