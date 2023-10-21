<?php 
include("php\log.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Marketplace</title>
    <link rel="stylesheet" href="css\login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>
    <div id="loginContainer">
        <h2>Login - Marketplace</h2>
        <form method="post">
            <input type="text" placeholder="Nome de usuário" name="nomeLogin" required>
            <input type="password" placeholder="Senha" name="senhaLogin" required>
<?php   

if($error){

echo $error;

}

?>

<br>

            <button type="submit" name="enviar">Entrar</button>
            <a href="create.php" class="register-button">Criar Usuário</a>

        </form>
        
    </div>
</body>
</html>
