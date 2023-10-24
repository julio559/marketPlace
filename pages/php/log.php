<?php

session_start();

include("conexao.php");
$error = "";

if(isset($_SESSION['usuario'])){

header("location: index.php");

}

       

if (isset($_POST['enviar'])) {
    if (empty($_POST['nomeLogin']) || empty($_POST['senhaLogin'])) {
        $error = "<p class='error'>Por favor, preencha todos os campos.</p>";
    } else {
        $emailOrNome = $_POST['nomeLogin'];
        $senha = $_POST['senhaLogin'];

        $sql_code = "SELECT id, nome, senha FROM clientes WHERE email = ? OR nome = ? LIMIT 1";
        if ($stmt = $mysqli->prepare($sql_code)) {

            $stmt->bind_param("ss", $emailOrNome, $emailOrNome);
            $stmt->execute();

            $stmt->bind_result($id, $nome, $hashedSenha);
            if ($stmt->fetch()) {
                if (password_verify($senha, $hashedSenha)) {
                    $_SESSION['usuario'] = $id;
                  

                    header("Location: php\dashboard2.php?nome=" . urlencode($nome) . "&id=" . urlencode($id));
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
