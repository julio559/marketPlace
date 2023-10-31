<?php

include("php/conexao.php");
$access_token = "APP_USR-3786249808377944-102717-0761542ae1dd7c1769ec74fa4d8462da-1098015242";


// Declaração da variável
$payment_process = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $transactionAmount = $_POST["transactionAmount"];
    $paymentMethodId = $_POST["paymentMethodId"]; // Supondo que você também envie isso

    $data = array(
        "token" => $token,
        "transaction_amount" => $transactionAmount,
        "payment_method_id" => $paymentMethodId,
        // Adicione outros dados conforme necessário
    );

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\nAuthorization: Bearer $access_token",
            'method'  => 'POST',
            'content' => json_encode($data),
        ),
    );

    $context = stream_context_create($options);
    $result = @file_get_contents('https://api.mercadopago.com/v1/payments', false, $context);

    // Tratamento de erro: falha na chamada à API
    if ($result === FALSE) {
        echo "Erro ao comunicar com o Mercado Pago.";
        exit; // Encerra a execução do script
    }

    $response = json_decode($result, true);

    // Verifica se a resposta contém o campo 'status'
    if (!isset($response["status"])) {
        echo "Resposta inesperada do Mercado Pago.";
        exit; // Encerra a execução do script
    }

    // Atribuindo o status da transação à variável
    $payment_process = $response["status"];

    if ($payment_process == "approved") {
        echo "Pagamento aprovado!";
    } else {
        echo "Erro no pagamento: " . $response["message"];
    }
}

$payment_status = "completa";

$stmt = $mysqli->prepare("UPDATE ordemcompra SET status = ? WHERE id = ?");
$stmt->bind_param("si", $payment_status, $id_transacao);

// Tratamento de erro: falha ao atualizar o banco de dados
if (!$stmt->execute()) {
    echo "Erro ao atualizar status: " . $stmt->error;
    exit; // Encerra a execução do script
}
$stmt->close();

?>
