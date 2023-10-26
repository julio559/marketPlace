<?php
// Conectar ao banco de dados
// Suponho que você já tenha um arquivo de conexão. Portanto, incluí-lo aqui:
include("conexao.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT id, data, status, total, id_prod FROM ordemcompra WHERE id_cliente = $id";
$result = $mysqli->query($sql);
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nota Fiscal</title>
  <style> 
  
  body {
    font-family: 'Helvetica', sans-serif;
    margin: 20px 40px;
    padding: 0;
    background-color: #fff;
    color: #333;
}

header {
    border-bottom: 2px solid #666;
    margin-bottom: 30px;
    text-align: center;
}

h1 {
    color: #444;
    margin: 0;
    font-size: 2.2em;
}

header p {
    margin: 5px 0;
    font-size: 0.9em;
}

h2 {
    font-size: 1.5em;
    margin-top: 30px;
    margin-bottom: 15px;
}

table {
    width: 100%;
    margin-top: 20px;
    margin-bottom: 50px;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #999;
}

th, td {
    padding: 12px 15px;
    text-align: left;
}

th {
    background-color: #eee;
    color: #555;
    font-weight: 600;
}

tr:nth-child(even) {
    background-color: #f8f8f8;
}

tr:hover {
    background-color: #e7eff5;
}

footer {
    margin-top: 50px;
    border-top: 1px solid #999;
    padding-top: 20px;
    font-size: 0.85em;
}

  
  </style>
</head>
<body>
    <header>
        <h1>Nome da Empresa</h1>
        <p>Rua da Empresa, Número - Bairro</p>
        <p>Cidade - Estado, CEP: 00000-000</p>
        <p>CNPJ: 00.000.000/0000-00</p>
    </header>

    <h2>Nota Fiscal</h2>
    <p>Cliente ID: <?php echo $id; ?></p>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Data</th>";
        echo "<th>Status</th>";
        echo "<th>Total</th>";
        echo "<th>ID Produto</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['data'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>R$ " . $row['total'] . "</td>";
            echo "<td>" . $row['id_prod'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
    ?>

    <footer>
        Obrigado por comprar conosco! Para qualquer assistência, entre em contato conosco pelo telefone (00) 0000-0000.
    </footer>
</body>
</html>
