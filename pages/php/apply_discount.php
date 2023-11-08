<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newTotal = isset($_POST['newTotal']) ? (float)$_POST['newTotal'] : 0;
    $couponId = isset($_POST['couponId']) ? intval($_POST['couponId']) : 0;

    // Update the total in the session
    $_SESSION['total'] = $newTotal;

    // Optionally, record the use of the coupon in the database
    // $mysqli->query("UPDATE ... SET ... WHERE couponId = $couponId");

    // Return the new total or another response if needed
    echo number_format($_SESSION['total'], 2, ',', '.');
}
?>
