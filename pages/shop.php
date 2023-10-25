<?php 

include("php/conexao.php");
if (!isset($_SESSION)) {
    session_start();
}

// Garanta que $_SESSION['usuario'] esteja definido
if (isset($_SESSION['usuario'])) {
    $userId = $_SESSION['usuario'];

    // Prepare a consulta
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
		
		<!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bundle.css">
        <link rel="stylesheet" href="assets/css/plugins.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
            <!-- Add your site or application content here -->
            
            
            <!--header area start-->
            <header class="header_area">
                <!--header top start-->
                <div class="header_top">
                    <div class="container">   
                        <div class="row align-items-center">

                            <div class="col-lg-6 col-md-6">
                              
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="top_right text-right">
                                    <ul>
                                       <li class="top_links"><a href="#">My Account <i class="ion-chevron-down"></i></a>
                                            <ul class="dropdown_links">
                                           
                                                <li><a href="my-account.html">My Account </a></li>
                                                <li><a href="#">Sign In</a></li>
                                                <li><a href="#">Compare Products  </a></li>
                                            </ul>
                                        </li> 
                                        <li class="currency"><a href="#">USD <i class="ion-chevron-down"></i></a>
                                            <ul class="dropdown_currency">
                                                <li><a href="#">EUR</a></li>
                                                <li><a href="#">BRL</a></li>
                                            </ul>
                                        </li>
                                        <li class="language"><a href="#"><img src="assets/img/logo/language.png" alt=""> English <i class="ion-chevron-down"></i></a>
                                            <ul class="dropdown_language">
                                                <li><a href="#"><img src="assets/img/logo/cigar.jpg" alt=""> French</a></li>
                                                <li><a href="#"><img src="assets/img/logo/language2.png" alt="">German</a></li>
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
                                    <form action="php/pesquisar.php">
                                        <input placeholder="Search entire store here..." name="pesquisa" type="text">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="cart_area">
                              
                                    <div class="cart_link">

                                        <a href="php/cart.php"><i class="ion-ios-cart-outline"></i>My Cart</a>
                                        <span class="cart_count"><?php echo $itemCount; ?></span>
                                        <!--mini cart-->
                                         <div class="mini_cart">
                                            <div class="items_nunber">
                                                <span>2 Items in Cart</span>
                                            </div>
                                            <div class="cart_button checkout">
                                                <a href="checkout.html">Proceed to Checkout</a>
                                            </div>
                                            <div class="cart_item">
                                               <div class="cart_img">
                                                   <a href="#"><img src="assets/img/cart/cart1.jpg" alt=""></a>
                                               </div>
                                                <div class="cart_info">
                                                    <a href="#">Mr.Coffee 12-Cup</a>
                                                    <form action="#">
                                                        <input min="0" max="100" type="number">
                                                        <span>$60.00</span>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                               <div class="cart_img">
                                                   <a href="#"><img src="assets/img/cart/cart2.jpg" alt=""></a>
                                               </div>
                                                <div class="cart_info">
                                                    <a href="#">Lid Cover Cookware</a>
                                                    <form action="#">
                                                        <input min="0" max="100" type="number">
                                                        <span>$160.00</span>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="cart_button view_cart">
                                                <a href="#">View and Edit Cart</a>
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
                <div class="header_bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-5">
                                <div class="categories_menu">
                                    <div class="categories_title">
                                        <h2 class="categori_toggle"> All categories</h2>
                                    </div>
                                    <div class="categories_menu_inner">
                                        <ul>
                                            <li class="categorie_list"><a href="#">Laptop & Computer <i class="fa fa-angle-right"></i></a>
                                                <ul class="categories_mega_menu">
                                                    <li><a href="#">Headphoness</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Dell Laptops</a></li>
                                                                <li><a href="">HP Laptops</a></li>
                                                                <li><a href="">Lenovo Laptops</a></li>
                                                                <li><a href="">Apple Laptops</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><a href="#">Laptop & Computers</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Digital Cameras</a></li>
                                                                <li><a href="">Camcorders</a></li>
                                                                <li><a href="">Photo Accessories</a></li>
                                                                <li><a href="">Memory Cards</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><a href="#">Camera & Photos</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Apple Phones</a></li>
                                                                <li><a href="">Samsung Phones</a></li>
                                                                <li><a href="">Motorola Phones</a></li>
                                                                <li><a href="">Lenovo Phones</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><img src="assets/img/categorie/categorie.png" alt=""></li>
                                                        
                                                    

                                                </ul>
                                            </li>
</ul> </div></div> </div>
                            <div class="col-lg-7">
                                <div class="main_menu_inner">
                                    <div class="main_menu d-none d-lg-block"> 
                                        <ul>
                             
                                          
                                            
                                            <li><a href="contact.html">Contact Us</a></li>
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
                                <div class="select_option number">
                                    <form action="#">
                                        <label>Show:</label>
                                        <select name="orderby" id="short">
                                            <option selected value="1">9</option>
                                            <option value="1">19</option>
                                            <option value="1">30</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="select_option">
                                    <form action="#">
                                        <label>Sort By</label>
                                        <select name="orderby" id="short1">
                                            <option selected value="1">Position</option>
                                            <option value="1">Price: Lowest</option>
                                            <option value="1">Price: Highest</option>
                                            <option value="1">Product Name:Z</option>
                                            <option value="1">Sort by price:low</option>
                                            <option value="1">Product Name: Z</option>
                                            <option value="1">In stock</option>
                                            <option value="1">Product Name: A</option>
                                            <option value="1">In stock</option>
                                        </select>
                                    </form>
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
            $query = "SELECT * FROM produto";
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                // percorrer cada linha de resultado
                while ($row = $result->fetch_assoc()) {
                 
                    ?>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single_product"> 
                            <div class="product_thumb">
                            <a href="product-details.html"><img src="uploads/<?php  echo $row['imagem'] ?>" width="250px" height="250px" alt=""></a>
                          
                            </div> 
                            <div class="product_content">   
                                <div class="product_ratting">
                                  
                                </div>
                                <h3><a href="product-details.html"><?php echo $row['nome']; ?></a></h3>
                                <div class="product_price">
                                    <span class="current_price">R$<?php echo $row['preco']; ?></span>
                                </div>
                                <div class="product_action">
                                    <ul>
                                        <li class="product_cart"><a href="php/cart.php?id=<?php echo $row['id']; ?>" title="Add to Cart">Add to Cart</a></li>
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

            </div>
        </div>
    </div>
</div>

                    <!--shop tab product end-->
                    
                    <!--pagination style start--> 
                    <div class="row">
                        <div class="col-12">  
                            <div class="pagination_style fullwidth">
                                <ul>
                                    <li class="current_number">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>      
                    </div>
                    <!--pagination style end-->    
                </div>
            </div>
            <!--shop wrapper end-->
    
   
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
                                        <p>Orders Support!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single_shipping column_3">
                                    <div class="shipping_icone">
                                        <span class="pe-7s-timer"></span>
                                    </div>
                                    <div class="shipping_content">
                                        <h3>Mon - Fri / 8:00 - 18:00</h3>
                                        <p>Working Days/Hours!</p>
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

function pagesR(){

window.location.href = "contact.html"
}

</script>

    </body>
</html>
