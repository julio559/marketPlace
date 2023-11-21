<?php

include '../../pages/php/conexao.php';
session_start();

if(isset($_SESSION['usuario'])){

header("location: ../../pages/php/dashboard2.php");


}

$error_message = "";
$senha2 = "";
$nome2 = "";
$email2 = "";

if(isset($_POST['senha2']) && isset($_POST['nome2'])){


$senha2 = $_POST['senha2'];
$nome2 = $_POST['nome2'];
$email2 = $_POST['email2'];

}else{


}

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    
var_dump($_POST);


    $nome = $_POST['nome'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $cep = $_POST['CEP'];
    $cpf = $_POST['CPF'];
    $complemento = $_POST['complemento'];

    // Apenas verifique o email
    $stmt = $mysqli->prepare("SELECT id FROM clientes WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    $caminho_completo = null;



    if ($stmt->num_rows > 0) {
        $error_message = "E-mail já está em uso!";
    } else {
        $stmt->close();
        $stmt = $mysqli->prepare("INSERT INTO clientes (nome, senha, email, endereco, numero, cep, cpf, complemento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nome, $senha, $email, $endereco, $numero, $cep, $cpf, $complemento);
        
        if ($stmt->execute()) {
      header("location: sign-in.php");
           
        } else {
            echo "Erro ao criar a conta.";
        }
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
  
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Bem vindo!</h1>
            <p class="text-lead text-white">Crie sua conta gratuitamente.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Registrar com</h5>
            </div>
            <div class="row px-xl-5 px-sm-4 px-3">
              <div class="col-3 ms-auto px-1">
             
              </div>
              <div class="col-3 px-1">
              <a class="btn btn-outline-light w-100" href="javascript:;">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                        <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" fill="#4285F4"></path>
                        <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" fill="#34A853"></path>
                        <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" fill="#FBBC05"></path>
                        <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" fill="#EB4335"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="col-3 me-auto px-1">
            
              </div>
              <div class="mt-2 position-relative text-center">
                <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                  or
                </p>
              </div>
            </div>
            <div class="card-body">
              <form  method="POST" action="">
                <div class="mb-3">
        
                <span id="validation_message"></span>
                    <input type="text" class="form-control" value="<?php echo $email2 ?>" name="email" placeholder="email" id="email" autocomplete="off">
                </div>
                    <div class="mb-3">
                    <input type="text" class="form-control" placeholder="nome" value=" <?php echo $nome2 ?>" name="nome" id="nome" autocomplete="On">

                </div>

                <div class="mb-3">
                 
                        <input type="password"  class="form-control" placeholder="Senha" value=" <?php echo $senha2 ?>" id="senha" name="senha" required>
                   
                    </div>
                    <div class="mb-3">
                    <input type="text"  class="form-control" placeholder="55dddNumero" name="numero" pattern="55[0-9]{2}[0-9]{9}" title="O número deve seguir o padrão: 55 seguido de um DDD de 2 dígitos e depois 9 dígitos para o número" required>
</div>
<div class="mb-3">
<input type="text" class="form-control"  placeholder="CPF" name="CPF" id="CPF" required>
</div>
<div class="mb-3">
<input type="text" placeholder="CEP" class="form-control" name="CEP" id="CEP" required>
</div>
                    <input type="text" class="form-control"  id="endereco" placeholder="endereço" name="endereco" required>
                    <input type="text" class="form-control" id=" " placeholder="complemento" name="complemento" required>

               
                <div class="text-center" id="buttonContainer">
                  
                </div>
                <a href="sign-in.php">
                <p class="text-sm mt-3 mb-0">Ja tem conta? <a href="sign-in.php" class="text-dark font-weight-bolder">entre </p>
              </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>


$(document).ready(function(){
    $("#email").blur(function(){ 
        var email = $("#email").val();

        if (email) {
            $.get("check_user.php", {email: email}, function(data){
                if(data.email_status === 'indisponivel') {
                    $("#validation_message").text("E-mail já está em uso!");
                    $("#text-centes").html("<button type='submit' id='enviar' class='button' name='registrar' disabled>E-mail já está em uso</button>");
                } else {
                    $("#validation_message").text("E-mail disponível");
                    $("#buttonContainer").html("<button type='submit' class='btn bg-gradient-dark w-100 my-4 mb-2' name='registrar'>Criar conta</button>");
                }
                
            }, 'json');
        }
    });
});

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }


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
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>