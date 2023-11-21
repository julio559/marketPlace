<?php 
session_start();
include("conexao.php");


if(!isset($_SESSION['usuario'])){ 

    header("location: ../../argon-dashboard-master/pages/sign-in.php");
}
if(isset($_SESSION['usuario'])){ 

$id = $_SESSION['usuario'];
$sql = "SELECT nome FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

$nome = $row['nome'];

}

$sql = "SELECT tipe FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

    $tipe = $row['tipe'];
if($tipe == '0'){
header("location: index-4.php");

}
}
}



if (isset($_POST['box1']) || isset($_POST['desc1']) || isset($_POST['iconChoice'])) {
    $text = isset($_POST['box1']) ? $_POST['box1'] : '';
    $desc1 = isset($_POST['desc1']) ? $_POST['desc1'] : '';
    $icon1 = isset($_POST['iconChoice']) ? $_POST['iconChoice'] : '';
    // Atenção à segurança: Esta linha de código está vulnerável a ataques de injeção de SQL
    $sql = "UPDATE edit_screen SET box1 = '$text', desc1 = '$desc1', icon1 = '$icon1' ";
    $query = $mysqli->query($sql);
}


if (isset($_POST['box3']) || isset($_POST['desc3']) || isset($_POST['iconChoice3'])) {
    $text3 = isset($_POST['box3']) ? $_POST['box3'] : '';
    $desc3 = isset($_POST['desc3']) ? $_POST['desc3'] : '';
    $icon3 = isset($_POST['iconChoice3']) ? $_POST['iconChoice3'] : '';
    $sql = "UPDATE edit_screen SET box3 = '$text3', desc3 = '$desc3', icon3 ='$icon3'";
    $query = $mysqli->query($sql);
}

if (isset($_POST['box2']) || isset($_POST['desc2'])|| isset($_POST['iconChoice2'])) {
    $text2 = isset($_POST['box2']) ? $_POST['box2'] : '';
    $desc2 = isset($_POST['desc2']) ? $_POST['desc2'] : '';
    $icon2 = isset($_POST['iconChoice2']) ? $_POST['iconChoice2'] : '';
    $sql = "UPDATE edit_screen SET box2 = '$text2', desc2 = '$desc2', icon2 ='$icon2' ";
    $query = $mysqli->query($sql);
}



$sql23 = "SELECT * FROM edit_screen";
$query23 = $mysqli -> query($sql23);
if ($query23->num_rows > 0) {
    while ($row23 = $query23->fetch_assoc()) {
        $text1 = $row23["box1"];
        $text2 = $row23["box2"];
        $text3 = $row23["box3"];
        $desc3 = $row23["desc3"];
        $desc2 = $row23["desc2"];
        $desc1 = $row23["desc1"];
    }
} else {
   
    $text1 = "Ainda não foi editado";
    $text2 = "Ainda não foi editado";
    $text3 = "Ainda não foi editado";
    $desc3 = "Ainda não foi editado";
    $desc2 = "Ainda não foi editado";
    $desc1 = "Ainda não foi editado";
}


if(isset ($_POST['cartegoria'])){

$cartegoria = $_POST['cartegoria'];
$sqlUP = "INSERT INTO cartegoria (cartegoria) VALUE ('$cartegoria')";
$queque = $mysqli->query($sqlUP);
header("location: dashboardPer.php");

}


?>


<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>MarketPlace do paulo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/bundle.css">
        <link rel="stylesheet" href="../assets/css/plugins.css">
        <link rel="stylesheet" href="../css/index-4.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
       <!-- Link para a biblioteca Bootstrap Icons -->
       <link rel="stylesheet" href="/bootstrap-icons/font/bootstrap-icons.css">



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

        <style>




#escrita{
color: white;

}


#btn-close{

margin-bottom: 10px;
padding-bottom: 5px;
}

.seila {
    /* Estilos comuns para todos os <li> */
    font-weight: arial;
}
#red{
color: black;

}
.custom-select {
        position: relative;
    }

    .custom-select select {
        display: none;
    }

    .custom-select .selected-option {
        display: inline-block;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: pointer;
    }

    .custom-select .selected-option i {
        margin-right: 5px;
    }

    .custom-select .options {
        display: none;
        position: absolute;
        background-color: #fff;
        border: 1px solid #ccc;
        border-top: none;
        border-radius: 0 0 4px 4px;
        z-index: 1;
    }

    .custom-select .option {
        padding: 5px 10px;
        cursor: pointer;
    }


    .seila {
    list-style: none; /* Remove os marcadores padrão de lista */
    padding: 8px 15px; /* Adiciona um pouco de espaço interno */
    margin: 5px 0; /* Adiciona um pouco de margem entre os itens da lista */
    background-color: #f2f2f2; /* Um fundo leve para os itens */
    border: 1px solid #ddd; /* Uma borda sutil */
    border-radius: 5px; /* Bordas arredondadas */
    transition: background-color 0.3s ease; /* Uma transição suave para o hover */
  }

  .seila a {
    text-decoration: none; /* Remove o sublinhado do link */
    color: #333; /* Cor do texto mais escura para contraste */
    font-weight: bold; /* Torna o texto em negrito */
    transition: color 0.3s ease; /* Suaviza a mudança de cor ao passar o mouse */
  }

  .seila:hover,
  .seila a:hover {
    background-color: #e9e9e9; /* Muda a cor de fundo ao passar o mouse */
    color: #d35400; /* Muda a cor do texto do link ao passar o mouse */
  }

  /* Aplica estilos específicos quando não há categorias */
  .seila.vazio {
    background-color: #fbeee6;
    color: #d35400;
    text-align: center; /* Centraliza o texto */
  }

            </style>
    </head>
    <body>
            <!-- Add your site or application content here -->
            
            
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

                                           echo     "<li><a href='cart.php'> Meu carrinho </a></li>";
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

                                           echo     "<li><a href='../desejos.php'> Lista de desejos </a></li>";
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
                <div class="header_middel middel_four">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-5">
                                <div class="logo">
                                    <a href="index-4.php"><img src="assets/img/logo/logo4.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-7">
                                <div class="categories_menu">
                                    <div class="categories_title">
                                        <h2 class="categori_toggle"> Todas cartegorias</h2>
                                    </div>
                                    <div class="categories_menu_inner">
                                       
 
<?php 

$sql = "SELECT * FROM cartegoria";
$quer = $mysqli->query($sql);
if ($quer->num_rows > 0) {
    while ($row2342 = $quer->fetch_assoc()) {
        $cartegoria = $row2342['cartegoria'];
      
        echo "<li class='seila'><a id='red' href='../shop.php?cartegoria=$cartegoria'>$cartegoria</a></li>";
    }
} else {
    echo "<li class='seila vazio'>Não foi registrado nenhuma categoria</li>";
}

?>


<button type="button" class="btn btn-primary" id="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModalBox44">
                          adicionar cartegoria
                        </button>
                        <!-- Modal Box 2 -->
                        <div class="modal fade" id="exampleModalBox44" tabindex="-1" aria-labelledby="exampleModalLabelBox44" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    
                                        <h5 class="modal-title" id="exampleModalLabelBox44">Digite a cartegoria que deseja add</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form  method="post">
                                        <input type="text" class="form-control" placeholder="Escreva aqui" name="cartegoria" required>
                                        </br>
                         
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
     


                                              




                                       
     
                                    </div>
                                </div>
                            </div>       
                            <div class="col-lg-4 col-md-7">        
                                <div class="search_bar">
                                    <form action="pesquisar.php" method="GET">
                                        <input placeholder="Search entire store here..." name="pesquisa" type="text">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                                    
                            </div> 
                            <div class="col-lg-2 col-md-5">
                                <div class="cart_area">
                                <button class="blue" onclick="red()"><i class='ion-ios-cart-outline'></i> Venha comprar</button>


                                
                                    <div class="cart_link">
                                        <?php
                                        if(isset($_SESSION["usuario"])){
                                        echo "<a href='cart.php?idd=$id'><i class='ion-ios-cart-outline'></i>Cart</a>";
                                        }else{

echo "<a href='../logred.php'>logar</a>";

                                        }

                                        ?>
                                         </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--mini cart end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header middel end-->
                
                <!--header bottom satrt-->
              
                <!--header bottom end-->
        
            <!--header area end-->
            
            <!--home four wrapper start-->
            <div class="home_four_wrapper">
                <div class="container-fluid">   
                    <!--slider area start-->
                    <div class="slider_four_area"> 
                        <div class="slider_area owl-carousel">
                                <div class="single_slider slider_one">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                          
                                            <div class="slider_content">
                                  
                                                <h1 id="escrita"> qualquer detalhe </strong></h1>
                                      
                                                <a id="escrita" href="../shop.php">venha comprar agora</a>
                                                
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="single_slider slider_two">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                      
                                            <div class="slider_content">
                                  
                                                <h1 id="escrita"><strong>Somos o mais diferente </strong><br> e dinamicos do pais </h1>
                                                <h3>venha com a gente</h3>
                                         
                                                <a id="escrita" href="../shop.php">compre agora</a>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                    </div>

<!--slider area end-->

<!--shipping area start-->
<!--slider area end-->

<!--shipping area start-->
<div class="shipping_area shippig_four">
    <div class="shipping_inner">
        <div class="row">
            <!-- Box 1 -->
            <div class="col-lg-4 col-md-4">
                <div class="single_shipping">
                    <div class="shipping_icone">

                    <?php 

$sql = "SELECT icon1 FROM edit_screen";
$query = $mysqli->query($sql);
while ($row = $query->fetch_assoc()) {
    $icon1 = $row["icon1"];  
    echo "<span class='bi $icon1'></span>"; // Isso vai renderizar como <span class='bi bi-pencil'></span>
    // Assumindo que você está usando Bootstrap Icons
}

?>
                     
                    </div>
                    <div class="shipping_content">
                        <h3><?php echo isset($text1) ? $text1 : "editar box"; ?></h3>
                        <p><?php echo isset($desc1) ? $desc1 : "editar descrição"; ?></p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalBox1">
                            Editar texto
                        </button>
                        <!-- Modal Box 1 -->
                        <div class="modal fade" id="exampleModalBox1" tabindex="-1" aria-labelledby="exampleModalLabelBox1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelBox1">Personalize o conteúdo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label for="box1Text" class="form-label">Texto do box:</label>
                                                <input type="text" class="form-control" id="box1Text" placeholder="Escreva aqui" name="box1" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="box1Desc" class="form-label">Descrição:</label>
                                                <input type="text" class="form-control" id="box1Desc" placeholder="Escreva a descrição" name="desc1" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="iconSelect">Escolha um ícone:</label>
                                                <select class="form-select" id="iconSelect" name="iconChoice">
  
    <option value="pe-7s-eyedropper">&#9998; Lápis</option>
    <option value="pe-7s-cash">&#128176; Dinheiro</option>
    <option value="pe-7s-cart">&#128722; Carrinho</option>
    <option value="pe-7s-cart">&#128230; Caixa</option>
   
    <!-- Adicione mais opções de ícones aqui -->
</select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 






            <!-- Box 2 -->
            <div class="col-lg-4 col-md-4">
                <div class="single_shipping">
                    <div class="shipping_icone">
                    <?php 

$sql = "SELECT icon2 FROM edit_screen";
$query = $mysqli->query($sql);
while ($row = $query->fetch_assoc()) {
    $icon2 = $row["icon2"];  
    echo "<span class='$icon2'></span>"; // Isso vai renderizar como <span class='bi bi-pencil'></span>
    // Assumindo que você está usando Bootstrap Icons
}

?>
                    </div>
                    <div class="shipping_content">
                        <h3><?php echo isset($text2) ? $text2 : "editar box"; ?></h3>
                        <p>  <?php echo isset($desc2) ? $desc2 : "editar descrição"; ?></p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalBox2">
                            Editar texto
                        </button>
                        <!-- Modal Box 2 -->
                        <div class="modal fade" id="exampleModalBox2" tabindex="-1" aria-labelledby="exampleModalLabelBox2" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    
                                        <h5 class="modal-title" id="exampleModalLabelBox2">Digite o texto desejado</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form  method="post">
                                        <input type="text" class="form-control" placeholder="Escreva aqui" name="box2" required>
                                        </br>
                                        <input type="text" class="form-control" placeholder="Escreva a descrição" name="desc2" required>
                                    </div>
                                    <div class="mb-3">
                                                <label for="iconSelect">Escolha um ícone:</label>
                                                <select class="form-select" id="iconSelect" name="iconChoice2">
  
    <option value="pe-7s-eyedropper">&#9998; Lápis</option>
    <option value="pe-7s-cash">&#128176; Dinheiro</option>
    <option value="pe-7s-cart">&#128722; Carrinho</option>
    <option value="pe-7s-cart">&#128230; Caixa</option>
   
    <!-- Adicione mais opções de ícones aqui -->
</select>
                                            </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Box 3 -->
            <div class="col-lg-4 col-md-4">
                <div class="single_shipping column_3">
                    <div class="shipping_icone">
                    <?php 

$sql = "SELECT icon3 FROM edit_screen";
$query = $mysqli->query($sql);
while ($row = $query->fetch_assoc()) {
    $icon3 = $row["icon3"];  
    echo "<span class='$icon3'></span>"; // Isso vai renderizar como <span class='bi bi-pencil'></span>
    // Assumindo que você está usando Bootstrap Icons
}

?>
     
                    </div>
                    <div class="shipping_content">
                        <h3><?php echo isset($text3) ? $text3 : "editar box"; ?></h3>
                        <p>  <?php echo isset($desc3) ? $desc3 : "editar descrição"; ?></p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalBox3">
                            Editar texto
                        </button>
                        <!-- Modal Box 3 -->
                        <div class="modal fade" id="exampleModalBox3" tabindex="-1" aria-labelledby="exampleModalLabelBox3" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelBox3">Digite o texto desejado</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form  method="post">
                                        <input type="text" class="form-control" placeholder="Escreva aqui" name="box3" required>
                                        </br>
                                        <input type="text" class="form-control" placeholder="Escreva a descrição" name="desc3" required>
                                    </div>
                                    <div class="mb-3">
                                                <label for="iconSelect">Escolha um ícone:</label>
                                                <select class="form-select" id="iconSelect" name="iconChoice3">
  
    <option value="pe-7s-eyedropper">&#9998; Lápis</option>
    <option value="pe-7s-cash">&#128176; Dinheiro</option>
    <option value="pe-7-cart">&#128722; Carrinho</option>
    <option value="pe-7s-cart">&#128230; Caixa</option>
   
    <!-- Adicione mais opções de ícones aqui -->
</select>
                                            </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>

                                        <form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shipping area end-->
         
                
                    <!--shipping area end-->
                    <!--categories banner start-->
         
                     
                    <!--categories banner end-->
                    
                     <!--product area start-->
                    <div class="produtc_area product_four">
                        <div class="row">
                            <div class="col-12">
                                <div class="product_tab_button">
                                    <ul class="nav" role="tablist">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#Products" role="tab" aria-controls="Products" aria-selected="true"> Produtos novos </a>
                                        </li>
                                  
                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
    
       <div class="row">
          
       <?php 
// Prepare the SQL query

// Prepara a consulta SQL

// Prepara a consulta SQL
$consulta = $mysqli->prepare("SELECT id, imagem, nome, preco, stock FROM `produto` WHERE tipe = 0 ORDER BY `id` DESC LIMIT 4");
$consulta->execute();

// Associa as colunas do seu resultado às variáveis
$consulta->bind_result($idProduto, $imagemProduto, $nomeProduto, $precoProduto, $estoqueProduto);

// Itera sobre cada linha do resultado
while ($consulta->fetch()) {
    $imagemProduto = htmlspecialchars($imagemProduto);
    $nomeProduto = htmlspecialchars($nomeProduto);
    $precoFormatado = number_format($precoProduto, 2, ',', '.');

    ?>

    <div class="col-lg-3">
        <div class="single_product"> 
            <div class="product_thumb">
                <a href="../product-details.php?id_prod=<?php echo $idProduto; ?>"><img src="../uploads/<?php echo $imagemProduto; ?>" width="250px" height="250px" alt=""></a>
            </div> 
            <div class="product_content">   
                <h3><a href="../product-details.php?id_prod=<?php echo $idProduto; ?>"><?php echo $nomeProduto; ?></a></h3>
                <div class="product_price">
                    <span class="current_price">R$<?php echo $precoFormatado; ?></span>
                </div>
                <div class="product_action">
                    <ul>
                        <?php if(isset($_SESSION["usuario"])): ?>
                            <?php  
                            if ($estoqueProduto > 0) {
                                echo "<li class='product_cart'>
                                    <a href='../product-details.php?id_prod=$idProduto' title='Adicionar ao carrinho'>Detalhes</a>
                                </li>";
                            } else {
                                echo "<li class='product_cart'>
                                    <button class='not' disabled title='Adicionar ao carrinho'>SEM ESTOQUE</button>
                                </li>";
                            }
                            ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>    
        </div>
    </div>

    <?php 
}
$consulta->close();
?>
                
            </div>
       </div> 
   </div>   
</div>

                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                  
                    <!--product area end-->
                    <!--home banner sction start-->
                 
                    <!--consoles product end-->

                    <!--brand area start-->
                   
                    <!--brand area end-->

                    <a href="https://1518.3cx.cloud/instapet" target="_blank">
    <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/live-chat-2388830-2011859.png" class="floating-icon" alt="Icon Link">
</a>

            
            <!--footer area start-->
            <div class="footer_area footer_four">
                <div class="container-fluid">
                    
                    <div class="footer_top">
                         <!--newsletter area start-->
                       
                            <!--newsletter area end-->
                        <div class="row">
                            <div class="col-lg-4 col-md-8">
                                <div class="single_footer">
                                    <div class="footer_logo">
                                        <a href="#"><img src="assets/img/logo/logo.png" alt=""></a>
                                    </div>
                                    <div class="footer_desc">
                                        <p>Somos o MarketPlace mais recomendado do BRASIL</p>
                                    </div>
                                    <div class="footer_contact">
                                        <ul>
                                            <li><i class="ion-location"></i> vitoria-es </li>
                                            <li><i class="ion-ios-telephone"></i> 55279999999</li>
                                            <li><i class="ion-ios-email"></i> <a href="mailto:support@exemplo.com.br">support@exemplo.com.br</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
    <div class="single_footer">
        <h3>ATENDIMENTO AO CLIENTE</h3>
        <ul>
            <li><a href="../contact.html">Fale Conosco</a></li>
          
            <li><a href="my-account.php">Minha Conta</a></li>
        </ul>
    </div>
</div>
<div class="col-lg-2 col-md-4 col-sm-6">
    <div class="single_footer">
        <h3>Informações</h3>
        <ul>
            <li><a href="sobre.html">Sobre Nós</a></li>
            <li><a href="php/faq.html">Informações de Entrega</a></li>
            <li><a href="termos.html">Política de Privacidade</a></li>
            <li><a href="termos.html">Termos & Condições</a></li>
            <li><a href="php/faq.html">Perguntas Frequentes</a></li>
        </ul>
    </div>
</div>
                       
                  
                           
                        
                        </div>
                    </div>
                </div>
                <div class="copyright_area">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright_content">
                                    <p>Copyright &copy; 2018, <a href="#">Cigar</a>. All Rights Reserved</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="footer-payment text-right">
                                    <a href="#"><img src="assets/img/visha/payment.png" alt=""></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--footer area end-->
    

		<!-- all js here -->
        <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
       
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>

function red(){

window.location.href = "../shop.php";

}

$(document).ready(function () {
    $('.selectpicker').selectpicker();
  });


        </script>
    </body>
</html>
