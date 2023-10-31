<?php
include("conexao.php");

$response = array('status' => 'disponivel');

if (isset($_GET['nome']) && isset($_GET['email'])) {
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    
    $stmt = $mysqli->prepare("SELECT email, nome FROM clientes WHERE email = ? AND nome = ?");
    $stmt->bind_param("ss", $email, $nome);
    
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $response['status'] = 'indisponivel';
    }
    $stmt->close();
}
echo json_encode($response);


?>
