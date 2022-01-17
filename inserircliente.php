<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
require("conexao.php");
$postdata=file_get_contents("php://input");
$request=json_decode($postdata);
$cpf = $request-> cpf;
$nome = $request-> nome;
$rg = $request-> rg;
$telefone = $request-> telefone;
$endereco = $request-> endereco;
$nascimento = $request-> nascimento;
$numeroendereco = $request-> numero;

$sql = "insert into cliente(nome_cliente,cpf_cliente,rg_cliente,telefone,endereco,nascimento,numeroendereco) values('$nome','$cpf','$rg','$telefone','$endereco','$nascimento','$numeroendereco')";
$result = mysqli_query($conexao,$sql);

if($result){
    http_response_code(201);
    $data=["mensagem"=>"inserido com Sucesso"];
    echo json_encode($data);
}
else{
    header("HTTP/1.1500ErronoSQL");
    echo json_encode(["erro"=>"Erro ao Inserir ".$conexao->error]);
}