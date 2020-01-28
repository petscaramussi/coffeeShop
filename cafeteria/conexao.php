<?php
//Conectar ao BD
function conectar(){
$server = "localhost";
$user = "root";
$pass = "etecia";
$db = "cafeteria"; 
$conexao = mysqli_connect($server,$user,$pass,$db) or die(mysqli_error());
	return $conexao;
}
?>