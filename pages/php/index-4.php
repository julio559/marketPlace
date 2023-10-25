<?php 
session_start();
include("conexao.php");
if(isset($_SESSION['usuario'])){ 

$id = $_SESSION['usuario'];
$sql = "SELECT nome FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

$nome = $row['nome'];

}

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
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
                <div class="header_middel middel_four">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-5">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/img/logo/logo4.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-7">
                                <div class="categories_menu">
                                    <div class="categories_title">
                                        <h2 class="categori_toggle"> All categories</h2>
                                    </div>
                                    <div class="categories_menu_inner">
                                        <ul>
                                       
                                                    <li><a href="#">Laptop & Computers</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Digital Cameras</a></li>
                                                             
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
                                 
                                    <div class="cart_link">
                                        <?php
                                        if(isset($_SESSION["usuario"])){
                                        echo "<a href='cart.php?id=$id'><i class='ion-ios-cart-outline'></i>My Cart</a>";
                                        }else{

echo "<a href='../logred.php'>logar</a>";

                                        }

                                        ?>
                                           
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
                                                <h1> Sejam bem vindo ao<br><strong> Nosso market place</strong></h1>
                                                <h3>veja mais</h3>
                                                
                                                <a href="../shop.php">venha comprar agora</a>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="single_slider slider_two">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="slider_content">
                                                <h1><strong>Somos o mais diferente </strong><br> e dinamicos do pais </h1>
                                                <h3>venha com a gente</h3>
                                                <p>...</p>
                                                <a href="../shop.php">compre agora</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                    </div>

                    <!--slider area end-->
                     <!--shipping area start-->
                    <div class="shipping_area shippig_four">
                        <div class="shipping_inner">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_shipping">
                                            <div class="shipping_icone">
                                                <span class="pe-7s-piggy"></span>
                                            </div>
                                            <div class="shipping_content">
                                                <h3>Envio gratuito para todo o mundo</h3>
                                                <p> desenvolvido by julio </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_shipping">
                                            <div class="shipping_icone">
                                                <span class="pe-7s-rocket"></span>
                                            </div>
                                            <div class="shipping_content">
                                                <h3>Melhor Market place do BRASIL </h3>
                                                <p> desenvolvido by julio</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_shipping column_3">
                                            <div class="shipping_icone">
                                                <span class="pe-7s-help2"></span>
                                            </div>
                                            <div class="shipping_content">
                                                <h3>Somos o Market</h3>
                                           <p>desenvolvido by julio </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                    </div>
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
                            <div class="tab-pane fade show active" id="Products" role="tabpanel">
                               <div class="row">
                                    <div class="product_active_four owl-carousel">
                                        <div class="col-lg-3">
                                            <div class="single_product"> 
                                                <div class="product_thumb">
                                                     <a href="product-details.html"><img src="assets/img/product/product47.jpg" alt=""></a>
                                                   
                                                </div > 
                                                <div class="product_content">   
                                                    <div class="product_ratting">
                                                
                                                    </div>
                                                    <h3><a href="product-details.html">PRODUTO TAL</a></h3>
                                                    <div class="product_price">
                                                        <span class="current_price"> R$25,00</span>
                                                    </div>
                                                    <div class="product_action">
                                                        <ul>

                                                        <?php if(isset($_SESSION["usuario"])){
                                                        echo   "<li class='product_cart'><a href='cart.php?idProd=$id' title='Adicionar ao carrinho '> + carrinho</a></li>";
                                                        }
                                                         ?>
                                                        </ul>
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
                           </div>   
                        </div>
                    </div>
                    <!--product area end-->
                    <!--home banner sction start-->
                 
                    <!--consoles product end-->

                    <!--brand area start-->
                    <div class="brand_area brand_four">
                        <div class="brand_inner">  
                            <div class="row">
                                <div class="brand_active_four owl-carousel">
                                    <div class="col-lg-3">
                                        <div class="single_brand">
                                            <a href="#"><img src="assets/img/brand/bra1.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_brand">
                                            <a href="#"><img src="assets/img/brand/bra2.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_brand">
                                            <a href="#"><img src="assets/img/brand/bra3.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_brand">
                                            <a href="#"><img src="assets/img/brand/bra4.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_brand">
                                            <a href="#"><img src="assets/img/brand/bra5.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_brand">
                                            <a href="#"><img src="assets/img/brand/bra6.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_brand">
                                            <a href="#"><img src="assets/img/brand/bra7.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_brand">
                                            <a href="#"><img src="assets/img/brand/bra8.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>     
                    </div>
                    <!--brand area end-->

              
            <!--home four wrapper start-->
            
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
            <li><a href="#">Fale Conosco</a></li>
            <li><a href="#">Histórico de Pedidos</a></li>
            <li><a href="#">Minha Conta</a></li>
        </ul>
    </div>
</div>
<div class="col-lg-2 col-md-4 col-sm-6">
    <div class="single_footer">
        <h3>Informações</h3>
        <ul>
            <li><a href="#">Sobre Nós</a></li>
            <li><a href="#">Informações de Entrega</a></li>
            <li><a href="#">Política de Privacidade</a></li>
            <li><a href="#">Termos & Condições</a></li>
            <li><a href="#">Perguntas Frequentes</a></li>
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
            
           
            <!-- modal area start-->
            <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal_body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="modal_tab">  
                                            <div class="tab-content product-details-large">
                                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="assets/img/product/product44.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="assets/img/product/product45.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="assets/img/product/product46.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab4" role="tabpanel">
                                                    <div class="modal_tab_img">
                                                        <a href="#"><img src="assets/img/product/product47.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal_tab_button">    
                                                <ul class="nav product_navactive owl-carousel" role="tablist">
                                                    <li >
                                                        <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets/img/cart/cart5.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                         <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/img/cart/cart6.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                       <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/img/cart/cart7.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                       <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="assets/img/cart/cart8.jpg" alt=""></a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>    
                                        </div>  
                                    </div> 
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <div class="modal_right">
                                            <div class="modal_title mb-10">
                                                <h2>Handbag feugiat</h2> 
                                            </div>
                                            <div class="modal_price mb-10">
                                                <span class="new_price">$64.99</span>    
                                                <span class="old_price" >$78.99</span>    
                                            </div>
                                            <div class="modal_content mb-10">
                                                <p>Short-sleeved blouse with feminine draped sleeve detail.</p>    
                                            </div>
                                            <div class="modal_size mb-15">
                                               <h2>size</h2>
                                                <ul>
                                                    <li><a href="#">s</a></li>
                                                    <li><a href="#">m</a></li>
                                                    <li><a href="#">l</a></li>
                                                    <li><a href="#">xl</a></li>
                                                    <li><a href="#">xxl</a></li>
                                                </ul>
                                            </div>
                                            <div class="modal_add_to_cart mb-15">
                                                <form action="#">
                                                    <input min="1" max="100" step="2" value="1" type="number">
                                                    <button type="submit">add to cart</button>
                                                </form>
                                            </div>   
                                            <div class="modal_description mb-15">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>    
                                            </div> 
                                            <div class="modal_social">
                                                <h2>Share this product</h2>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>    
                                            </div>      
                                        </div>    
                                    </div>    
                                </div>     
                            </div>
                        </div>    
                    </div>
                </div>
            </div> 
            <!-- modal area start-->
            

		<!-- all js here -->
        <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
    </body>
</html>
