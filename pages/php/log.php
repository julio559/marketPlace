<?php

session_start();


include("php\conexao.php");

$error = false;

if (isset($_POST['enviar'])) {
    $emailOrNome = $_POST['nomeLogin'];
    $senha = $_POST['senhaLogin'];

    $sql_code = "SELECT id, nome, senha FROM clientes WHERE email = ? OR nome = ? LIMIT 1";
    if ($stmt = $mysqli->prepare($sql_code)) {
        
        $stmt->bind_param("ss", $emailOrNome, $emailOrNome);
        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario'] = $usuario['id'];
                $_SESSION['img'] = $usuario['img'];

                header("Location: dashboard2.php?nome=" . urlencode($usuario['nome']) .  "&id=" . urlencode($usuario['id']));
                exit;

            } else {
            $error = true;
$error = "<p class='error'> Não achamos sua conta </p>";

            }

        } 

    } else {
        die("Erro ao preparar a consulta: " . $mysqli->error);
    }
}
?>