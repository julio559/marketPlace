<?php
// Inclui o arquivo de conexão e inicia a sessão
include '../../pages/php/conexao.php';
session_start();

// Redireciona o usuário se ele não estiver logado
if (!isset($_SESSION["usuario"])) {
    header("location: ../../pages/logred.php");
    exit; // Não esqueça de chamar exit após o redirecionamento.
}
if(isset($_GET["id"])) {
$id =  $_GET["id"];
$sql = "SELECT * FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {


$tipe = $row['tipe'];
$nome = $row['nome'];
$imagem = $row['img_perfil'];
$email = $row['email'];
$cpf = $row['cpf'];
$endereco = $row['endereco'];
$cep = $row['cep'];
$numero = $row['numero'];
}
}

if($tipe =='1'){

$tipe = "Administrador";

}else{

$tipe = "Usuario padrão";

}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Capture as informações do formulário
  $nome = $_POST['nome'] ?? '';
  $email = $_POST['email'] ?? '';
  $endereco = $_POST['endereco'] ?? '';
  $numero = $_POST['numero'] ?? '';
  $cep = $_POST['cep'] ?? '';
  $cpf = $_POST['cpf'] ?? '';
  $id_usuario = $_SESSION['usuario']; // Ou a forma que você tem de obter o ID do usuário
  $sliderValue = $_POST['sliderValue'];
  // Prepara a consulta SQL para atualizar as informações do usuário
  $sql = "UPDATE clientes SET nome = ?, email = ?, endereco = ?, numero = ?, cep = ?, cpf = ?, block = ?  WHERE id = ?";

  // Prepara o statement para execução
  if ($stmt = $mysqli->prepare($sql)) {
      // "s" significa que o parâmetro é uma string
      $stmt->bind_param("sssssssi", $nome, $email, $endereco, $numero, $cep, $cpf, $sliderValue, $id);

      // Executa a consulta preparada
      if ($stmt->execute()) {
        $_SESSION['success_message'] = "Perfil atualizado com sucesso!";

      } else {
          echo "Erro ao atualizar o perfil: " . $stmt->error;
      }

      // Fecha o statement
      $stmt->close();
  } else {
      echo "Erro ao preparar a consulta: " . $mysqli->error;
  }
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

<style>

.slider-container {
  width: 60px;
  height: 30px;
  background-color: #ccc;
  border-radius: 15px;
  position: relative;
  transition: background-color 0.3s;
}

.slider {
  width: 30px;
  height: 30px;
  background-color: white;
  border-radius: 15px;
  position: absolute;
  transition: 0.3s;
}

.slider-container.active {
  background-color: green;
}

.save{

border: none;
border-radius: 10px;
background-color: #0d6efd;
color: white;
padding: 10px;


}

.success-message {
  position: fixed;
  top: 20px;
  right: 20px;
  padding: 10px 20px;
  background-color: #4CAF50; /* Cor de fundo verde */
  color: white; /* Texto branco */
  border-radius: 5px; /* Bordas arredondadas */
  z-index: 1000; /* Garante que a mensagem fique acima de outros elementos */
  box-shadow: 0 2px 4px rgba(0,0,0,0.2); /* Sombra leve para destacar */
}

  </style>

</head>

<body class="g-sidenav-show bg-gray-100">

<div id="successMessage" class="success-message" style="display:none;">
  Perfil atualizado com sucesso!
</div>
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.php " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="../pages/dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link active" href="emergencia.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            
            <span class="nav-link-text ms-1">Emergencia</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="../pages/tables.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tabela de usuarios</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="../pages/tables2.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tabela de produtos</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="../../pages/php/dahboardPer.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <img src="ferramenta-lapis.png" width="20px"> 
            </div>
            <span class="nav-link-text ms-1">Editar Tela de vendedor</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/tickets.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <img src="ingressos.png" width="20px"> 
            </div>
            
            <span class="nav-link-text ms-1">Tickets abertos</span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link " href="resume.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <img src="ingressos.png" width="20px"> 
            </div>
           
            <span class="nav-link-text ms-1">Resumo mensal vendedores</span>
          </a>
        </li>
   
        <li class="nav-item">
          <a class="nav-link active" href="../pages/profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Editar conta de usuario</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Detalhes da conta</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Minha conta</span>
          </a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link " href="../../pages/php/logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sair</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      
    </div>
  </aside>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
          </ol>
          <h6 class="text-white font-weight-bolder ms-2">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </a>
            </li>
           
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative"> 
              <img src="../../pages/uploads/<?php echo $imagem?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
            <?php echo $nome ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
             <?php echo $tipe ?>
              </p>
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Editar Perfil</p>
               
              </div>
            </div>

            <form method="POST">
            <div class="card-body">
              <p class="text-uppercase text-sm">Informação do usuario</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label"  >Nome do usuario</label>
                    <input class="form-control" type="text" value="<?php echo $nome?>" name="nome">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label" >endereço de email</label>
                    <input class="form-control" type="email" value="<?php echo $email ?>" name="email">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label"  >CPF</label>
                    <input class="form-control" type="text" value="<?php echo $cpf ?>  "  name="cpf">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Numero de telefone</label>
                    <input class="form-control" type="text" value="<?PHP echo $numero ?>" name="numero">
                  </div>
                </div>
              

              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Informações de contato</p>
              <div class="row">

              <div class="form-group">
  <label for="cep" class="form-control-label">CEP</label>
  <input class="form-control" type="text" id="cep" value="<?php echo $cep ?>" name="cep">
</div>
</div>

              <div class="form-group">
  <label for="endereco" class="form-control-label">Endereço</label>
  <input class="form-control" type="text" id="endereco" value="<?php echo $endereco ?>" name="endereco">
</div>


<div class="slider-container" onclick="toggleSlider()">
    <div class="slider"></div>
    <input type="hidden" id="sliderValue" name="sliderValue" value="0">
  </div>
  <p> Bloquear usuario? </p>


<button type="submit" class="save"> Salvar alterações </button>

</form>

        
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <img src="https://blog.portoseguro.com.br/wordpress/wp-content/uploads/2022/12/praia-paradisiaca-na-bahia-2048x1357.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src="../../pages/uploads/<?php echo $imagem ?>" class="rounded-circle img-fluid border border-2 border-white">
                  </a>
                </div>
              </div>
            </div>
           
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                 
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
                <h5>
                  <?php echo $nome ?>
                </h5>
                <div class="h6 font-weight-300">
                  <i class="ni location_pin mr-2"></i> <?php echo $endereco ?>
                </div>
                <div class="h6 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $tipe ?>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
       
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

  <?php
// Após a execução bem-sucedida da consulta de atualização...
if (isset($_SESSION['success_message'])) {
?>
<script>
// Quando o documento estiver pronto
$(document).ready(function() {
  // Mostra a mensagem de sucesso
  $("#successMessage").fadeIn();

  // Após 3 segundos, esconde a mensagem
  setTimeout(function() {
    $("#successMessage").fadeOut();
  }, 3000);
});
</script>
<?php
  // Limpar a mensagem da sessão após exibição
  unset($_SESSION['success_message']);
}
?>

  <script>


function toggleSlider() {
  var slider = document.querySelector('.slider');
  var container = document.querySelector('.slider-container');
  var sliderValue = document.getElementById('sliderValue');

  if (slider.style.left === '30px') {
    slider.style.left = '0px';
    container.classList.remove('active');
    sliderValue.value = '0';
  } else {
    slider.style.left = '30px';
    container.classList.add('active');
    sliderValue.value = '1';
  }
}


$(document).ready(function() {

// Função para buscar o endereço sempre que o CEP for alterado
$('#cep').on('blur', function() {

  // Obtém o CEP do valor do campo de input
  var cep = $(this).val().replace(/\D/g, '');

  // Verifica se o campo CEP possui valor informado.
  if (cep !== "") {

    // Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    // Valida o formato do CEP.
    if(validacep.test(cep)) {

      // Preenche os campos com "..." enquanto consulta webservice.
      $('#endereco').val("...");

      // Consulta o webservice viacep.com.br/
      $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

        if (!("erro" in dados)) {
          // Atualiza os campos com os valores da consulta.
          $('#endereco').val(dados.logradouro); // Aqui você pode adicionar outros campos como bairro, cidade, etc.
        } // end if.
        else {
          // CEP pesquisado não foi encontrado.
          limpa_formulário_cep();
          alert("CEP não encontrado.");
        }
      });
    } // end if.
    else {
      // cep é inválido.
      limpa_formulário_cep();
      alert("Formato de CEP inválido.");
    }
  } // end if.
  else {
    // cep sem valor, limpa formulário.
    limpa_formulário_cep();
  }
});
});

function limpa_formulário_cep() {
// Limpa valores do formulário de cep.
$('#endereco').val("");
}


    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>