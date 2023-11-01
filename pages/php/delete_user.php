<?php


include("conexao.php");
if($mysqli->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Connection error']);
    exit;
}

// Get the user ID from the AJAX request
$data = json_decode(file_get_contents("php://input"), true);
$userId = $data['id'];

// Use a prepared statement to delete the user
$stmt = $mysqli->prepare("DELETE FROM clientes WHERE id = ?");
$stmt->bind_param('i', $userId);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$mysqli->close();


?>