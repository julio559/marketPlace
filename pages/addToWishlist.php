<?php

header('Content-Type: application/json');
session_start();
include("php/conexao.php");

$response = array("success" => false, "liked" => false);

if (isset($_POST['product_id']) && isset($_SESSION['usuario'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['usuario'];

    // Verificar se já está na lista de desejos
    $check_sql = "SELECT COUNT(*) FROM wish WHERE id_prod = ? AND id_usuario = ?";
    $check_stmt = $mysqli->prepare($check_sql);
    $check_stmt->bind_param("ii", $product_id, $user_id);
    $check_stmt->execute();

    // Bind the result to a variable
    $check_stmt->bind_result($count);
    $check_stmt->fetch();

    if ($count > 0) {
        // Se já está na lista, vamos removê-lo
        $sql = "DELETE FROM wish WHERE id_usuario = ? AND id_prod = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        if ($stmt->execute()) {
            $response["success"] = true;
            $response["liked"] = false; // Since it's removed, set liked to false.
        }
    } else {
        // Se não está na lista, vamos adicioná-lo
        $sql = "INSERT INTO wish (id_usuario, id_prod) VALUES (?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        if ($stmt->execute()) {
            $response["success"] = true;
            $response["liked"] = true;
        }
    }

    // Don't forget to close the statement.
    $check_stmt->close();
    if (isset($stmt)) {
        $stmt->close();
    }
}
error_log(print_r($response, true));
echo json_encode($response);
?>
