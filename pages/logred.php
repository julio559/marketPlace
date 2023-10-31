<?php  
include("php\log.php");
include("php\criar.php");


require_once 'google_config.php';

$login_url = $client->createAuthUrl();


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
    <script src="https://apis.google.com/js/platform.js" async defer></script>

<meta name="google-signin-client_id" content="561052168672-k4fcftc5ec0t7c45kjln252j54jibtv2.apps.googleusercontent.com">

<style>


.error{
color: red;

}
.log2{


    color: #34495E;

}

.tp{

margin-top: 35px;
text-align: center;

}


#google1-login-btn{
margin-left: 8vw;


}


/* Estilização básica para o botão de upload de imagem */
#foto {
    display: none; /* Esconde o input original */
}

#foto + label {
    padding: 10px 15px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#foto + label:hover {
    background-color: #0056b3;
}

#foto:checked + label {
    background-color: #004192;
}


</style>

</head>
<body>

<div class="inline">


<img id="img2" src="https://img.freepik.com/vetores-premium/pessoas-comprando-online_131454-458.jpg" alt="" srcset="">



    <div class="form-container">
        
        <!-- Formulário de Login -->
        <div id="loginForm">
            <div id="loginContainer">
                <h2>Login - Marketplace</h2>
                <form method="post">
                    <input type="Email" placeholder=" Digite seu Email" name="nomeLogin" required>
                    <input type="password" placeholder="Senha" name="senhaLogin" required>

                    <p class="error"> 
                    <?php   
                        if( $error_message) {
                            echo  $error_message;
                        }
                    ?>
                    </p>
                    <br>
                    <button type="submit" id="" class="button" name="enviar">Entrar</button>
                    <button type="button" class="button"  id="showCreateForm">Criar Usuário</button>
<div class="tp">
<p class="p"> entre com google: </p>

<button class="google-login" type="button" id="google1-login-btn">
    <img src="google.png" width="30px" alt="" srcset="">
</button>
                   </div>
                </form>
            </div>
        </div>

        <!-- Formulário de Criação de Conta -->
        <div id="createForm">
            <div id="container">
                <form method="post" id="LoginForm" enctype="multipart/form-data">
                    <div class="inlie">
                        <button type="button" class="button1"  id="showLoginForm"><i class="bi bi-arrow-left"></i></button> 
                        <h2 class="mar">Criar Conta</h2>
                    </div>
                    <?php   
                    if(isset($exit)) {

echo "<p class='error'> $exit </p>";
                    }
                    
                    ?>


<p class="error"> 
                    <?php   
                        if( $error_message) {
                            echo  $error_message;
                        }
                    ?>
                    </p>
                    <span id="validation_message"></span>
                    <input type="text" name="email" placeholder="email" id="email" autocomplete="off">
                  
                    <input type="text" placeholder="nome" name="nome" id="nome" autocomplete="On">




                    <div class="password-container">
                        <input type="password" placeholder="Senha" id="senha" name="senha" required>
                        <button type="button" class="toggle-password" id="toggle">
                            <i id="toggleIcon" class="bi bi-eye-slash-fill"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="55dddNumero" name="numero" pattern="55[0-9]{2}[0-9]{9}" title="O número deve seguir o padrão: 55 seguido de um DDD de 2 dígitos e depois 9 dígitos para o número" required>
                  
<input type="text" placeholder="CPF" name="CPF" id="CPF" required>
<input type="text" placeholder="CEP" name="CEP" id="CEP" required>
                    <input type="text" id="endereco" placeholder="endereço" name="endereco" required>
                    <input type="text" id=" " placeholder="complemento" name="complemento" required>
                    <input type="file" name="file" id="foto" accept="image/*" required>
<label for="foto">Enviar Documento com foto</label>
<br><br>

<div id="buttonContainer">
    <!-- O botão será inserido aqui pelo jQuery -->
</div>

                </form>
<br>
<p class="para"> ou conecte-se com: </p>
<div class="es">

<button class="google-login" type="button" id="google-login-btn">
    <img src="google.png" width="30px" alt="" srcset="">
</button>

</div>
<br><br>
                 
            </div>
        </div>
    </div>
    </div>

<script src="js\criar.js">
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
function buscarEndereco(cep) {
    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
        if (!("erro" in dados)) {
            // Atualizar campos com os valores da consulta.
            $("input[name='endereco']").val(dados.logradouro + " " + dados.bairro + " " + dados.localidade);
        } else {
            alert("CEP não encontrado.");
        }
    });
}

// Máscaras
$("#CEP").mask("00000-000");
$("#CPF").mask("000.000.000-00");

// Atualização do endereço pelo CEP
let timeout; // Variável para controlar o delay da função

$("#CEP").on('input', function() {
    clearTimeout(timeout); // Limpar timeout anterior
    const cep = $(this).val().replace(/\D/g, '');

    if (cep.length === 8) {
        timeout = setTimeout(() => buscarEndereco(cep), 500); // Adiciona um delay de 500ms
    }
});


function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id_token = googleUser.getAuthResponse().id_token;

    // Você pode enviar o id_token para o servidor para verificação usando XMLHttpRequest ou Fetch API
    fetch('login_google.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'idtoken=' + id_token
    }).then(response => response.json()).then(data => {
        if (data.success) {
            location.reload();
        } else {
            console.error("Erro no login");
        }
    });
}

document.getElementById('google-login-btn').addEventListener('click', function() {
        window.location.href = "<?= $login_url; ?>";
    });

    document.getElementById('google1-login-btn').addEventListener('click', function() {
        window.location.href = "<?= $login_url; ?>";
    });

    $(document).ready(function(){
    $("#email").blur(function(){ 
        var email = $("#email").val();

        if (email) {
            $.get("php/check_user.php", {email: email}, function(data){
                if(data.email_status === 'indisponivel') {
                    $("#validation_message").text("E-mail já está em uso!");
                    $("#buttonContainer").html("<button type='submit' id='enviar' class='button' name='registrar' disabled>E-mail já está em uso</button>");
                } else {
                    $("#validation_message").text("E-mail disponível");
                    $("#buttonContainer").html("<button type='submit' id='enviar' class='button' name='registrar'>Registrar</button>");
                }
                
            }, 'json');
        }
    });
});




</script>


</body>
</html>
