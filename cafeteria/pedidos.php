<!doctype html>
<?php
include "conexao.php";
$conexao = conectar();

  if(isset($_GET["categoria"])){
    $categoria= $_GET["categoria"];
  }
@$sql = "SELECT * FROM produtos WHERE categoria = '$categoria' ";//Pega Os dados do my sql
$rs = mysqli_query($conexao,$sql);//busca no banco de dados a tabela produtos
$idCliente = 1;
?>

<html>
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/produtos.css">
  <meta charset="utf-8">
</head>
<body class=""> 
    <?php
  if(isset($_GET["msg"])){
    $msg= $_GET["msg"];

    echo "<div class='card-panel green cc'>
    <span class='white-text'>$msg</span>
    </div>";
  }
  ?>
 <nav>
  <div class="nav-wrapper grey darken-3">
    <a href="#" class="brand-logo center">Cafeteria Etecia</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down grey">
      <li><a href="produtos.php">Produtos</a></li>
      <li  class="active"><a href="pedidos.php">Pedidos</a></li>
      <li><a href="Clientes.php">Clientes</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <div class="col s12 m5">
    <div class="card horizontal">
      <div class="card-stacked">
          <form class="col s12" >
            <div class="card-action"> <div class="row">
              <div class="input-field col s8">
                <i class="material-icons prefix">search</i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Procurar</label>
              </div>
              <a style="color:black;" href="sair.php"><i class=" medium material-icons right">account_circle</i></a>
            </div>
              </div></form>
        </div></div>
       </div>
    
<div>
   <div class="row" style="text-align:center;font-size:10px;">
   <a href="pedidos.php?categoria=Bebida" class="waves-effect waves-light btn-large">Bebidas</a>
   <a href="pedidos.php?categoria=Salgado" class="waves-effect waves-light btn-large">Salgados</a>
   <a href="pedidos.php?categoria=Doce" class="waves-effect waves-light btn-large">Doces</a>
   <a href="pedidos.php?categoria=Combos" class="waves-effect waves-light btn-large">Combos</a>
  </div>
      <div class="row">
   <?php while ($produto = mysqli_fetch_assoc($rs)) {
           ?>
    <div class="col s2 m2">
      <div class="card">
        <div class="card-image"><?php $produto['nome']; ?>
         <img class="foto activator" src="<?php echo $produto['foto']?>">
          <a href="pedidos-inserir.php?idCliente=<?php echo $idCliente?>&&nome=<?php echo $produto['nome'];?>&&categoria=<?php echo $categoria?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content"><span class="card-title activator grey-text text-darken-4"><?php echo $produto["nome"]?> R$<?php echo $produto["preco"]?><i class="material-icons right">more_vert</i></span>
        </div>
         <div class="card-reveal">
      <span  class="card-title grey-text text-darken-4">Descrição<i class="material-icons right">close</i></span>
      <p><?php echo $produto["descricao"]?></p>
    </div>
      </div>
    </div>
 <?php }  ?>
</div>
    </div>
    </div>
    
 <!-- Modal Trigger -->
  <a style="margin-left:80%" class="btn-floating green waves-effect btn-large btn modal-trigger" href="#modal-finalizar"><i class="material-icons">add_shopping_cart</i></a>
  <!-- Modal Structure -->
  <div id="modal-finalizar" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Pedidos Realizados</h4>
    <?php
        $valortotal = 0;
       @$sql = "SELECT pr.*,pe.*
        FROM produtos pr INNER JOIN pedidos pe
        ON pr.idProduto = pe.idProduto;";
        $rs = mysqli_query($conexao,$sql);

        while ($pedido = mysqli_fetch_assoc($rs)) {
           ?>
        <div class="row">
        <form class="s5">
           <tr>
            <td><img class="foto" src="<?php echo $pedido['foto']?>"></td>
            <td> <?php echo $pedido['nome'] ?></td><br><br>
            <td>Preço: R$<?php echo $pedido['preco'] ?></td>
            <td>Quantidade:<?php echo $pedido['qtde'] ?></td>
              <td><a class="waves-effect waves-light btn  red accent-4" href="pedidos-deletar.php?idProduto=<?php  echo $pedido['idProduto']?>&&categoria=<?php echo $categoria?>">
                <i class="material-icons">delete_forever</i></a>
                 <a class="waves-effect waves-light btn" href="#modal-edit"">
              <i class="material-icons">edit</i></a>
              </td><?php $valortotal += $pedido['preco']*$pedido['qtde'] ?>
            </tr>
        </form>
       </div>
        <?php }  ?> 
       <p style="text-align:center;">Total: R$<?php echo $valortotal?></p>    
   
    </div>
   <div class="modal-footer">
        <button class="waves-effect waves-light btn green"><i class="material-icons right">check</i>Finalizar</button>
        <a class="modal-close modal-action waves-effect waves-light btn red "><i class="material-icons right">clear</i>Cancelar</a>
      </div>
    </div>
    
    </body>
</html>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
  var options = {};
  var instances = M.Modal.init(elems, options);

<?php $msg = $_GET["msg"];
 if($msg == "Deletado com Sucesso") : ?>
  var elem = document.querySelector('.modal');
  var instance = M.Modal.getInstance(elem);
  instance.open();
<?php endif ?>
  var elem = document.querySelector("#modal-edit");
  var instance = M.Modal.getInstance(elem);
  });
</script>
<style>
  .cc{
      margin:0;
      text-align: center;
      font-weight:300;
      font-size:25px;
  }

</style>