<?php 
include("conexao.php");
session_start();
if (isset($_SESSION["usuario"])) {
$id = $_SESSION["usuario"];
}else{

    header("location: ../../argon-dashboard-master/pages/sign-in.php");

}
if(isset($_GET["id_prod"])) {
$id_prod = $_GET['id_prod'];


$sql = "SELECT nome, imagem, imagem2, imagem3, imagem4, cartegoria, descricao, sub_descricao, preco, stock FROM produto WHERE id = $id_prod";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

    $nome = $row["nome"];   
    $imagem = $row["imagem"];   
    $imagem2 = $row["imagem2"]; 
    $imagem3 = $row["imagem3"]; 
    $imagem4 = $row["imagem4"]; 
    $cartegoria = $row["cartegoria"];
    $descricao = $row["descricao"];
    $sub_descricao = $row["sub_descricao"];
    $preco = $row["preco"];
    $stock = $row["stock"];
}




}

if(!isset($_GET["id_prod"])) {

header("location: php/index-4.php");
}
function limitCharsPerLine($text, $limit = 70) {
    $lines = str_split($text, $limit);
    return implode("\n", $lines);
}

$limitedText = limitCharsPerLine($descricao);


if(isset($_POST['comment']) && isset($_POST['rating'])){

$comment = $_POST['comment'];
$rating = $_POST['rating'];
$sql = "INSERT INTO avaliacao_prod (id_usuario, id_prod, nota, desc_avaliacao) VALUES ('$id', '$id_prod', '$rating', '$comment')";
$query = $mysqli -> query($sql);



}


$sql = "SELECT nome FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while( $row = $query -> fetch_assoc() ) {
$nome1 = $row["nome"];

}
?>