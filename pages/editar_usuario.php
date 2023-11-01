<?php 
session_start();
include("php/conexao.php");

// Verifica se o usuário está logado
if(!isset($_SESSION["usuario"])) {
    header("location: logred.php");
    exit();
}

$id2 = $_SESSION['usuario'];
$sql = "SELECT tipe FROM clientes WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id2);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
while ($row = $result->fetch_assoc()) {
$tipe = $row['tipe'];
if($tipe !== '1') {
header("location: index-4.php");

}
}

if(isset($_GET["id"])) {
$id = $_GET['id'];
$sql = "SELECT nome, email, cpf, numero, tipe FROM clientes WHERE id = $id ";
$query =  $mysqli ->query($sql);
while ($row = $query->fetch_assoc()) {

    $nome = $row["nome"];
    $email = $row["email"];
    $cpf  = $row["cpf"];
    $numero = $row['numero'];
    $ti2 = $row['tipe'];

}
} else {
showErrorScreen();
}

function showErrorScreen() {
    echo '
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .error-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 100%;
                max-width: 400px;
            }

            h2 {
                color: #d9534f;
            }

            a {
                padding: 10px 20px;
                background-color: #0077cc;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

           a:hover {
                background-color: #0055a5;
            }
        </style>
    </head>
    <body>
        <div class="error-container">
            <h2>Erro</h2>
            <p>Não foi encontrado nenhum usuário com o ID fornecido.</p>
            <a href="usuarios.php">Voltar</a>
        </div>

     
    </body>
    </html>';
    die();
}




include("php/conexao.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os valores do formulário
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $numero = $_POST["numero"];
    $cpf = $_POST["CPF"];
    $accountType = $_POST["accountType"];

    // Determina o valor de 'tipe' com base no tipo de conta selecionado
    if($accountType == "user") {
        $tipe = "0";
    } elseif($accountType == "admin") {
        $tipe = "1";
    }

    // Atualiza os dados no banco de dados
    $sql = "UPDATE clientes SET nome=?, email=?, numero=?, CPF=?, tipe=? WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sssssi', $nome, $email, $numero, $cpf, $tipe, $id);
    
    if($stmt->execute()) {
        header("location: usuarios.php");
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();

}
?>






<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <title>Editar Usuário</title>
    <style>
 body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to bottom, #003366, #0066cc);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
}

.card {

    background: #f9f9f9;
    border: 2px solid #0077cc;
    border-radius: 15px;
    padding: 40px 30px;
    width: 450px;
    box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
    transition: transform .2s ease-in-out;
}

.card:hover {
    transform: scale(1.03);
}

.card h2 {
    color: #0077cc;
    text-align: center;
    margin-bottom: 25px;
    font-size: 24px;
}

.card label {
    color: #003366;
    display: block;
    margin: 18px 0 8px;
    font-size: 16px;
}

.card input[type="text"], .card select {
    width: 90%;
    padding: 12px 15px 14px;
  
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color .2s ease-in-out;
}

.card input[type="text"]:focus, .card select:focus {
    border-color: #0077cc;
}

.switch {
    display: flex;
    align-items: center;
    margin-top: 25px;
}

.switch label {
    color: #003366;
    margin-right: 15px;
}

.switch input {
    display: none;
}

.slider {
    position: relative;
    width: 60px;
    height: 30px;
    background: #f4f4f4;
    border-radius: 15px;
    cursor: pointer;
}

.slider:before {
    content: "";
    position: absolute;
    width: 28px;
    height: 28px;
    background: #fff;
    border-radius: 50%;
    top: 1px;
    left: 1px;
    transition: left 0.3s;
}

.switch input:checked + .slider:before {
    left: 31px;
}

.switch input:checked + .slider {
    background-color: #0077cc;
}

.buttons {
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
}

.buttons button {
    padding: 10px 20px;
    border: none;
    border-radius: 7px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color .2s ease-in-out;
}

.buttons .save {
    background: #0077cc;
    color: white;
}

.buttons .cancel {
    background: #f9f9f9;
    border: 2px solid #0077cc;
    color: #003366;
}

.buttons .cancel:hover {
    background: #e6e6e6;
}

.buttons .save:hover {
    background: #0055a5;
}

    </style>
</head>
<body>
    <form method="POST">
<div class="card">
<h2>Editar Usuário</h2>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<label for="nome">Nome:</label>
<input type="text" name="nome" id="nome" value="<?php echo $nome ?>" required>

<label for="email">E-mail:</label>
<input type="text" name="email" id="email" value="<?php echo $email ?>" required>

<label for="numero">Numero de Telefone:</label>
<input type="text" name="numero" id="numero" value="<?php echo $numero ?>" required>

<label for="cpf">CPF:</label>
<input type="text" name="CPF" id="CPF" value="<?php echo $cpf ?>" required>

<label for="accountType">Tipo de Conta:</label>
<select name="accountType" id="accountType" required>
    <option value="user">Usuário</option>
    <option value="admin">Administrador</option>
</select>

        
        <div class="switch">
            <label for="block">Bloquear Usuário?</label>
            <input type="checkbox" id="block">
            <span class="slider"></span>
        </div>

        <div class="buttons">
          
            <button class="save" type="submit" onclick="save()">Salvar</button>
            <button class="cancel" type="button
            " onclick="saveChanges()">Cancelar</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
function saveChanges(){


window.location.href = "usuarios.php";

}
$("#CEP").mask("00000-000");
$("#CPF").mask("000.000.000-00");

document.addEventListener("DOMContentLoaded", function() {
    let card = document.querySelector('.card');
    card.style.visibility = "visible";
    card.classList.add('animate__animated', 'animate__fadeInUp');
});


    </script>
</body>
</html>