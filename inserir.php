<?php
include("conexao.php");
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $postdata=file_get_contents("php://input");
    $request=json_decode($postdata);
    $nome=$request->nome;
    $precoaluguel=$request->precoaluguel;
    $precovenda=$request->precovenda;
    $genero = $request->genero;
    $datalance= $request->datalance;


    $sql="insert into filmes(nome,precoaluguel,precocompra,genero,datalance) values ('$nome', '$precoaluguel','$precovenda','$genero','$datalance');";
    $status=mysqli_query($conexao,$sql);
    
    if($status){
    http_response_code(201);
    $data=["mensagem"=>"inserido com Sucesso"];
    echo json_encode($data);
    }
    else{
    header("HTTP/1.1500ErronoSQL");
    echo json_encode(["erro"=>"Erro ao Inserir ".$conexao->error]);
    }
}