<?php 
include '../../pages/php/conexao.php';
session_start();


if(!isset($_SESSION['usuario'])){

header("location: logred.php");
}


$id = $_SESSION['usuario'];
$sql = "SELECT tipe FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

  $tipe = $row['tipe'];
if($tipe < '1'){
header("location: ../../pages/php/index-4.php");

}
}


$idusus = $_SESSION['usuario'];
$Ss1 = "SELECT nome FROM clientes WHERE id = $idusus";
$queqeq = $mysqli -> query($Ss1);
while( $row = $queqeq -> fetch_assoc() ){

$nome_usuario = $row["nome"];

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

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" ../pages/dashboard.php" target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Dashboard admin</span>
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
          <a class="nav-link active " href="resume.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <img src="ingressos.png" width="20px"> 
            </div>
           
            <span class="nav-link-text ms-1">Resumo vendedores</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active " href="total_vendido_plataform.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <img src="ingressos.png" width="20px"> 
            </div>
           
            <span class="nav-link-text ms-1">Resulmo total</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Detalhes da conta</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/profile.php">
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
      <div class="card card-plain shadow-none" id="sidenavCard">
      
         
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tables</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">  Bem vindo de volta <?php echo $nome_usuario  ?> </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
           
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"> <?php        $id_usuario = $_SESSION['usuario'];
            $sql_name = "SELECT nome FROM clientes WHERE id = $id_usuario ";
            $queque = $mysqli -> query($sql_name);
            while( $row332 = $queque -> fetch_assoc() ){

$nome = $row332["nome"];
echo $nome;

            } ?></span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">

<?php 

$id_vendor = $_SESSION['usuario'];

$sql_refound_new = "SELECT * FROM refound WHERE id_vendor = $id_vendor limit 3";
$que = $mysqli -> query($sql_refound_new);
if( $que -> num_rows > 0){
while( $row32 = $que -> fetch_assoc() ){
$motivo = $row32['motivo'];
  $id_cliente = $row32['id_usuario'];
  
  $sql9000 = "SELECT * FROM clientes where id = $id_cliente";
  $que9000 = $mysqli -> query($sql9000);
while( $row9 = $que9000 -> fetch_assoc() ){
$nome_cliente = $row9['nome'];
$imagem_perfil = $row9['img_perfil'];
echo "

<a class='dropdown-item border-radius-md' href='javascript:;'>
  <div class='d-flex py-1'>
    <div class='my-auto'>
      <img src='../../pages/uploads/$imagem_perfil' class='avatar avatar-sm  me-3 '>
    </div>
    <div class='d-flex flex-column justify-content-center'>
      <h6 class='text-sm font-weight-normal mb-1'>
        <span class='font-weight-bold'>Pedido de devolução</span> de $nome_cliente
      </h6>

    </div>
  </div>
</a>
</li>





";
}
}
}else{

echo "   <div class='d-flex flex-column justify-content-center'>
<h6 class='text-sm font-weight-normal mb-1'>
  <span class='font-weight-bold'> Nada por aqui </span>
</h6>

</div>";

}


?>
</div>
</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</nav>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tabela de usuarios da plataforma</h6>
              <?php
include '../../pages/php/conexao.php';


            
            $sql = "SELECT * FROM clientes";
            $query = $mysqli->query($sql);
            
            echo '<div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome do Usuário</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cep</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantidade de vendas</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total de vendas em valor</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>';
            
                  while ($row = $query->fetch_assoc()) {
                    $id = $row['id'];
                    $sql2 = "SELECT id, id_cliente, total, status FROM ordemcompra WHERE id_cliente = ? AND status = 'completa'";
                    $stmt = $mysqli->prepare($sql2);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                // Bind the result variables for the second query
                $stmt->bind_result($id, $id_cliente, $total, $status ); // Substitua com as colunas reais da tabela ordemcompra
            
                $totalVendas = 0;
                $quantidadeVendas = 0;
                while ($stmt->fetch()) {
                    $totalVendas += $total;
                    $quantidadeVendas++;
                }
            
                echo '<tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="../../pages/uploads/' . $row['img_perfil'] . '" class="avatar avatar-sm me-3" alt="avatar">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">' . $row['nome'] . '</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">' . $row['email'] . '</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">' . $row['cep'] . '</p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">' . $quantidadeVendas . '</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">' . $totalVendas . '</span>
                        </td>
                        <td class="align-middle">
                            <!-- Add any additional columns or data here -->
                        </td>
                    </tr>';
                $stmt->close();
            }
            
            echo '      </tbody>
                  </table>
                </div>
              </div>';
            ?>
            
      



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
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
       
        </div>
      </div>
    </div>
  </div>



        


     
                     
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
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