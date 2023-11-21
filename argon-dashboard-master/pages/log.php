<?php
session_start();
include '../../pages/php/conexao.php';

$error = "";
if (isset($_SESSION['usuario'])) {
    header("Location: ../../pages/php/index-4.php");
    exit;
}

if (isset($_POST['enviar'])) {
    if (empty($_POST['nomeLogin']) || empty($_POST['senhaLogin'])) {
        $error = "<p class='error'>Por favor, preencha todos os campos.</p>";
    } else {
        $email = $_POST['nomeLogin'];
        $senha = $_POST['senhaLogin'];

        $sql_code = "SELECT id, nome, senha FROM clientes WHERE email = ? LIMIT 1";
        if ($stmt = $mysqli->prepare($sql_code)) {

            $stmt->bind_param("s", $email);
            $stmt->execute();

            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $nome, $hashedSenha);
                $stmt->fetch();
                if (password_verify($senha, $hashedSenha)) {
                    $_SESSION['usuario'] = $id;

                    header("Location: http://www.b2b4u.com.br/pages/php/dashboard2.php?nome=" . urlencode($nome) . "&id=" . urlencode($id));
                    exit;
                } else {
                    $error = "<p class='error'>Senha incorreta.</p>";
                }
            } else {
                $error = "<p class='error'>Não achamos sua conta.</p>";
            }

            $stmt->close();
        } else {
            $error = "Erro ao preparar a consulta: " . $mysqli->error;
        }
    }
}
?>
