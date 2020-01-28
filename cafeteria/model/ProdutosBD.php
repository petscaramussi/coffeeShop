<?php 
include "conexao.php";
include "model/produto.php";

class ProdutosBD{
	private $conexao;
	public function inserirProduto($produto){
				$conexao = conectar();
//Executar o insert
		$sql = "INSERT INTO produtos (
		`idProduto` ,
		`nome` ,
		`categoria` ,
		`preco` ,
		`qtde` ,
		`descricao` ,
		`foto`
	)
	VALUES (
	NULL ,  '$produto->nome',  '$produto->categoria',  '$produto->preco',  '$produto->qtde',  '$produto->descricao',  '$produto->foto'
)";

return mysqli_query($conexao, $sql	);


}
	public function inserirPedido($pedido){
				$conexao = conectar();
//Executar o insert
		$sql = "INSERT INTO produtos (
		`idProduto` ,
		`nome` ,
		`qtde` ,
		`descricao` ,
	)
	VALUES (
	NULL ,  '$produto->nome',   '$produto->qtde',  '$produto->descricao',
)";

return mysqli_query($conexao, $sql	);


}

function getProduto($id){
$conexao = conectar();
$sql = "SELECT * FROM produtos WHERE idProduto=$id";
$rs = mysqli_query($conexao,$sql);
@$registro = mysqli_fetch_assoc($rs);
$produto = new Produto();
$produto->id = $registro["idProduto"];
$produto->nome = $registro["nome"];
$produto->preco = $registro["preco"];
$produto->qtde = $registro["qtde"];
$produto->foto = $registro["foto"];
$produto->categoria = $registro["categoria"];
$produto->descricao = $registro["descricao"];
return $produto;
}

public function excluirProduto($id){

$conexao = conectar();
$sql = "DELETE FROM produtos WHERE idProduto=$id";

return mysqli_query($conexao, $sql);
}
}
?>