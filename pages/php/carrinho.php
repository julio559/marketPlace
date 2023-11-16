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
$estoque = $row['stock'];
}

if(isset($_GET['id'])){ 
$sql = "INSERT INTO carrinho (imagem, produto_nome, preco, quantidade, id_usuario, id_prod, stock_prod) VALUES ('$imagem', '$nome', '$preco', '$quantidade', '$id_usuario', '$id_prod', '$estoque')";
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


$sql33 = "SELECT online FROM plataform";
$query33 = $mysqli -> query($sql33);
while ($row33 = $query33 -> fetch_assoc()) {
$on = $row33["online"];
if( $on === '1'){

    die("
    <style>
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .blocked-user-container {
        background-color: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
        max-width: 500px;
        width: 100%;
        box-sizing: border-box;
    }

    .blocked-user-container h2 {
        color: #d9534f;
        margin-bottom: 20px;
        font-size: 22px;
    }

    .blocked-user-container p {
        color: #333;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    </style>
    <div class='modal-overlay'>
        <div class='blocked-user-container'>
            <h2>Plataforma fora do ar</h2>
            <p>A plataforma esta fora do ar ainda sem previsão para voltar</p>
            <p>Por favor, entre em contato com o suporte para mais informações.</p>
        </div>
    </div>
    ");


}

}


?>