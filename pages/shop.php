<?php 

include("php/conexao.php");
if (!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION["usuario"])) {
    header("location: ../../argon-dashboard-master/pages/sign-in.php");

}
if (isset($_SESSION['usuario'])) {
    $userId = $_SESSION['usuario'];

    // Prepare a consulta
    $stmt = $mysqli->prepare("SELECT COUNT(*) as item_count FROM carrinho WHERE id_usuario = ?");
    $stmt->bind_param("i", $userId);  // "i" indica que estamos passando um valor inteiro

    // Execute a consulta
    $stmt->execute();

    // Associa a coluna do resultado à variável
    $stmt->bind_result($itemCount);

    // Pegue o resultado
    if ($stmt->fetch()) {
        // $itemCount já está definido pela função bind_result
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



$sql33 = "SELECT online FROM plataform";
$query33 = $mysqli -> query($sql33);
while ($row33 = $query33 -> fetch_assoc()) {
$on = $row33["online"];
if( $on === '1'){

    die("
    <style>
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .blocked-user-container {
        background-color: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
        max-width: 500px;
        width: 100%;
        box-sizing: border-box;
    }

    .blocked-user-container h2 {
        color: #d9534f;
        margin-bottom: 20px;
        font-size: 22px;
    }

    .blocked-user-container p {
        color: #333;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    </style>
    <div class='modal-overlay'>
        <div class='blocked-user-container'>
            <h2>Plataforma fora do ar</h2>
            <p>A plataforma esta fora do ar ainda sem previsão para voltar</p>
            <p>Por favor, entre em contato com o suporte para mais informações.</p>
        </div>
    </div>
    ");


}

}






?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cigar - shop fullwidth</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	
		<link rel="stylesheet" href="css/buttonLike.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bundle.css">
        <link rel="stylesheet" href="assets/css/plugins.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <style>
    .disabled-link {
        pointer-events: none; /* Evita que seja clicável */
        cursor: default; /* Muda o cursor para o padrão */
        color: #aaa; /* Torna a cor cinza para parecer inativo */
    }


    .seila {
  /* Adiciona uma borda cinza na parte de baixo do elemento */
  border-bottom: 1px solid gray;
  padding: 10px; /* Ajuste o espaçamento interno conforme necessário */
}

/* Estilo para o link dentro do elemento 'seila' */
.seila a {
  /* Define a cor do texto do link como preto */
  color: black;
  /* Remove a decoração padrão do link (sublinhado) */
  text-decoration: none;
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

                                           echo     "<li><a href='php   /cart.php'> Meu carrinho </a></li>";
                                       }

                                       ?>
                                                <?php 
                                       if(isset($_SESSION['usuario'])){

                                           echo    " <li><a href='php/my-account.php?id=$id'> conta de $nome </a></li>";


                                       }else{

                                        echo "<li><a href='../logred.php'> fazer login </a></li>";

                                       }
                                       ?>


<?php 
                                       if(isset($_SESSION['usuario'])){

                                           echo     "<li><a href='desejos.php'> Lista de desejos </a></li>";
                                       }

                                       ?>

                                               <?php 


                                            if(isset($_SESSION["usuario"])){
                                              echo "  <li><a href='logout.php'>LOG OUT</a></li>";
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
                                    <a href="php/index-4.php"><img src="uploads/imagem_2023-11-21_142434627.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-5">
                                <div class="search_bar">
                                    <form action="php/pesquisar.php">
                                        <input placeholder="Search entire store here..." name="pesquisa" type="text">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="cart_area">
                              
                                    <div class="cart_link">

                                        <a href="php/cart.php"><i class="ion-ios-cart-outline"></i>Meu carrinho</a>
                                        <span class="cart_count"><?php echo $itemCount; ?></span>
                                 
                                    </div>
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
                                        <h2 class="categori_toggle"> Todas cartegorias</h2>
                                    </div>
                                    <div class="categories_menu_inner">
                                        
                                        <?php 

$sql2 = "SELECT * FROM cartegoria";
$quer2 = $mysqli -> query($sql2);
while( $row = $quer2 -> fetch_assoc() ){

$cartegoria = $row['cartegoria'];
echo "     <li class='seila'><a id='red' href='shop.php?cartegoria=$cartegoria'>$cartegoria</a>
                                                        
</li>";

}
?>

                                            
</div></div> </div>
                            <div class="col-lg-7">
                                <div class="main_menu_inner">
                                    <div class="main_menu d-none d-lg-block"> 
                                        <ul>
                             
                                          
                                            
                                            <li><a href="contact.html">Fale conosco</a></li>
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
                                        <p>Ligue para:</p>
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
            <div class="breadcrumbs_area">
                <div class="container">   
                    <div class="breadcrumbs_inner">  
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb_content">
                                    <h3>shop</h3>
                                    <ul>
                                        <li><a href="index.html">home</a></li>
                                        <li><i class="fa fa-angle-right"></i></li>
                                        <li>shop</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            <!--breadcrumbs area end-->
            
            <!--shop wrapper start-->
            <div class="shop_wrapper shop_fullwidth">
                <div class="container">
                     <!--shop toolbar start-->
                    <div class="row">
                        <div class="col-12">
                            <div class="shop_toolbar">

                                <div class="list_button">
                                    <ul class="nav" role="tablist">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="ion-grid"></i></a>
                                        </li>
                                   
                                    </ul>
                                </div>
                              
                                            
                            </div>
                        </div>
                    </div>        
                    <!--shop toolbar end-->
                            
                     <!--shop tab product-->
                     <div class="shop_tab_product">   
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="large" role="tabpanel">
            <div class="row">

            <?php
// Suponho que você já tenha estabelecido a conexão $mysqli
include("php/conexao.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : 'position';

switch ($orderby) {
    case 'price_low':
        $orderStatement = "ORDER BY preco ASC";
        break;
    case 'price_high':
        $orderStatement = "ORDER BY preco DESC";
        break;
    case 'name_desc':
        $orderStatement = "ORDER BY nome DESC";
        break;
    case 'name_asc':
        $orderStatement = "ORDER BY nome ASC";
        break;
    case 'in_stock':
        $orderStatement = "ORDER BY stock DESC";
        break;
    default:
        $orderStatement = "";
}


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 8;
$offset = ($page - 1) * $perPage;

$totalQuery = "SELECT COUNT(*) as total FROM produto";
$totalResult = $mysqli->query($totalQuery);
$totalRows = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $perPage);

$query = "SELECT * FROM produto WHERE tipe = 1 $orderStatement LIMIT $perPage OFFSET $offset";
$result = $mysqli->query($query);


?>

<!--shop toolbar start-->
<div class="shop_toolbar">
    <div class="select_option">
    <label>Ordenar Por</label>
    <select name="orderby" id="short1" onchange="location.href='?orderby='+this.value">
    <option value="position" <?php echo ($orderby == 'position') ? 'selected' : ''; ?>>Posição</option>
    <option value="price_low" <?php echo ($orderby == 'price_low') ? 'selected' : ''; ?>>Preço: Menor</option>
    <option value="price_high" <?php echo ($orderby == 'price_high') ? 'selected' : ''; ?>>Preço: Maior</option>
    <option value="name_desc" <?php echo ($orderby == 'name_desc') ? 'selected' : ''; ?>> Z para A</option>
    <option value="name_asc" <?php echo ($orderby == 'name_asc') ? 'selected' : ''; ?>> A para Z</option>
    <option value="in_stock" <?php echo ($orderby == 'in_stock') ? 'selected' : ''; ?>>Em Estoque</option>
</select>
    </div>
</div>
<!--barra de ferramentas da loja termina-->

<!--produtos da aba da loja-->
<div class="produtos_aba_loja">   
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="large" role="tabpanel">
            <div class="row">

<?php
include("php/conexao.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : 'position';
$whereStatement = "";
switch ($orderby) {
    case 'price_low':
        $orderStatement = "ORDER BY preco ASC";
        break;
    case 'price_high':
        $orderStatement = "ORDER BY preco DESC";
        break;
    case 'name_desc':
        $orderStatement = "ORDER BY nome DESC";
        break;
    case 'name_asc':
        $orderStatement = "ORDER BY nome ASC";
        break;
    case 'in_stock':
        $whereStatement = "WHERE stock > 1";
        $orderStatement = "ORDER BY stock DESC";
        break;
    default:
        $orderStatement = "";
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 8;
$offset = ($page - 1) * $perPage;

$whereStatement = '';  // Adicionamos isso para inicializar a variável
if(isset($_GET['categoria'])) {
    $categoria = $mysqli->real_escape_string($_GET['categoria']);  // Proteção contra SQL Injection
    $whereStatement = "WHERE categoria = '$categoria'";
}

$totalQuery = "SELECT COUNT(*) as total FROM produto $whereStatement";  // Modificamos aqui para considerar a categoria
$totalResult = $mysqli->query($totalQuery);
$totalRows = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $perPage);

$query = "SELECT * FROM produto WHERE tipe = 1 $whereStatement $orderStatement LIMIT $perPage OFFSET $offset";  // Modificamos aqui também
$result = $mysqli->query($query);

function checkIfProductIsInWishlist($product_id, $user_id) {
    global $mysqli;

    $query = "SELECT COUNT(*) FROM wish WHERE id_prod = ? AND id_usuario = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ii", $product_id, $user_id);
    $stmt->execute();

    // Vincula o resultado da consulta à variável
    $stmt->bind_result($count);
    $stmt->fetch();

    $stmt->close();

    return $count > 0;
}


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {




        
?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="single_product"> 
                <div class="product_thumb">
                <a href="product-details.php?id_prod=<?php echo $row['id'] ?>"><img src="uploads/<?php  echo $row['imagem'] ?>" width="250px" height="250px" alt=""></a>
                </div> 
                <div class="product_content">   
                    <div class="product_ratting">
               <?php echo   $isLiked = checkIfProductIsInWishlist($row['id'], $_SESSION['usuario']);
$likedClass = $isLiked ? "liked" : "";

echo '<button id="wishButton" class="heart-button ' . $likedClass . '" data-prod-id="' . $row['id'] . '" data-user-id="' . $_SESSION['usuario'] . '">❤</button>';
 ?>
                    </div>
                    <h3><a href="product-details.php"><?php echo $row['nome']; ?></a></h3>
                  

                    <div class="product_price">
                        <span class="current_price">R$<?php echo number_format($row['preco'], 2, ',', '.'); ?></span>
                    </div>
                    <div class="product_action">
                        <ul>
                            <?php  
if (isset($_SESSION['usuario'])) { 
    $id = $row['id'];
    if ($row['stock'] <= 0) {
        echo "<li class='product_cart'><a href='#' class='disabled-link' disabled title='sem estoque'>Sem estoque</a></li>";
    } else {
        echo "<li class='product_cart'><a href='php/cart.php?id=$id' title='Add to Cart'>Add to Cart</a></li>";
    }
} else {
    echo "<li class='product_cart'><a href='product-details.php?id_prod=" . $row['id'] . "' title='ver detalhes'>ver detalhes</a></li>";
}

                            
                            ?>
                        </ul>
                    </div>
                </div>    
            </div>
        </div>
<?php
    }
} else {
    echo "Nenhum produto encontrado!";
}
?>

<div class="row">
    <div class="col-12">  
        <div class="pagination_style fullwidth">
            <ul>
                <?php
          $orderbyLink = isset($orderby) ? '&orderby=' . $orderby : ''; // Verifica se $orderby está definido.
          $categoryLink = isset($_GET['categoria']) ? '&categoria=' . $_GET['categoria'] : ''; // Verifica se categoria está no URL.
          
          for ($i = 1; $i <= $totalPages; $i++) {
              if ($i == $page) {
                  echo '<li class="current_number">' . $i . '</li>';
              } else {
                  echo '<li><a href="?page=' . $i . $orderbyLink . $categoryLink . '">' . $i . '</a></li>';
              }
          }
                ?>
            </ul>
        </div>
    </div>      
</div>

   
              <!--shipping area start-->
            <div class="shipping_area shipping_contact ">
                <div class="container">
                    <div class="shipping_contact">   
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="single_shipping">
                                    <div class="shipping_icone">
                                        <span class="pe-7s-call"></span>
                                    </div>
                                    <div class="shipping_content">
                                        <h3>(999) 0800 56789</h3>
                                        <p>suporte gratis 0800</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single_shipping">
                                    <div class="shipping_icone">
                                        <span class="pe-7s-mail"></span>
                                    </div>
                                    <div class="shipping_content">
                                        <h3>Support@exemplo.com.br</h3>
                                        <p>Suporte de compras!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single_shipping column_3">
                                    <div class="shipping_icone">
                                        <span class="pe-7s-timer"></span>
                                    </div>
                                    <div class="shipping_content">
                                        <h3>Seg - Sex / 8:00 - 18:00</h3>
                                        <p>Trabalhamos plea sua segurança</p>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        
                        
		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

        <script>
document.querySelectorAll('.heart-button').forEach(button => {
    button.addEventListener('click', function() {
        let productId = this.getAttribute('data-prod-id');
        let userId = this.getAttribute('data-user-id');

        fetch('addToWishlist.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `product_id=${productId}&user_id=${userId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.liked) {
                    button.classList.add('liked');
                } else {
                    button.classList.remove('liked');
                }
            } else {
                console.error("Erro ao atualizar lista de desejos");
            }
        });
    });
});


function pagesR(){

window.location.href = "contact.html"
}

</script>

    </body>
</html>
