<?php
// Inclui o arquivo de conexão e inicia a sessão
include '../../pages/php/conexao.php';
session_start();

// Redireciona o usuário se ele não estiver logado
if (!isset($_SESSION["usuario"])) {
    header("location: ../../pages/logred.php");
    exit; // Não esqueça de chamar exit após o redirecionamento.
}

$id = $_SESSION['usuario'];
$sql = "SELECT tipe FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

    $tipe = $row['tipe'];
if($tipe != '1'){
header("location: ../../pages/php/index-4.php");

}
}


// Verifica se o formulário foi enviado
if (isset($_POST['meta'])) {
    // Armazena o valor da meta e o ID do usuário da sessão
    $meta = $_POST['meta'];
    $id = $_SESSION['usuario'];

    // Prepara uma consulta para verificar se a meta já existe para o usuário
    $sqlCheck = "SELECT id FROM meta_venda WHERE id_usuario = ?";
    $stmtCheck = $mysqli->prepare($sqlCheck);
    if ($stmtCheck) {
        // Vincula o ID do usuário à consulta e executa
        $stmtCheck->bind_param("i", $id);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        $stmtCheck->close();

        // Decide entre UPDATE ou INSERT dependendo se a meta já existe
        if ($result->num_rows > 0) {
            // UPDATE se a meta já existe
            $sql23 = "UPDATE meta_venda SET valor_meta = ? WHERE id_usuario = ?";
        } else {
            // INSERT se a meta não existe
            $sql23 = "INSERT INTO meta_venda (valor_meta, id_usuario) VALUES (?, ?)";
        }

        // Prepara a declaração para INSERT ou UPDATE
        $stmt23 = $mysqli->prepare($sql23);
        if ($stmt23) {
            // Vincula os parâmetros e executa a consulta
            $stmt23->bind_param("ii", $meta, $id);
            $stmt23->execute();
          

            // Verifica se a operação foi bem-sucedida
            if ($stmt23->affected_rows > 0) {
            
            } 
            
        } else {
            echo "Erro ao preparar a consulta: " . $mysqli->error;
        }
    } else {
        echo "Erro ao preparar a consulta de verificação: " . $mysqli->error;
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
.imgprod{

border-radius: 50px;

}
.white{
color: white;

}



</style>

</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" ../pages/dashboard.php " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Dashboard admin</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">
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
            <span class="nav-link-text ms-1">Tabelas</span>
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
          <a class="nav-link " href="tickets.php">
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
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
                <span class="d-sm-inline d-none"><?php    
            $id_usuario = $_SESSION['usuario'];
            $sql_name = "SELECT nome FROM clientes WHERE id = $id_usuario ";
            $queque = $mysqli -> query($sql_name);
            while( $row332 = $queque -> fetch_assoc() ){

$nome = $row332["nome"];
echo " <a href='profile.php' class='white'> $nome </a>";

            } ?> </span>
              </a>
            </li>

         
            <li class="nav-item d-flex align-items-center">

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
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
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
                 
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total de vendas hoje</p>
                    <?php

$id = $_SESSION['usuario'];

$sql = "SELECT SUM(total) AS total
FROM ordemcompra
WHERE DATE(data) = CURDATE() AND status = 'completa' and id_vendedor = $id ";

$query = $mysqli -> query($sql);
if( $query->num_rows > 0) {
while ($row = $query -> fetch_assoc()) {

  $total = $row['total'];
  $total_formatado = number_format($total, 2, ',', '.');
echo "

<h5 class='font-weight-bolder'>
R$: $total_formatado
</h5>


";

}
}else{

echo "Nenhuma Venda registrada hoje";

}

?>

             
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Valor meta</p>
                    <h5 class="font-weight-bolder">
                    <?php   

$valor_meta = "Meta não definida";
                    $sql3 = "SELECT valor_meta FROM meta_venda WHERE id_usuario = $id";
                    $query3 = $mysqli -> query($sql3);
                   
                   if(mysqli_num_rows($query3) == 0) {


echo  $valor_meta;

echo "<button type=\"button\" class=\"btn btn-primary\" id=\"btn-close\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModalBox44\">
  editar meta
</button>
<!-- Modal Box 2 -->
<div class=\"modal fade\" id=\"exampleModalBox44\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabelBox44\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabelBox44\">Digite a meta desejada</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"post\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"Escreva aqui\" name=\"meta\" required>
                    </br>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fechar</button>
                <button type=\"submit\" class=\"btn btn-primary\">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>";


                   }else{
                    while( 
                      $row3 = $query3 -> fetch_assoc()
                    ){


$valor_meta = $row3['valor_meta'];
$total_meta = number_format($valor_meta, 2, ',', '.');
echo  " R$: $total_meta";

echo "<button type=\"button\" class=\"btn btn-primary\" id=\"btn-close\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModalBox44\">
  Atualizar meta
</button>
<!-- Modal Box 2 -->
<div class=\"modal fade\" id=\"exampleModalBox44\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabelBox44\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabelBox44\">Digite a meta desejada</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form method=\"post\">
                    <input type=\"text\" class=\"form-control\" placeholder=\"Escreva aqui\" name=\"meta\" required>
                    </br>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fechar</button>
                <button type=\"submit\" class=\"btn btn-primary\">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>";


                    }  
                  }       
                  
                  
                    ?>
                    </h5>
                    </div>
                    </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total de usuarios </p>
                    <h5 class="font-weight-bolder">
                     <?php    
                  $sql2 = "SELECT * FROM clientes"; // Substitua 'clientes' pelo nome correto da sua tabela.
                  $query2 = $mysqli->query($sql2);
                  
                  // Verifique se a consulta foi bem-sucedida antes de tentar contar as linhas.
                  if ($query2) {
                    $num_rows = mysqli_num_rows($query2); // Armazena o número de linhas retornadas pela consulta.
                    $num_rows_formatted = number_format($num_rows, 0, ',', '.');
                   echo $num_rows_formatted;
                  } else {
                      echo "Erro na consulta: " . $mysqli->error; // Exibe a mensagem de erro se a consulta falhou.
                  }
                  
                     ?>
                    </h5>
                 
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total de vendas realizadas  </p>
                    <h5 class="font-weight-bolder">
                

<?php
// ...

$total_vendas = 0;
$sql44 = "SELECT COUNT(*) AS total_vendas
FROM ordemcompra
WHERE status = 'completa' and id_vendedor = $id";

$query44 = $mysqli->query($sql44);

if ($query44->num_rows > 0) {
    $row44 = $query44->fetch_assoc();
    $total_vendas = $row44['total_vendas']; // Pega o total de vendas
}

$total_for = number_format($total_vendas, 0, ',', '.');
echo $total_for;

// ...
?>

                    </h5>
                  
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Overview de vendas</h6>
              <p class="text-sm mb-0">
          
             
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card card-carousel overflow-hidden h-100 p-0">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSywqAduLRLZNJF1CGFnG0ekH23EoHLaFgxKA&usqp=CAU');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-camera-compact text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Seja o maior vendedor</h5>
                    <p>do nosso marketplace</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-2.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Venda mais rapido com nossa aplicação</h5>
                    <p><a href="https://www.agendor.com.br/blog/como-atrair-clientes/" > aprenda a chamar a atenção do comprador  </a> </p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-3.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Share with us your design tips!</h5>
                    <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Vendas mais recentes</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>

<?php    

$sql34 = "SELECT * FROM ordemcompra WHERE id_vendedor = $id AND status = 'completa' ORDER BY id DESC LIMIT 3";

$query34 = $mysqli->query($sql34);
if($query34 -> num_rows > 0){
while( $row34 = $query34 -> fetch_assoc()){

  $ordem = $row34['id'];
$total32 = $row34['total'];
$total_for32 = number_format($total32, 0, ',', '.');
$id_prod = $row34['id_prod'];
$id_comprador = $row34['id_cliente'];

$sql1235455 = "SELECT * FROM clientes WHERE id = $id_comprador";
$query1235455 = $mysqli -> query($sql1235455);
while($row1234555 = $query1235455 -> fetch_assoc()){
$nome_cliente = $row1234555['nome'];

}
$sql12354 = "SELECT * FROM produto WHERE id = $id_prod";
$query12354 = $mysqli -> query($sql12354);
while($row12345 = $query12354 -> fetch_assoc()){

$nome_prod = $row12345['nome'];
$imagem = $row12345['imagem'];
}

echo "


<tr>
  <td class='w-30'>
    <div class='d-flex px-2 py-1 align-items-center'>
      <div>
        <img src='../../pages/uploads/$imagem' alt='Country flag' width='50px' height='50px' class='imgprod'>
       
      </div>
      <div class='ms-4'>
        <p class='text-xs font-weight-bold mb-0'>Nome do produto:</p>
        <h6 class='text-sm mb-0'>$nome_prod</h6>
      </div>
    </div>
  </td>
  <td>
    <div class='text-center'>
      <p class='text-xs font-weight-bold mb-0'>Numero da venda:</p>
      <h6 class='text-sm mb-0'>$ordem</h6>
    </div>
  </td>
  <td>
    <div class='text-center'>
      <p class='text-xs font-weight-bold mb-0'>Valor total:</p>
      <h6 class='text-sm mb-0'>R$$total_for32</h6>
    </div>
  </td>
  <td class='align-middle text-sm'>
    <div class='col text-center'>
      <p class='text-xs font-weight-bold mb-0'>Comprador:</p>
      <h6 class='text-sm mb-0'>$nome_cliente</h6>
    </div>
  </td>
</tr>

";


}
}

?>

                
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Cartegorias</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                
              
              
             
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-tag text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">

<?php 
$id_usu = $_SESSION['usuario'];
$total_tickets = "0";

$sql_ticket = "SELECT * FROM refound WHERE id_vendor = $id_usu";
  $query_ticket = $mysqli -> query($sql_ticket);
  while($row_ticket = $query_ticket->fetch_assoc()){
    $total_tickets++;
  }

?>
<a href = "tickets.php ">
                      <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                      <span class="text-xs"> <?php echo $total_tickets ?> </span>

                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                </a>
                </li>
                
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-tag text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">

<?php 
$id_usu = $_SESSION['usuario'];
$total_ordem = "0";

$sql_ticket = "SELECT * FROM ordemcompra WHERE id_cliente = $id_usu";
  $query_ticket = $mysqli -> query($sql_ticket);
  while($row_ticket = $query_ticket->fetch_assoc()){
    $total_ordem++;
  }

?>
<a href = "ordemcompra.php ">
                      <h6 class="mb-1 text-dark text-sm">Ordens de compras</h6>
                      <span class="text-xs"> <?php echo $total_ordem ?> </span>

                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                </a>
                </li>

                
              </ul>
            </div>
          </div>
        </div>
      </div>
     


      
  </main>
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


  <?php
// Consulta SQL para obter os dados de faturamento e meta por mês
$sql = "SELECT * FROM faturamento_mensal WHERE id_usuario = $id ORDER BY FIELD(mes, 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez')";
$query = $mysqli->query($sql);

$meses = [];
$faturamentos = [];
$metas = [];

// Verifica se a consulta foi bem-sucedida
if ($query) {
    // Processa os resultados
    while ($row= $query->fetch_assoc()) {
        $meses[] = $row['mes']; // Armazena os meses
        $faturamentos[] = $row['faturamento']; // Armazena os valores de faturamento
        $metas[] = $row['valor_meta']; // Armazena os valores das metas
    }
} else {
    echo "Erro ao realizar a consulta: " . $mysqli->error;
}

// Agora, você precisa passar esses dados para o gráfico no seu código JavaScript
?>

  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    var ctx1 = document.getElementById('chart-line').getContext('2d');
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

    var meses = <?php echo json_encode($meses); ?>;
    var faturamentos = <?php echo json_encode($faturamentos); ?>;
    var metas = <?php echo json_encode($metas); ?>;

    new Chart(ctx1, {
        type: "line",
        data: {
            labels: meses,
            datasets: [{
                label: "Faturamento",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: faturamentos,
                maxBarThickness: 6
            },
            {
                label: "Meta",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#ff872c",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: metas,
                maxBarThickness: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
});
  </script>
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