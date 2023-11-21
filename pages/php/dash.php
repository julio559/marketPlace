<?php  
include("conexao.php");
session_start();

if(!isset($_SESSION["usuario"])){

    header("location: ../../argon-dashboard-master/pages/sign-in.php");

}

$id = $_SESSION['usuario'];
echo $id;

$sql = "SELECT nome, numero FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while($row = $query -> fetch_assoc()){

    $nomeUsuer = $row['nome'];
    $numero = $row['numero'];
    echo $numero, $nomeUsuer;


}


?>