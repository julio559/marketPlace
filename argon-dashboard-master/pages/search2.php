<?php
// Inclui o arquivo de conexão com o banco de dados
include '../../pages/php/conexao.php';
session_start();
// Verifica se a variável 'nome' foi enviada
if (isset($_GET['nome'])) {
    // Recebe o valor enviado pelo AJAX
    $nome = $_GET['nome'];
$id = $_SESSION['usuario'];
    // Prepara uma consulta SQL para buscar usuários com um nome que contém o valor recebido
    // Importante: Isso é uma forma básica e não segura. Em um ambiente de produção, você deve usar declarações preparadas para evitar injeções SQL
    $sql = "SELECT * FROM produto WHERE nome LIKE '%$nome%' and id_vendedor = $id";

    // Executa a consulta
    $query2 = $mysqli->query($sql);

    // Itera sobre os resultados e imprime as linhas da tabela
    while ($row2 = $query2->fetch_array()) {
        $tipe = ($row2['tipe'] == '1') ? "Ativo" : "Desativado";
    
        echo "<tr>
                <td>
                    <div class='d-flex px-2'>
                        <div>
                            <img src='../../pages/uploads/" . $row2['imagem'] . "' class='avatar avatar-sm rounded-circle me-2' alt='produto'>
                        </div>
                        <div class='my-auto'>
                            <h6 class='mb-0 text-sm'>" . $row2['nome'] . "</h6>
                        </div>
                    </div>
                </td>
                <td>
                    <p class='text-sm font-weight-bold mb-0'>" . $tipe . "</p>
                </td>
                <td>
                    <span class='text-xs font-weight-bold'>R$: " . $row2['preco'] . "</span>
                </td>
                <td class='align-middle text-center'>
                    <span class='text-xs font-weight-bold'>" . $row2['stock'] . "</span>
                </td>
                <td class='align-middle text-center'>
                    <span class='text-xs font-weight-bold'>Alterar produto</span>
                </td>
              </tr>";
    }
    
}
?>
