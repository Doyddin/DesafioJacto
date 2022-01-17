<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
require("conexao.php");
$postdata=file_get_contents("php://input");
$request=json_decode($postdata);
$genero = $request->genero;
if($genero != "Ação" and $genero != "Comédia" and $genero != "Aventura"){
    $sql = "SELECT id_filme,nome, precoaluguel as 'Preco de Aluguel', precocompra as 'Preco de Compra', genero, datalance as 'Data de Lancamento' from filmes;";
}else{
    $sql = "SELECT id_filme,nome, precoaluguel as 'Preco de Aluguel', precocompra as 'Preco de Compra', genero, datalance as 'Data de Lancamento' from filmes where genero = '$genero';";
}
$result=mysqli_query($conexao,$sql);

if($result){
    $row = $result-> fetch_all(MYSQLI_ASSOC);
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
}
else{
    header("HTTP/1.1500 Erro no SQL");
    echo json_encode(["erro"=>"Erro SQL: ".$conexao->error]);
}
