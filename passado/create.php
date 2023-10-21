<?php 

include('php/conexao.php');
include('php/criar.php');


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login e Criação de Conta</title>
    <link rel="stylesheet" href="css\criar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div id="container">
  


        <form method="post"  id="LoginForm">
            <div class="inlie">
        <a href="login.php" id="back"><i class="bi bi-arrow-left"></i></a> 
        <h2 class="mar">Criar Conta</h2>
        </div>
            <input type="text" placeholder="Nome de usuário" name="nome" required>
            <input type="email" placeholder="email" name="email" required>
          
            <div class="password-container">
    <input type="password" placeholder="Senha" id="senha" name="senha" required>
    <button type="button" class="toggle-password" id="toggle">
        <i id="toggleIcon" class="bi bi-eye-slash-fill"></i>
    </button>
</div>

        
            <input type="text" placeholder="numero de telefone" name="numero" required>
            <input type="text" placeholder="endereço" name="endereco" required>
            <button type="submit" id="enviar" name="registrar">Registrar</button>
     

        </form>

      
    </div>
<script src="js\criar.js"> </script>
</body>
</html>