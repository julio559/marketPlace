<?php

session_start();

include("conexao.php");
$error = "";

if(isset($_SESSION['usuario'])){
    header("location: php/index-4.php");
}

if (isset($_POST['enviar'])) {
    if (empty($_POST['nomeLogin']) || empty($_POST['senhaLogin'])) {
        $error = "<p class='error'>Por favor, preencha todos os campos.</p>";
    } else {
        $email = $_POST['nomeLogin'];  // Renomeado para email para tornar mais claro
        $senha = $_POST['senhaLogin'];

        $sql_code = "SELECT id, nome, senha FROM clientes WHERE email = ? LIMIT 1";
        if ($stmt = $mysqli->prepare($sql_code)) {

            $stmt->bind_param("s", $email);  // Somente um parâmetro agora
            $stmt->execute();

            $stmt->bind_result($id, $nome, $hashedSenha);
            if ($stmt->fetch()) {
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
            die("Erro ao preparar a consulta: " . $mysqli->error);
        }
    }
}
?>
