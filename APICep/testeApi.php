<?php


$cep = "01310100";
$link = "https://viacep.com.br/ws/$cep/json/";

$ch = curl_init($link);

//CURLOPT_RETURNTRANSFER fala para o 
//Servidor que quer recerber um retorno
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


//CURLOPT_SSL_VERIFYPEER verifica se é um
//orgão autorizado e valido com certificado
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

print_r($data["uf"]);

