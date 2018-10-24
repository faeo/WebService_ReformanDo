<?php

function listarProfissionais(){
    
    $conexao = conecta_bd();

    $sql = "SELECT * FROM reformando_banco.pessoas INNER JOIN reformando_banco.profissionais ON pessoas.idpessoas = profissionais.pessoas_idpessoas";

    $resultado = executar_sql($conexao, $sql);	

    $profissionais= array('Profissionais' => array() );

    foreach ($resultado as $key => $value) {
		$dadosProfissionais['id'] = $value["idpessoas"];
		$dadosProfissionais['nome'] = $value["nome"];
		$dadosProfissionais['apelido'] = $value["apelido"];
		$dadosProfissionais['cpf'] = $value["cpf"];
		$dadosProfissionais['endereco'] = $value["endereco"];
        $dadosProfissionais['bairro'] = $value["bairro"];
        $dadosProfissionais['cidade'] = $value["cidade"];
        $dadosProfissionais['telefone'] = $value["telefone"];
        $dadosProfissionais['idprofissionais'] = $value["idprofissionais"];
        $dadosProfissionais['profissao'] = $value["profissao"];
        $dadosProfissionais['qualificacao'] = $value["qualificacao"];
		$dadosProfissionais['pessoas_idpessoas'] = $value["pessoas_idpessoas"];


		$profissionais['Profissionais'][] = $dadosProfissionais;
		//echo $key . "=>" .$value["nome"] . "<br>";
    }

    header("Access-Control-Allow-Origin: *");

	header('Content-Type: application/json');
    
    echo json_encode($profissionais);


}

function cadastrarProfissionais($dados){

    $dados = json_decode($dados);

    $conexao = conecta_bd();

    $nome = $dados->nome;
    $apelido = $dados->apelido;
    $cpf = $dados->cpf;
    $endereco = $dados->endereco;
    $bairro= $dados->bairro;
    $cidade= $dados->cidade;
    $telefone = $dados->telefone;	
    $profissao = $dados->profissao;	
    

	$sql = "INSERT INTO reformando_banco.pessoas (nome, apelido, cpf, endereco, bairro, cidade, telefone) 
         VALUES ('$nome','$apelido','$cpf', '$endereco', '$bairro', '$cidade', '$telefone')";	

	$result = executar_sql($conexao, $sql);

	if ($result) {

        $sql1 = "SELECT idpessoas FROM reformando_banco.pessoas WHERE cpf = '$cpf'";

        $result = executar_sql($conexao, $sql1);

        $row = mysqli_fetch_assoc($result);

        $id = $row['idpessoas'];

        $sql2 = "INSERT INTO profissionais (pessoas_idpessoas, profissao, qualificacao) 
                VALUES ('$id', '$profissao', 0)";
        
        $result = executar_sql($conexao, $sql2);

        if ($result) {

	        echo json_encode(array('code' => 1, 'msg' => 'Profissional cadastrado com sucesso!'));
    
        }
        else{
            echo json_encode(array('code' => 0, 'msg' => 'Erro2!'));
        }
    }
	else{
		echo json_encode(array('code' => 0, 'msg' => 'Erro1!'));
	}

}

function avaliarProfissionalPorId($dados ,$id){

    $dados = json_decode($dados);

    $conexao = conecta_bd();

    $id = $dados->id;
    $nome = $dados->nome;
    $apelido = $dados->apelido;
    $cpf = $dados->cpf;
    $endereco = $dados->endereco;
    $bairro= $dados->bairro;
    $cidade= $dados->cidade;
    $telefone = $dados->telefone;	
    $profissao = $dados->profissao;
    $qualificacao = $dados->qualificacao;

    $sql = "UPDATE reformando_banco.profissionais SET qualificacao = $qualificacao WHERE pessoas_idpessoas = $id";
    
	$result = executar_sql($conexao, $sql);

	if ($result) {
		echo json_encode(array('code' => 1, 'msg' => 'Alterado com sucesso!'));
	}
	else{
		echo json_encode(array('code' => 0, 'msg' => 'Erro!'));
	}


}

if($acao == 'listarProfissionais'){

    listarProfissionais();

}

elseif($acao == 'cadastrarProfissionais'){	

	$dados = file_get_contents("php://input");

	cadastrarProfissionais($dados);
}

elseif($acao == 'avaliarProfissionalPorId'){

    $id = $_GET['id'];
	$dados = file_get_contents("php://input");

	avaliarProfissionalPorId($dados, $id);
}
	

?>