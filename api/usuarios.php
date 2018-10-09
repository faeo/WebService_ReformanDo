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

if($acao == 'listarUsuarios'){

    listarUsuarios();

}

	

?>