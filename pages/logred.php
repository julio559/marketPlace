<?php  
include("php\log.php");
include("php\criar.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registro - Marketplace</title>
    <link rel="stylesheet" href="css\logred.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
   
</head>

<body>
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
                    <input type="text" placeholder="numero de telefone" name="numero" required>
                    <input type="text" placeholder="endereço" name="endereco" required>
                    <button type="submit" id="enviar" class="button"  name="registrar">Registrar</button>
                </form>
            </div>
        </div>
    </div>

<script src="js\criar.js">
    </script>
</body>
</html>
