<?php
include("conexao.php");

$error_message = "";

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    
    $nome = $_POST['nome'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $cep = $_POST['CEP'];
    $cpf = $_POST['CPF'];
    $complemento = $_POST['complemento'];

    $stmt = $mysqli->prepare("SELECT id FROM clientes WHERE email = ? AND nome = ?");
    $stmt->bind_param("ss", $email, $nome);
    $stmt->execute();
    $stmt->store_result();

    $caminho_completo = null;

    if (isset($_FILES['file']) && $stmt->num_rows == 0) {
        $arquivo = $_FILES['file'];
        $pasta = "uploads/";
        $nomeA = $arquivo['name'];
        $novo = uniqid();
        $extensao = strtolower(pathinfo($nomeA, PATHINFO_EXTENSION));
        $path = $pasta . $novo . "." . $extensao;
        $caminho_completo = $path;
        move_uploaded_file($arquivo['tmp_name'], $caminho_completo);
    }

    if ($stmt->num_rows > 0) {
        $error_message = "E-mail ou Nome já está em uso!";
    } else {
        $stmt->close();
        $stmt = $mysqli->prepare("INSERT INTO clientes (nome, senha, email, endereco, numero, cep, cpf, complemento, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $nome, $senha, $email, $endereco, $numero, $cep, $cpf, $complemento, $caminho_completo);
        
        if ($stmt->execute()) {
            if ($caminho_completo !== null) {
                $stmt_img = $mysqli->prepare("INSERT INTO imagem_verify (img, id_usuario) VALUES (?, ?)");
                $last_id = $mysqli->insert_id;
                $stmt_img->bind_param('si', $path, $last_id);
                $stmt_img->execute();
                $stmt_img->close();
            }
            header("location: logred.php");
        } else {
            echo "Erro ao criar a conta.";
        }
    }
    $stmt->close();
}
?>
