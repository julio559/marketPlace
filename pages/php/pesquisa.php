<?php
// Conexão ao banco de dados
include("conexao.php");
if ($mysqli->connect_error) {
    die('Erro de conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$pesquisa = $_POST['pesquisa'];

$sql = "SELECT * FROM clientes WHERE nome LIKE ? OR email LIKE ? OR numero LIKE ? OR cpf LIKE ?";
$stmt = $mysqli->prepare($sql);
$searchValue = "%".$pesquisa."%";
$stmt->bind_param('ssss', $searchValue, $searchValue, $searchValue, $searchValue);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
    echo "<td>" . htmlspecialchars($row['numero']) . "</td>";
    echo "<td>" . htmlspecialchars($row['cpf']) . "</td>";
    echo "</tr>";
}

$stmt->close();
$mysqli->close();
?>
