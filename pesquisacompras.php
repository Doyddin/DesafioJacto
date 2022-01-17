<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
require("conexao.php");

$postdata=file_get_contents("php://input");
$request=json_decode($postdata);
$cpf = $request->cpf;

$sql="select id_compra,nome_cliente as 'Cliente', cpf, nome_filme 'Filme', quando as 'Quando' from compras where compras.cpf = '$cpf';";
$result= mysqli_query($conexao,$sql);

if($result){
    $row = $result-> fetch_all(MYSQLI_ASSOC);
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
}
else{
    header("HTTP/1.1500 Erro no SQL");
    echo json_encode(["erro"=>"Erro SQL: ".$conexao->error]);
}