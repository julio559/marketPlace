
<?php
// Conexão ao banco de dados
include("php/conexao.php");
if ($mysqli->connect_error) {
    die('Erro de conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$pesquisa = $_POST['pesquisa'];

// Atualize a consulta para incluir a pesquisa por ID, se necessário.
$sql = "SELECT * FROM produto WHERE nome LIKE ? OR cartegoria LIKE ? OR id LIKE ?";
$stmt = $mysqli->prepare($sql);
$searchValue = "%".$pesquisa."%";
$stmt->bind_param('sss', $searchValue, $searchValue, $searchValue);  // Apenas três 's' aqui
$stmt->execute();
$result = $stmt->get_result();

$output = [];  // Use um array para coletar os resultados



    while ($row = $result->fetch_assoc()){
        $id23 = $row["id"];
        $tipeClass = ($row["tipe"] == "1") ? 'highlighted' : '';  // Se tipe for 1, adicione a classe 'highlighted'
    
        echo "<tr id='row-$id23' class='$tipeClass'>";  // Adiciona a classe 'highlighted' à tag <tr> se necessário
        echo "<td>" . htmlspecialchars($row['id']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";      // Supondo que sua coluna se chame 'nome'
        echo "<td>" . htmlspecialchars($row['cartegoria']) . "</td>";     // Supondo que sua coluna se chame 'email'
        echo "<td>" . htmlspecialchars($row['preco']) . "</td>";  // Supondo que sua coluna se chame 'telefone'
        echo "<td>" . htmlspecialchars($row['stock']) . "</td>";  
        echo '<td>';
        echo '<div class="icon-actions">';
        if ($row["tipe"] == "1") {
            echo "<img src='https://cdn-icons-png.flaticon.com/512/158/158599.png' alt='Desbloquear' onclick='unlockFunction($id23)' />";
        }else{ 
        echo "<img src='https://cdn-icons-png.flaticon.com/512/107/107755.png' alt='Deletar' onclick='deleteFunction($id23)' />";
        }
        echo "<img src='https://cdn-icons-png.flaticon.com/512/700/700291.png' alt='Editar' onclick='editFunction($id23)' />";
    
        echo '</div>';
        echo '</td>';     // Supondo que sua coluna se chame 'cpf'
        echo "</tr>";
    
    
}

// Agora, você pode retornar este array como JSON
echo json_encode($output);

$stmt->close();
$mysqli->close();
?>

