<?php
// Inclui o arquivo de conexão com o banco de dados
include '../../pages/php/conexao.php';

// Verifica se a variável 'nome' foi enviada
if (isset($_GET['nome'])) {
    // Recebe o valor enviado pelo AJAX
    $nome = $_GET['nome'];

    // Prepara uma consulta SQL para buscar usuários com um nome que contém o valor recebido
    // Importante: Isso é uma forma básica e não segura. Em um ambiente de produção, você deve usar declarações preparadas para evitar injeções SQL
    $sql = "SELECT * FROM clientes WHERE nome LIKE '%$nome%'";

    // Executa a consulta
    $query = $mysqli->query($sql);

    // Itera sobre os resultados e imprime as linhas da tabela
    while ($row = mysqli_fetch_array($query)) {
        // Aqui você monta a estrutura da linha da tabela (tr) com os dados de cada usuário
        echo '<tr id=ola>';
        echo '<td><img src="../../pages/uploads/' . $row['img_perfil'] . '" class="avatar avatar-sm me-3" alt="avatar"></td>';
        echo '<td>' . $row['nome'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['cep'] . '</td>';
        echo '<td>' . $row['cpf'] . '</td>';
        echo '<td>' . $row['endereco'] . '</td>';
        echo '<td><a href="edita_profile.php?id=' . $row['id'] . '" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Editar usuario">Editar</a></td>';
        echo '</tr>';
    }
}
?>
