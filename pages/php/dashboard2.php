<?php
session_start();
$duracao = time() + (30 * 24 * 60 * 60);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['usuario'] = $id; // Defina a sessão do usuário
    if (setcookie("id", $_GET['id'], $duracao)) ;
}

if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
    if (setcookie("salvar", $_GET['nome'], $duracao)) ;
}

header("location: http://www.b2b4u.com.br/pages/php/index-4.php");
?>