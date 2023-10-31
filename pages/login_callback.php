<?php

session_start();

require_once 'google_config.php';
require_once 'php/conexao.php';

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        $google_service = new Google_Service_Oauth2($client);
        $data = $google_service->userinfo->get();

        $email = $data['email'];
        $name = $data['name'];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;

        // Prepared statement to check for user existence
        $stmt = $mysqli->prepare("SELECT id, nome, email FROM clientes WHERE nome = ? AND email = ?");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // Fetching user data
            $user = $result->fetch_assoc();
            
            // Storing the user ID in session
            $_SESSION['usuario'] = $user['id'];
    
            // Redirect to dashboard2.php
            header("Location: php\dashboard2.php?nome=" . urlencode($name) . "&id=" . urlencode($_SESSION['usuario']));
            exit;
        }
    }
}

if (isset($_POST['registrar'])) {
    $senha = $_POST['senha'];
    $numero = $_POST['numero'];
    $CEP = $_POST['CEP'];
    $CPF = $_POST['CPF'];
    $endereco = $_POST['endereco'];
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
    $complemento = $_POST['complemento'];
    $stmt = $mysqli->prepare("INSERT INTO clientes (nome, senha, email, endereco, numero, cep, cpf, complemento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $senha, $email, $endereco, $numero, $CEP, $CPF, $complemento);

    if ($stmt->execute()) {
        $_SESSION['usuario'] = $mysqli->insert_id;
        header("Location: php\dashboard2.php?nome=" . urlencode($name) . "&id=" . urlencode($_SESSION['usuario']));
        exit;
    } else {
        echo "Erro ao registrar usuário.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>

<link rel="stylesheet" href="css\login2.css">
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

.createForm{
display: ;


}

</style>

</head>
<body>



<img id="img2" src="https://img.freepik.com/vetores-premium/pessoas-comprando-online_131454-458.jpg" alt="" srcset="">

<div class="inline">






    <div class="form-container">
        
        <!-- Formulário de Login -->
      
        <div id="loginForm">
                <div id="container">
                <form method="post" id="LoginForm">
                    <div class="inlie">
                      
                        <h2 class="mar">Finalizar registro</h2>
                    </div>
                    <input type="text" placeholder="<?php echo $_SESSION['name']; ?>" value="<?php echo $_SESSION['name']; ?>" name="nome" required disabled>
                    <input type="text" placeholder="<?php echo $_SESSION['email']; ?>"  value="<?php echo $_SESSION['email']; ?>" name="nome" required  disabled>

                        <input type="password" placeholder="Senha" id="senha" name="senha" required>
                   
                    <input type="text" placeholder="55dddNumero" name="numero" pattern="55[0-9]{2}[0-9]{9}" title="O número deve seguir o padrão: 55 seguido de um DDD de 2 dígitos e depois 9 dígitos para o número" required>
                  
<input type="text" placeholder="CPF" name="CPF" id="CPF" required>

<input type="text" placeholder="CEP" name="CEP" id="CEP" required>
                    <input type="text" id="endereco" placeholder="endereço" name="endereco" required>
                    <input type="text"  placeholder="complemento" name="complemento" required>
<br><br>
<button type="submit" id="enviar" class="button"  name="registrar">Registrar</button>
                </form>
            </div>
        </div>
        </div>
        <!-- Formulário de Criação de Conta -->


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



</script>


</body>
</html>
