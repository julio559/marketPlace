<?php

include("conexao.php");

session_start();
if(!isset($_SESSION["usuario"])){

header("Location: ../logred.php");

}

$duracao = time() + (30 * 24 * 60 * 60);


if (isset($_GET['id'])) {
    
  
    $id = $_GET['id'];


    if (setcookie("id", $id, $duracao)) {
        $_SESSION["usuario"] = $_COOKIE["id"];
    }
}


echo $_SESSION["usuario"];

header("Location: ../dashboard.php");

?>
