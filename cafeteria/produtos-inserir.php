<?php
include "model/ProdutosBD.php";

$arquivo = "fotos/".basename($_FILES["foto"]["name"]);

$produto = new Produto();

$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->qtde = $_POST["qtde"];
$produto->categoria = $_POST["categoria"];
$produto->descricao = $_POST["descricao"];
$produto->foto = $arquivo;

move_uploaded_file($_FILES["foto"]["tmp_name"],
				 $arquivo);

$ProdutosBD = new ProdutosBD();
$resposta = $ProdutosBD->inserirProduto($produto);

if($resposta ==true){
   $msg = "Produto inserido com Sucesso";
   $tipo = "sucesso";
}
else{
   $msg = "Erro ao inserir o Produto";
   $tipo = "erro";
}
header("Location: produtos.php?msg=$msg&tipo=$tipo");
?>