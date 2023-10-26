<?php
$access_token = "YOUR_ACCESS_TOKEN";

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
    $result = file_get_contents('https://api.mercadopago.com/v1/payments', false, $context);
    
    if ($result === FALSE) {
        // Tratar erro
    }
    
    $response = json_decode($result, true);
    if(isset($response["status"]) && $response["status"] == "approved") {
        echo "Pagamento aprovado!";
    } else {
        echo "Erro no pagamento: " . $response["message"];
    }
}
?>