<?php
header('Content-Type: application/json');

include("conexao.php");
session_start();
if (isset($_SESSION["usuario"])) {
$id = $_SESSION["usuario"];
}
$query = "SELECT mes, faturamento, valor_meta FROM faturamento_mensal WHERE id_usuario = $id ORDER BY FIELD(mes, 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez')";

$result = $mysqli->query($query);

$data = [];
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
