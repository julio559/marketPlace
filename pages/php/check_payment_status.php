<?php
include("conexao.php");

// Certifique-se de que o ID da ordem foi passado
if (!isset($_GET['id_order'])) {
    echo json_encode(['error' => 'No order ID provided']);
    exit;
}

$id_order = $_GET['id_order'];

// Aqui você consultaria seu banco de dados para obter o ID do pagamento associado a essa ordem
// Por exemplo: SELECT payment_id FROM ordemcompra WHERE id = $id_order
// Suponhamos que você já tenha o payment_id

$payment_id = '...'; // O ID do pagamento recebido na resposta inicial da criação do PIX

$apiUrl = "https://api.mercadopago.com/v1/payments/$payment_id";
$accessToken = 'SEU_ACCESS_TOKEN'; // Substitua pelo seu access token

// Iniciar cURL
$ch = curl_init($apiUrl);

// Configurar cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $accessToken
]);

// Executar chamada e obter resposta
$response = curl_exec($ch);
$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($response === false) {
    die('Erro na chamada da API: ' . curl_error($ch));
}

curl_close($ch);

// Decodificar resposta
$data = json_decode($response, true);

if ($httpStatusCode == 200 || $httpStatusCode == 201) {
    // Você pode querer atualizar o status na sua base de dados aqui
    // Por exemplo: UPDATE ordemcompra SET status = 'paid' WHERE id = $id_order

    // Retornar o status para o frontend
    echo json_encode(['status' => $data['status']]);
} else {
    // Houve um problema na chamada da API
    echo json_encode(['error' => 'API call failed', 'details' => $data]);
}
?>