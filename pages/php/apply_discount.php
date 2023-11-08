<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Presumindo que você esteja enviando itemId também
    $itemId = isset($_POST['itemId']) ? intval($_POST['itemId']) : 0;
    $newTotal = isset($_POST['newTotal']) ? (float)$_POST['newTotal'] : 0;
    $couponId = isset($_POST['couponId']) ? intval($_POST['couponId']) : 0;

    // Verifique se existe uma sessão para totais de itens e se não, crie uma
    if (!isset($_SESSION['item_totals'])) {
        $_SESSION['item_totals'] = array();
    }

    // Atualize o total do item específico na sessão
    $_SESSION['item_totals'][$itemId] = $newTotal;

    // Opcionalmente, registre o uso do cupom no banco de dados
    // $mysqli->query("UPDATE ... SET ... WHERE couponId = $couponId");

    // Retorne o novo total ou outra resposta se necessário
    // Note que aqui estamos retornando apenas o total do item atualizado
    echo number_format($newTotal, 2, ',', '.');
}
?>