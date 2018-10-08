<?php

if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $telefone = $_POST['telefone'];
    $profissao = $_POST['profissao'];


    $sqlInsert = "INSERT INTO pessoas (nome, apelido, cpf, endereco, bairro, cidade, telefone) 
                VALUES ('$nome','$apelido','$cpf', '$endereco', '$bairro', '$cidade', '$telefone')";

	mysqli_query($link, $sqlInsert);

	if(mysqli_affected_rows($link) > 0){

        $sql1 = "SELECT idpessoas FROM reformando_banco.pessoas WHERE cpf = '$cpf'";
        $sqlresposta        = mysqli_query($link, $sql1);
        $dadosrecebidos = mysqli_fetch_array($sqlresposta);
        $id             = $dadosrecebidos['idpessoas'];

        $sql2 = "INSERT INTO profissionais (pessoas_idpessoas, profissao, qualificacao) VALUES ('$id', '$profissao', '0')";
        
        mysqli_query($link, $sql2);

        if(mysqli_affected_rows($link) > 0){
            
            echo" Profissional cadastrado!";
            
        }
        else{
            echo "Erro ao enviar!";	
            echo "<textarea>".$sql2."</textarea>";
        }
    
    
    
    }
	else{
        echo "Erro ao enviar!";	
        echo "<textarea>".$sqlInsert."</textarea>";
        
    }
    

}
?>
        

