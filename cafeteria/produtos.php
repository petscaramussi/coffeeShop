<!doctype html>
<?php
include "conexao.php";
$conexao = conectar();
$sql = "SELECT * FROM produtos";//Pega Os dados do my sql
$rs = mysqli_query($conexao,$sql);//busca no banco de dados a tabela produtos
$categoria = 0;
$action = "produtos-inserir.php";

if(isset ($_GET["id"])){
$nome = $_GET["nome"];
$preco = $_GET["preco"];
$categoria = $_GET["categoria"];
$qtde = $_GET["qtde"];
$descricao = $_GET["descricao"];
$action = "produtos-editar.php";
}
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
 <nav>
  <div class="nav-wrapper grey darken-3">
    <a href="#" class="brand-logo center">Cafeteria Etecia</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down grey">
      <li class="active"><a href="produtos.php">Produtos</a></li>
      <li><a href="pedidos.php">Pedidos</a></li>
      <li><a href="Clientes.php">Clientes</a></li>
    </ul>
  </div>
</nav>
<div class="container">

  <?php
  if(isset($_GET["msg"])){
    $msg= $_GET["msg"];
      
    if($_GET["tipo"]=="erro")
      $cor = "red";

    if($_GET["tipo"]=="sucesso")
      $cor = "teal";


    echo "<div class='card-panel $cor'>
    <span class='white-text'>$msg</span>
    </div>";
  }
  ?>
  <div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-stacked">
        <div class="card-content">

          <form class="col s12" >
            <div class="row">
              <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Procurar</label>
              </div>
            </div>
            <div class="card-action">
             <a class="waves-effect waves-light btn grey darken-3 modal-trigger" href="#modal-add"><i class="material-icons left">add</i>Novo Produto</a>
           </div>
         </div>
       </div>
     </div>
     <table class="highlight responsive-table">
       <thead>
        <tr>
         <th>Foto</th>
         <th>ID</th>
         <th>Nome</th>
         <th>Preço</th>
         <th>Quantidade</th>
         <th>Categoria</th>
         <th></th>
       </tr>
       <tbody>
         <?php while ($produto = mysqli_fetch_assoc($rs)) {

           ?>
           <tr>
            <td><img class="foto" src="<?php echo $produto['foto']?>"></td>
            <td><?php echo $produto["idProduto"]?></td>
            <td><?php echo $produto["nome"]?></td>
            <td>R$ <?php echo $produto["preco"]?></td>
            <td><?php echo $produto["qtde"]?></td>
            <td><?php echo $produto["categoria"]?></td>
            <td>
             <a class="waves-effect waves-light btn" href="produtos-editar.php?id=<?php echo $produto["idProduto"]?>">
              <i class="material-icons">edit</i></a>

              <a class="waves-effect waves-light btn  red accent-4" method="GET" href="produtos-excluir.php?id=<? echo $produto['idProduto']?>">
                <i class="material-icons">delete_forever</i></a>
              </td>
            </tr>
            <?php }  ?>
         </tbody>
        </thead>
      </form>
    </table>	
  </div>
  
  <div id="modal-add" class="modal modal-fixed-footer">
    <form class="col s12" method="POST" action="<?php echo $action?>" enctype="multipart/form-data" id="form">
      <div class="modal-content">
        <h4>Adicionar Produto</h4>
        <div class="row">
          <div class="row">
            <div class="input-field col s6">
              <input value="<?php echo $nome?>" required="on" name="nome"  id="nome" type="text" class="validate">
              <label for="nome">Nome Produto</label>
            </div>
            <div class="input-field col s5">
              <input value="<?php echo $preco?>" required="on" name="preco" id="preco" type="text" class="validate" pattern="^\d{1,}[,.]?\d{0,2}?" title="Digite um preço no formato 999,00">
              <label for="preco">Preço</label>
            </div>
          </div> 

          <div class="row">
            <div class="input-field col s6">
              <input value="<?php echo $qtde?>" required="on" name="qtde" id="qtde" type="text" class="validate" pattern="^\d{1,}" title="Digite um numero inteiro">
              <label for="qtde">Quantidade</label>
            </div>

            <div  class="input-field col s6">
              <select name="categoria">
                <option  disabled selected>Escolha uma Categoria</option>

                <option <?php echo($categoria =="Bebida")?"selected":"" ?> >Bebida</option>

                <option <?php echo($categoria =="Salgado")?"selected":"" ?> >Salgado</option>


                <option <?php echo($categoria =="Doce")?"selected":"" ?> >Doce</option>

                <option <?php echo($categoria =="Combos")?"selected":"" ?> >Combos</option>
              </select>
              <label>Categoria</label>
            </div>
          </div>


          <div class="row">

            <div class="input-field col s6">
              <textarea  name="descricao" id="descricao" class="materialize-textarea"><?php echo $descricao?></textarea>
              <label for="descricao">Descrição </label>
            </div>

            <div class="file-field input-field col s6">
              <div class="btn">
                <span>Foto</span>
                <input type="file" name="foto">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="waves-effect waves-light btn green"><i class="material-icons right">check</i>Confirmar</button>
        <a class="modal-close waves-effect waves-light btn red "><i class="material-icons right">clear</i>Cancelar</a>
      </div>
    </form>
  </div>
</body>
<script type="text/javascript"> 
 document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
  var options = {onOpenStart:function(){

    <?php if(!isset($_GET["id"])):?>
    var form = document.querySelector("#form");
        form.nome.value = "";
        form.qtde.value = "";
        form.preco.value = "";
        form.categoria.value = "";
        form.descricao.value = "";
        <?php endif ?>
          }
  };
  var instances = M.Modal.init(elems, options);

<?php if(isset($_GET["id"])) : ?>
  var elem = document.querySelector("#modal-add");
  var instance = M.Modal.getInstance(elem);
  instance.open();
<?php endif ?>

  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, options);
});
    
</script>
</html>