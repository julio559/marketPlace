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
$estoque = $row["stock"];
}

if(isset($_GET['id'])){ 
$sql = "INSERT INTO carrinho (imagem, produto_nome, preco, quantidade, id_usuario, id_prod) VALUES ('$imagem', '$nome', '$preco', '$quantidade', '$id_usuario', '$id_prod')";
$quer = $mysqli -> query($sql);
  header("location: cart.php");
}

}
// DELETE logic
if(isset($_POST["id_cart"])){
  $id_cart = $_POST["id_cart"];
  
  // Usando prepared statement
  $stmt = $mysqli->prepare("DELETE FROM carrinho WHERE id_cart = ?");
  $stmt->bind_param("i", $id_cart);  // "i" significa que estamos vinculando uma variável do tipo inteiro
  
  if ($stmt->execute()) {
      echo json_encode(['success' => true]);
  } else {
      echo json_encode(['success' => false]);
  }

  header("location: cart.php");
  exit;
}

// UPDATE logic
if(isset($_POST['product_id']) && isset($_POST['numero'])) {
  $id_cart = $_POST['product_id'];
  $numero = $_POST['numero'];

  // Usando prepared statement
  $stmt = $mysqli->prepare("UPDATE carrinho SET quantidade = ? WHERE id = ?");
  $stmt->bind_param("ii", $numero, $id_cart);

  if ($stmt->execute()) {
      header("location: cart.php");
      exit;
  } else {
      die("Erro ao atualizar a quantidade.");
  }
}




?>