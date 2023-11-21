<?php
include '../../pages/php/conexao.php';

$response = array('email_status' => 'disponivel');

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    
    $stmt = $mysqli->prepare("SELECT email FROM clientes WHERE email = ?");
    $stmt->bind_param("s", $email);
    
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $response['email_status'] = 'indisponivel';
    }
    $stmt->close();
}
echo json_encode($response);

?>
