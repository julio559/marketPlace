<?php
include("conexao.php");


if (!isset($_SESSION)) {
    session_start();
}


$id = $_SESSION['usuario'];
$sql = "SELECT tipe FROM clientes WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
while ($row = $result->fetch_assoc()) {
$tipe = $row['tipe'];
if($tipe !== '1') {
header("location: index-4.php");

}
}

if (!isset($_SESSION['usuario'])) {
    header("location: ../../argon-dashboard-master/pages/sign-in.php");
}
// Garanta que $_SESSION['usuario'] esteja definido
if (isset($_SESSION['usuario'])) {
    $userId = $_SESSION['usuario'];

    // Prepare a consulta
    $stmt = $mysqli->prepare("SELECT COUNT(*) as item_count FROM carrinho WHERE id_usuario = ?");
    $stmt->bind_param("i", $userId);  // "i" indica que estamos passando um valor inteiro

    // Execute a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Pegue o resultado
    if ($row = $result->fetch_assoc()) {
        $itemCount = $row['item_count'];
    } else {
        $itemCount = 0; // ou algum valor padrão se algo der errado
    }

    $stmt->close();
} else {
    $itemCount = 0;  // ou algum valor padrão se $_SESSION['usuario'] não estiver definido
}
if (isset($_SESSION['usuario'])) {
$id = $_SESSION['usuario'];

$sql = "SELECT nome, tipe FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

$nome = $row['nome'];

if( $row['tipe'] !== '1') {
    header("location: php/index-4.php");
}
}

}





?>