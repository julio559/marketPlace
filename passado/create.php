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


    <style>
.google-login {
    background-color: white;
    box-shadow: 3px 3px 5px #357ABD;
    border: none;
    color: white;
padding: 5px 10px 5px 10px;
    border-radius: 4px;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    transition: background-color 0.3s ease;
  align-items: center;

  margin-right: 10px;
    margin-top: 5px;

}

.google-login:hover{
padding: 7px 13px 7px 13px;
transition: 0.4s;

}

.google-icon {
    margin-right: 10px;
}


.inline {
 
    display: flex;
    justify-content: space-between;
    align-items: center; /* Isso garante que os itens estejam verticalmente centralizados */
}

.form-container {
    flex: 1; 
    margin-left: 50vw;
}
#img2{


    border-radius: 0 35px 355px 0;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 40%; 
    height: 100vh; 
    object-fit: cover; 

}

@media (max-width: 768px) {
    #img2 {
        display: none;
    }
    .form-container {
        margin-left: 5vw; 
    }
}

body {
    background: linear-gradient(135deg, #2C3E50 0%, #34495E 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #34495E;
    transition: background 0.5s;
}




.es{
  
 display: flex;
    align-items: center;
    justify-content: start; /
padding-bottom: 2px;
padding-top: 2px;
padding-left: 6.5vw ;
}
.para{

margin-left: 5vw;

}

</style>
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