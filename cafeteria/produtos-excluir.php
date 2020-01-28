<?php 

include "model/ProdutosBD.php";


$ProdutosBD = new ProdutosBD();

$resposta = $ProdutosBD->excluirProduto($_GET["id"]);



if($resposta ==true){
   $msg = "Produto excluido com Sucesso";
   $tipo = "sucesso";
}
else{
   $msg = "Erro ao excluir o Produto";
   $tipo = "erro";
}

header("Location: produtos.php?msg=$msg&tipo=$tipo");
?>