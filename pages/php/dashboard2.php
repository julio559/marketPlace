<?php 
session_start();
echo $_SESSION['usuario'];
$duracao = time() + (30 * 24 * 60 * 60);




if (isset($_GET['id'])) {

    $id = $_GET['id'];
    if (setcookie("id", $_GET['id'], $duracao))
        ;}

if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];

    if (setcookie("salvar", $_GET['nome'], $duracao));



}



header("location: index-4.php");



?>
