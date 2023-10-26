<?php
include("conexao.php");





session_start();
if (isset($_SESSION["usuario"])) {
$id_usuario = $_SESSION["usuario"];

}
if(!isset($_SESSION['usuario'])) {
    header("location: index-4.php");
}

$id = $_SESSION['usuario'];
$sql = "SELECT nome FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

$nome = $row['nome'];

}

if(isset($_GET['quantidade'])){ 
$quantidade = $_GET['quantidade']; 
}else{

$quantidade = 1;

}
$sql = "SELECT * FROM carrinho WHERE id_usuario = $id_usuario";
$query = $mysqli->query($sql);

if(isset($_GET['id'])){
$id_prod = $_GET['id'];
$sql = "SELECT * FROM produto WHERE id = $id_prod";
$query = $mysqli -> query($sql);

while ($row = $query -> fetch_assoc()) {

$nome = $row["nome"];
$tipo = $row['cartegoria'];
$preco = $row['preco'];
$imagem = $row['imagem'];

}

if(isset($_GET['id'])){ 
$sql =  "INSERT INTO carrinho (imagem, produto_nome, preco, quantidade, id_usuario) VALUES ('$imagem', '$nome', '$preco', '$quantidade', '$id_usuario')";
$quer = $mysqli -> query($sql);
  header("location: cart.php");
}

}

if(isset($_POST["id_cart"])){
$id_cart = $_POST["id_cart"];
$sql = "DELETE * FROM carrinho WHERE id_cart";
}
?>

