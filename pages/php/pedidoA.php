<?php
include("conexao.php");
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: ../../argon-dashboard-master/pages/sign-in.php");
    exit;
}

$id_usuario = $_SESSION['usuario'];
$pesquisa = $_POST['pesquisa'] ?? '';

if ($pesquisa === '') {
    $sql = "SELECT * FROM refound WHERE id_usuario = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $id_usuario);
} else {
    $sql = "SELECT * FROM refound WHERE ( id_ordem LIKE ?) AND id_usuario = ?";
    $searchValue = "%" . $pesquisa . "%";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $searchValue, $id_usuario);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $motivo = $row['motivo'];
        $ordem = $row['id_ordem'];
        $response = $row['response'];
    
        echo "<div class='complaint-card'>";
        echo "<div class='status-indicator'>";
        echo "<span class='status-dot' style='background-color: " . ($response == '1' ? '#34c38f;' : 'red;') . "'></span>";
        echo "<span class='status-text'>" . ($response == '1' ? 'Solicitação já respondida' : 'Não atendida') . "</span>";
        echo "</div>";
        echo "<h5>Ordem de compra: " . htmlspecialchars($ordem) . "</h5>";
        echo "<p>" . htmlspecialchars($motivo) . "</p>";
        echo "<button class='btn-view-complaint'>Abrir chat com vendedor</button>";
        echo "</div>"; // Fim do complaint-card
    }
    
} else {
    echo "<div class='text-center'><p>Não foram encontradas ordens de compra.</p></div>";
}

$stmt->close();
$mysqli->close();
?>
