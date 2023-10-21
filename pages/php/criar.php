<?php   
if( isset($_POST['nome']) && isset($_POST['senha'])){

    $nome = $_POST['nome'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];


    $sql = "INSERT INTO clientes (nome, senha, email, endereco, numero) VALUES ('$nome', '$senha', '$email', '$endereco', '$numero')";  
$query = $mysqli -> query($sql);
header("location: login.php");

}

?>