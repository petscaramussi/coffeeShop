<?php 

include "conexao.php";
$conexao = conectar();
$categoria = $_GET["categoria"];

$idProduto = $_GET["idProduto"];
$sql_code = mysqli_query($conexao,"DELETE FROM pedidos  WHERE idProduto='$idProduto'");


header("location:pedidos.php?msg=Deletado com Sucesso&&categoria=$categoria");
?>