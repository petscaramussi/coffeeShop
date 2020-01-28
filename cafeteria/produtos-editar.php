<?php
include "model/ProdutosBD.php";
$id = $_GET["id"];
$produtosBD = new ProdutosBD();
$produto = new Produto();
$produto = $produtosBD->getProduto($id);

@header("Location:produtos.php?id=$produto->id&nome=$produto->nome&preco=$produto->preco&qtde=$produto->qtde&categoria=$produto->categoria&descricao=$produto->descricao");


$sql_code =  "UPDATE produtos SET qtde = '$produto->qtde',nome='$produto->nome',preco='$produto->preco',descricao='$produto->descricao' WHERE idProduto = '$id' and 
idCliente = '$idCliente'";

?>