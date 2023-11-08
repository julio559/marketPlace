<?php 

include("conexao.php");
if (!isset($_SESSION)) {
    session_start();
}




// Garanta que $_SESSION['usuario'] esteja definido
if (isset($_SESSION['usuario'])) {
    $userId = $_SESSION['usuario'];

$ver = "SELECT tipe FROM clientes WHERE id = $userId";
$q = $mysqli->query("$ver");
while ($row = $q->fetch_assoc()) {
if($row['tipe'] !== '1' ){
header("location: index-4.php");

}
}


    $stmt = $mysqli->prepare("SELECT COUNT(*) as item_count FROM carrinho WHERE id_usuario = ?");
    $stmt->bind_param("i", $userId);  // "i" indica que estamos passando um valor inteiro

    // Execute a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Pegue o resultado
    if ($row = $result->fetch_assoc()) {
        $itemCount = $row['item_count'];
    } else {
        $itemCount = 0; // ou algum valor padrão se algo der errado
    }

    $stmt->close();
} else {
    $itemCount = 0;  // ou algum valor padrão se $_SESSION['usuario'] não estiver definido
}
if (isset($_SESSION['usuario'])) {
$id = $_SESSION['usuario'];

$sql = "SELECT nome FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

$nome = $row['nome'];

}
}else{



}



$sql = "SELECT faturamento, valor_meta FROM faturamento_mensal WHERE id_usuario = $id";
$query = $mysqli->query($sql);
while ($row = $query -> fetch_assoc()) {
$fat = $row["faturamento"];
$valor_meta = $row["valor_meta"];

}



?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard GIGAR</title>

    <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cigar - shop fullwidth</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/bundle.css">
        <link rel="stylesheet" href="../assets/css/plugins.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.css">
    <style>



.floating-icon {
	background-color: #28a745;
	padding: 5px;
	border-radius: 30px;
	color: white;
    position: fixed;      /* Make the icon's position fixed to the viewport */
    bottom: 20px;         /* Position it 20px above the bottom edge */
    right: 20px;          /* Position it 20px from the right edge */
    width: 50px;          /* Set the icon's width (adjust as needed) */
    height: 50px;         /* Set the icon's height (adjust as needed) */
    z-index: 1000;        /* Ensure the icon stays on top of other elements */
}

        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
        }

  
        .dashboard-content {
            width: 90%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 20px;
        }

        .stat-box {
            background-color: #2971f5;
           border-radius: 10px;
            flex: 1;
            padding: 15px;
            border: 1px solid #e0e0e0;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 10px;
        }



        

        .stat-box:first-child {
            margin-left: 0;
        }

        .stat-box:last-child {
            margin-right: 0;
        }

        h2 {
            margin: 0;
            font-size: 20px;
            color: white;
        }

        p {
            font-size: 24px;
            color: white;
        }

        canvas {
            
            width: 1300px; /* Ajuste de largura */
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

#imgP{
  
    border-radius: 20px ;
    padding: 6px;
    background-color: #FF1493;
margin-right: 10px ;
width: 36px;

}

#imgP2{
  
  border-radius: 20px ;
  padding: 6px;
  background-color: #2ECC71;
margin-right: 10px ;
width: 36px;

}
#imgP3{
  
  border-radius: 20px ;
  padding: 6px;
  background-color: #FFC107;
margin-right: 10px ;
width: 36px;

}




    </style>
</head>

<body>
  

  <!-- Add your site or application content here -->
  <a href="https://1518.3cx.cloud/instapet" target="_blank">
    <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/live-chat-2388830-2011859.png" class="floating-icon" alt="Icon Link">
</a>
    
            
            <!--header area start-->
            <header class="header_area">
                <!--header top start-->
                <div class="header_top top_four">
                    <div class="container-fluid">   
                        <div class="row align-items-center">

                            <div class="col-lg-6 col-md-6">
                                <div class="welcome_text">
                                  
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="top_right text-right">
                                    <ul>
                                       <li class="top_links"><a href="#">
                                        
                                       <?php 
                                       if(isset($_SESSION['usuario'])){
                                        echo "Conta do  $nome ";
                                       }else{

echo "Fazer login";

                                       }
                                       ?> <i class="ion-chevron-down"></i></a>
                                            <ul class="dropdown_links">


                                            <?php 
                                       if(isset($_SESSION['usuario'])){

                                           echo     "<li><a href='php   /cart.php'> Meu carrinho </a></li>";
                                       }

                                       ?>
                                                <?php 
                                       if(isset($_SESSION['usuario'])){

                                           echo    " <li><a href='my-account.php?id=$id'> conta de $nome </a></li>";


                                       }else{

                                        echo "<li><a href='../logred.php'> fazer login </a></li>";

                                       }
                                       ?>
                           <?php 
                                       if(isset($_SESSION['usuario'])){

                                           echo     "<li><a href='pedidosAbertos.php'> reclamações abertas </a></li>";
                                       }

                                       ?>
                                                
                                            </ul>
                                        </li> 
                                        <li class="currency"><a href="#">BRL <i class="ion-chevron-down"></i></a>
                                            <ul class="dropdown_currency">
                                                <li><a href="#">EUR</a></li>
                                                <li><a href="#">USD</a></li>
                                            </ul>
                                        </li>
                                      
                                    </ul>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                <!--header top start-->
                
                <!--header middel start-->
                <div class="header_middel">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4">
                                <div class="logo">
                                    <a href="php/index-4.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-5">
                                <div class="search_bar">
                                    <form action="pesquisar.php">
                                        <input placeholder="Search entire store here..." name="pesquisa" type="text">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="cart_area">
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header middel end-->
                
                <!--header bottom satrt-->
                <div class="header_bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-5">
                                <div class="categories_menu">
                                    <div class="categories_title">
                                        <h2 class="categori_toggle"> Menu </h2>
                                    </div>
                                    <div class="categories_menu_inner">
                                        <ul>
                                            <li class="categorie_list"><a href="#"> Ver usuarios <i class="fa fa-angle-right"></i></a>
                                                <ul class="categories_mega_menu">
                                                    <li><a href="#">Todos usuarios</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="../usuarios.php?very=<?php echo "1"?>">Administrativos</a></li>
                                                                <li><a href="../usuarios.php?very=<?php echo "0"?>">Usuarios padrões da plataforma</a></li>
                                                                <li><a href="../usuarios.php?very=<?php echo "full"?>">todos usuarios</a></li>
                                                              
                                                            </ul>
                                                        </div>
                                                    </li>
                                      b 
                                                        
                                                    

                                                </ul>
                                            </li>

                                            <li class="categorie_list"><a href="#"> Produtos <i class="fa fa-angle-right"></i></a>
                                                <ul class="categories_mega_menu">
                                                    <li><a href="#"> Tipos de Produtos</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="../usuarios.php?very=<?php echo "1"?>">Cosmeticos</a></li>
                                                                <li><a href="../usuarios.php?very=<?php echo "0"?>">Eletronico</a></li>
                                                                <li><a href="../usuarios.php?very=<?php echo "full"?>">Cheiro</a></li>
                                                                <li><a href="../usuarios.php?very=<?php echo "full"?>">Todos</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                             
                                                        
                                                    

                                                </ul>
                                            </li>

                                            

                                            
</ul> </div></div> </div>
<div class="col-lg-7">
    <div class="main_menu_inner">
        <div class="main_menu d-none d-lg-block">
            <ul>
                <li><a href="dashboardAdmin.php">Dashboard</a></li>
                <li><a href="Minha.php">Minha loja</a></li>
            </ul>
        </div>
    </div>
</div>

                            <div class="col-lg-2">
                                <div class="contact_phone">
                                    <div class="contact_icone">
                                        <span class="pe-7s-headphones"></span>
                                    </div>
                                    <div class="contact_number">
                                        <p>Call Us:</p>
                                        <span>(999) 1234 56789</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header bottom end-->
            </header>
            <!--header area end-->
            
            <!--breadcrumbs area start-->

            <!--breadcrumbs area end-->
            

    <div class="dashboard-content">
        <div class="stats">
            <div class="stat-box">
                
                <h2>Faturamento:</h2>
                <p> <img src="cofrinho.png" id="imgP"> R$: <?php if(isset ($fat)){ echo number_format($fat, 2, ',', '.');}else{ echo "nenhuma registro de venda feito"; } ?></p>

            </div>
            <div class="stat-box">
                <h2>Valor Meta:</h2>
                <p><img src="alvo.png"  id="imgP2"> R$: <?php if(isset ($valor_meta)){ echo number_format($valor_meta, 2, ',', '.');}else{ echo "Nenhum valor meta cadastrado"; } ?></p>
            </div>
            <div class="stat-box">
                <h2>Qtd Vendas:</h2>
                <p><img src="alvo.png"  id="imgP3"> 47.470</p>
            </div>
        </div>
        <canvas id="barChart"></canvas>
      
    </div>


    <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>



fetch('dataAPI.php')
    .then(response => response.json())
    .then(data => {
        const labels = data.map(item => item.mes);
        const faturamento = data.map(item => item.faturamento);
        const valor_meta = data.map(item => item.valor_meta);

        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Faturamento',
                    data: faturamento,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                }, {
                    label: 'Valor Meta',
                    data: valor_meta,
                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                }]
            }
        });
    });

      
    </script>
</body>

</html>
