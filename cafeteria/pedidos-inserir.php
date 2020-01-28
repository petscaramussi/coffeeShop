<?php
include "conexao.php";
$conexao = conectar();

    $nome= $_GET["nome"];
    $categoria= $_GET["categoria"];
    $idCliente= $_GET["idCliente"];
  
 	
$sql_code = mysqli_query($conexao,"SELECT idProduto FROM produtos WHERE nome = '$nome'");
$dado = mysqli_fetch_array($sql_code);
$idProduto = $dado['idProduto'];

$sql_code = mysqli_query($conexao,"SELECT qtde FROM pedidos WHERE idProduto = '$idProduto' and idCliente = '$idCliente'");

$total = mysqli_num_rows($sql_code);

$qtde = 1;

//echo $total;


    if($total == 0) {
	$sql_code = "INSERT INTO pedidos (idProduto,idCliente,qtde) VALUES ('$idProduto','$idCliente','$qtde')";
    $busca = mysqli_query($conexao,$sql_code);
   header("location:pedidos.php?categoria=$categoria&&msg=Novo Item Cadastrado");
     
    }

else{  
$busca = mysqli_query($conexao,"SELECT qtde FROM pedidos WHERE idCliente = '$idCliente' and idProduto = '$idProduto' ");
$dado = mysqli_fetch_array($busca);
$qtde = $dado['qtde']; 
$qtde = $qtde+1;
    
$sql_code =  "UPDATE pedidos SET qtde = '$qtde' WHERE idProduto = '$idProduto' and 
idCliente = '$idCliente'";
$busca = mysqli_query($conexao,$sql_code);  
header("location:pedidos.php?categoria=$categoria&&msg=Quantidade Adicionada");
}
?>