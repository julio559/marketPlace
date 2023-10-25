<?php
include("conexao.php");  // Seu arquivo de conexão

$response = array();

if(isset($_POST["id_cart"])){
    $id_cart = $_POST["id_cart"];
    $sql = "DELETE FROM carrinho WHERE id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id_cart);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        $response['status'] = "success";
    } else {
        $response['status'] = "error";
    }

    $stmt->close();

    echo json_encode($response);
    exit;  // Finaliza a execução aqui
}
?>
