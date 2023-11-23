<?php
session_start();
include("conexao.php");

$response = array("success" => false, "subtotal" => 0, "num_items" => 0);

if (isset($_POST['product_id'], $_POST['quantity']) && isset($_SESSION['usuario'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['usuario'];

    // Atualiza a quantidade do produto no carrinho
    $update_sql = "UPDATE carrinho SET quantidade = ? WHERE id_prod = ? AND id_usuario = ?";
    $update_stmt = $mysqli->prepare($update_sql);
    $update_stmt->bind_param("iii", $quantity, $product_id, $user_id);
    $update_stmt->execute();
    $update_stmt->close();
    // Calcula o subtotal
    $subtotal_sql = "SELECT SUM(preco * quantidade) FROM carrinho WHERE id_usuario = ?";
    $subtotal_stmt = $mysqli->prepare($subtotal_sql);
    $subtotal_stmt->bind_param("i", $user_id);
    $subtotal_stmt->execute();
    
    // Bind the result
    $subtotal_stmt->bind_result($subtotal);
    $subtotal_stmt->fetch();
    $subtotal_stmt->close();

    // Recupera o número total de itens no carrinho
    $num_items_sql = "SELECT COUNT(*) FROM carrinho WHERE id_usuario = ?";
    $num_items_stmt = $mysqli->prepare($num_items_sql);
    $num_items_stmt->bind_param("i", $user_id);
    $num_items_stmt->execute();

    // Bind the result
    $num_items_stmt->bind_result($num_items);
    $num_items_stmt->fetch();
    $num_items_stmt->close();

    // Se subtotal for null (o que significa que não há produtos), definimos como zero
    $subtotal = $subtotal ?: 0;
    $num_items = $num_items ?: 0;

    // Atualiza a resposta com as informações do subtotal e do número de itens
    $response["success"] = true;
    $response["subtotal"] = number_format($subtotal, 2, ',', '.');
    $response["num_items"] = $num_items;
}
if ($update_stmt === FALSE) {
    die("Erro na consulta SQL: " . $mysqli->error);
}

echo json_encode($response);
?>
