<?php  
include("php\log.php");
include("php\criar.php");



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>

<link rel="stylesheet" href="css\login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
   
<style>

.log2{


    color: #34495E;

}

.tp{

margin-top: 35px;
text-align: center;

}

</style>

</head>
<body>

<div class="inline">


<img  id="img2" src="https://img.freepik.com/vetores-premium/pessoas-comprando-online_131454-458.jpg"  alt="" srcset="">



    <div class="form-container">
        
        <!-- Formulário de Login -->
        <div id="loginForm">
            <div id="loginContainer">
                <h2>Login - Marketplace</h2>
                <form method="post">
                    <input type="text" placeholder="Nome de usuário" name="nomeLogin" required>
                    <input type="password" placeholder="Senha" name="senhaLogin" required>
                    <?php   
                        if($error) {
                            echo $error;
                        }
                    ?>
                    <br>
                    <button type="submit" id="" class="button" name="enviar">Entrar</button>
                    <button type="button" class="button"  id="showCreateForm">Criar Usuário</button>
<div class="tp">
                   <a class="log2" href="php\index-4.php"> continuar sem cadastro </a>  
                   </div>
                </form>
            </div>
        </div>

        <!-- Formulário de Criação de Conta -->
        <div id="createForm">
            <div id="container">
                <form method="post" id="LoginForm">
                    <div class="inlie">
                        <button type="button" class="button1"  id="showLoginForm"><i class="bi bi-arrow-left"></i></button> 
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
                    <input type="text" placeholder="55dddNumero" name="numero" pattern="55[0-9]{2}[0-9]{9}" title="O número deve seguir o padrão: 55 seguido de um DDD de 2 dígitos e depois 9 dígitos para o número" required>


                    <input type="text" placeholder="endereço" name="endereco" required>
<br><br>
<button type="submit" id="enviar" class="button"  name="registrar">Registrar</button>
                </form>
<br>
<p class="para"> ou conecte-se com: </p>
<div class="es">
    
                    <button class="google-login" type="button">
                    
   <img src="google.png" width="30px" alt="" srcset="">

</button>

<button class="google-login" type="button">
                    
                    <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" width="30px" alt="" srcset="">
                 
                 </button>

</div>
<br><br>
                 
            </div>
        </div>
    </div>
    </div>

<script src="js\criar.js">
    </script>
</body>
</html>
