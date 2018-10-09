<?php

$url = 'http://localhost/WebService_ReformanDo/api/?acao=cadastrarProduto';
$data = array("nome" => "Item1", "Descricao" => "asdadsad", "valor" => 10);
$ch=curl_init($url);
$data_string = json_encode($data);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, array("produto"=>$data_string));

$result = curl_exec($ch);
curl_close($ch);

echo $result;

?>