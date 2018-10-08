<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once("../config/conexao_bd.php");

    $dados = file_get_contents("php://input");

    $dados = json_decode($dados);

    $nome = $dados->nome;
    $apelido = $dados->apelido;
    $cpf = $dados->cpf;
    $endereco = $dados->endereco;
    $bairro = $dados->bairro;
    $cidade = $dados->cidade;
    $telefone = $dados->telefone;
    $profissao = $dados->profissao;
	
	$db = new DB();

	$sql = "INSERT INTO pessoas (nome, apelido, cpf, endereco, bairro, cidade, telefone) 
                VALUES ('$nome','$apelido','$cpf', '$endereco', '$bairro', '$cidade', '$telefone')";

    $query = $db->query($sql);

    if($db->execute()){

        $id = "SELECT id FROM pessoas WHERE 'cpf' = $cpf";
    
    
        $sql2 = "INSERT INTO profissionais (pessoas_idpessoas, profissao, qualificacao) VALUES ($id, '$profissao', 0)";


        $query = $db->query($sql2);

        if($db->execute()){
            echo "Profissional cadastrado!";  
        }  
    }

    else{
        echo "Ocorreu um erro";
    }


	//header("Access-Control-Allow-Origin: *");

	//header('Content-Type: application/json');


?>