<?php

function listarProfissionais(){
    
    $conexao = conecta_bd();

    $sql = "SELECT * FROM reformando_banco.pessoas INNER JOIN reformando_banco.profissionais ON pessoas.idpessoas = profissionais.pessoas_idpessoas";

    $resultado = executar_sql($conexao, $sql);	

    $profissionais= array('Profissionais' => array() );

    foreach ($resultado as $key => $value) {
		$dadosProfissionais['id pessoa'] = $value["idpessoas"];
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

if($acao == 'listarProfissionais'){

    listarProfissionais();

}

	

?>