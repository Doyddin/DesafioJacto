<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
require("conexao.php");
date_default_timezone_set('America/Sao_Paulo');

$postdata=file_get_contents("php://input");
$request=json_decode($postdata);
$cpf=$request->cpf;
$filme=$request->filme;
$nome_cliente=$request->nome_cliente;
$nome_filme=$request->nome_filme;

$dt = new DateTime();
$date= $dt->format('Y-m-d H:i:s');

$sql = "insert into compras(nome_cliente,cpf,id_filme,nome_filme,quando) values ('$nome_cliente','$cpf','$filme','$nome_filme','$date')";
$result=mysqli_query($conexao,$sql);

if($result){
    http_response_code(201);
    $data=["mensagem"=>"inserido com Sucesso"];
    echo json_encode($data);
}
else{
    header("HTTP/1.1500ErronoSQL");
    echo json_encode(["erro"=>"Erro ao Inserir ".$conexao->error]);
}
