<?php  
include("php/details-prod.php")


?>


<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cigar - product details</title>
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
        <style> 
    #compartilhar{
padding: 15px;
        color: white;
        background-color: #2971f5;
border: none;
border-radius: 7px;


    }
    
    
    .stars-rating span {
        font-size: 24px;
        cursor: pointer;
        transition: color 0.2s;
    }

    .stars-rating span:hover, .stars-rating span.active {
        color: gold;
    }
   
    </style>
    </head>
    <body>
            <!-- Add your site or application content here -->
            
            
            <!--header area start-->
            <header class="header_area">
                <!--header top start-->
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
                                        echo "Conta do  $nome1  ";
                                       }else{

echo "Fazer login";

                                       }
                                       ?> <i class="ion-chevron-down"></i></a>
                                            <ul class="dropdown_links">


                                            <?php 
                                       if(isset($_SESSION['usuario'])){

                                           echo     "<li><a href='php/cart.php'> Meu carrinho </a></li>";
                                       }

                                       ?>
                                                <?php 
                                       if(isset($_SESSION['usuario'])){

                                           echo    " <li><a href='php/my-account.php?id=$id'> conta de $nome </a></li>";


                                       }else{

                                        echo "<li><a href='logred.php'> fazer login </a></li>";

                                       }
                                       ?>
                                               <?php 


                                            if(isset($_SESSION["usuario"])){
                                              echo "  <li><a href='php/logout.php'>LOG OUT</a></li>";
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
                                    <form action="php/pesquisar.php" method="GET">
                                        <input placeholder="Search entire store here..." name="pesquisa" type="text">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
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
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="main_menu_inner">
                                    <div class="main_menu d-none d-lg-block"> 
                                        <ul>
                                            <li><a href="php/index-4.php">Home <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li><a href="php/index-4.php">Home</a></li>
                                                   
                                                </ul>
                                            </li>
                                            <li class="active"><a href="shop.php">shop <i class="fa fa-angle-down"></i></a>
                                                <ul class="mega_menu">
                                                    <li><a href="#">Shop</a>
                                                        <ul>
                                                            <li><a href="shop.php">Shop</a></li>
                                                    
                                                        </ul>
                                                    </li>
                                                
                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>  
                                            <ul>
                                            <li><a href="php/index-4.php">Home</a>
                                                <ul>
                                                    <li><a href="index-4.php">Home</a></li>
                                                  
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">shop</a>
                                                <ul>
                                                    <li><a href="#">Shop Layouts</a>
                                                        <ul>
                                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                            
                                                        </ul>
                                                    </li>
                                                  
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                        </nav>      
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
                                    <h3>product details</h3>
                                    <ul>
                                        <li><a href="index.html">home</a></li>
                                        <li><i class="fa fa-angle-right"></i></li>
                                        <li>product details</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            <!--breadcrumbs area end-->
            
            
            <!--single product wrapper start-->
            <div class="single_product_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="product_gallery">
                                <div class="tab-content produc_thumb_conatainer">
                                    <div class="tab-pane fade show active" id="p_tab1" role="tabpanel" >
                                        <div class="modal_img">
                                            <a href="#"><img src="uploads/<?php echo $imagem?>" alt="" width="600px" height="500px"></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="p_tab2" role="tabpanel">
                                        <div class="modal_img">
                                            <a href="#"><img src="uploads/<?php echo $imagem?>" alt="" width="600px" height="500px"></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="p_tab3" role="tabpanel">
                                        <div class="modal_img">
                                            <a href="#"><img src="uploads/<?php echo $imagem?>" alt="" width="600px" height="500px"></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="p_tab4" role="tabpanel">
                                        <div class="modal_img">
                                            <a href="#"><img src="uploads/<?php echo $imagem?>" alt="" width="600px" height="500px"> </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="product_thumb_button">    
                                    <ul class="nav product_d_button" role="tablist">
                                        <li >
                                            <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="uploads/<?php echo $imagem?>" height="107px" width="118px" alt=""></a>
                                        </li>
                                        <li>
                                             <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2" aria-selected="false"><img src="assets/img/cart/cart11.jpg" alt=""></a>
                                        </li>
                                        <li>
                                           <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3" aria-selected="false"><img src="assets/img/cart/cart9.jpg" alt=""></a>
                                        </li>
                                        <li>
                                           <a data-toggle="tab" href="#p_tab4" role="tab" aria-controls="p_tab4" aria-selected="false"><img src="assets/img/cart/cart12.jpg" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_details">
                                <h3><?php echo $nome; ?></h3>
                                <div class="product_price">
                                    <span class="current_price">Preço: <br> R$<?php echo number_format($preco, 2, ',', '.'); ?></span>
                                
                                </div>
                                
                               <div class="product_description">
                               <p><?php echo $sub_descricao ?></p>
                               <p><stong>Cartegoria: </strong><?php echo $cartegoria ?></p>

                               </div>
                                <div class="product_details_action">
                                  <form method="get" action="php/cart.php">
                                    <div class="product_stock">
                                        
                                    <input type="hidden" value="<?php echo $id_prod; ?>" name="id">
                                    <input type="hidden" value="<?php echo $stock; ?>" name="estoque">
                                    <label>Estoque</label>
                                    <p> Temos <?php echo $stock ?> em estoque <p>
                                    
                                    <br>
                                        <label>Quantidade</label>
                                        
                                        <input min="1" value="1" max="<?php echo $stock?>" name="quantidade" type="number">
                                    </div>
                                    <div class="product_action_link">
                                        <ul>
                                            <?php 


                                     if ($stock > 0) {
                                        echo "<li class='product_cart'><input type='submit' title='Add to cart' value='adicionar ao carrinho'></li>";
                                    } else {
                                        echo "<li class='product_cart'><input type='button' title='Sem estoque' value='Sem estoque' disabled></li>";
                                    }
                                
                                          ?>

                                        </ul>
                                        </form>
                                    </div>
                                    <div class="social_sharing">
                                    <button id="compartilhar" onclick="copyURLToClipboard()">Compartilhar</button>

                                        <ul>
                                          
                                          
                                        </ul>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--single product wrapper end-->
            
            
             <!--product info start-->
            <div class="product_d_info">
                <div class="container">   
                    <div class="row">
                        <div class="col-12">
                            <div class="product_d_inner">   
                                <div class="product_info_button">    
                                    <ul class="nav" role="tablist">
                                        <li >
                                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">descriçao</a>
                                        </li>
                                                           <li><a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Ficha de Dados</a>   
                                                        
                                                        </li>                                       
                                                      

                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                        <div class="product_info_content">
                                            <p><?php echo  $descricao?></p>
                                        </div>    
                                    </div>
                                    <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                        <div class="product_d_table">
                                           <form action="#">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="first_child">Composições</td>
                                                            <td>Poliéster</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Estilos</td>
                                                            <td>Feminino</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Propriedades</td>
                                                            <td>Vestido Curto</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                           
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>    
            </div>  
            <!--product info end-->
        
            <!--product area start-->
            <div class="produtc_area related_Product">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="consoles_product_title">
                                <h3>Produtos relacionados</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
    <div class="product_active owl-carousel">

        <?php
        $sqnew = "SELECT * FROM produto WHERE cartegoria = '$cartegoria' LIMIT 10";
        $quet = $mysqli -> query($sqnew);
        while ($row = $quet->fetch_assoc()) {
            $nome = $row['nome'];
            $descricao = $row['descricao'];
            $id_prod = $row['id'];
            $preco = $row['preco'];
        ?>

            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="product-details.php?id_prod=<?php echo $id_prod; ?>"><img src="uploads/<?php echo $imagem; ?>" width="250px" height="250px" alt=""></a>
                        <div class="btn_quickview">
                       

                        </div>
                    </div>
                    <div class="product_content">
                        <div class="product_ratting">
                            <!-- Você pode ajustar as estrelas conforme a avaliação do produto aqui -->
                            <ul>
                                <li><a href="#"><i class="ion-star"></i></a></li>
                                <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                            </ul>
                        </div>
                        <h3><a href="product-details.php?id_prod=<?php echo $id_prod; ?>"><?php echo $nome; ?></a></h3>
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
        } // fim do while
        ?>

    </div> <!-- fim do .product_active -->
</div>
                     
                          
            <!--product area end-->
            <!--product area start-->
            
            <!--product area end-->


      

                                    
                               
                            </div>     
                        </div>
                    </div>
                </div>    
            </div>  
            
            <!--product info end-->
        
            <!--product area start-->
            
            <!--product area end-->
            <!--product area start-->
         
            <!--product area end-->


          
            <!--brand area end-->
            
           
            
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
                                        <h3>(999) 1234 56789</h3>
                                        <p>Free support line!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="single_shipping">
                                    <div class="shipping_icone">
                                        <span class="pe-7s-mail"></span>
                                    </div>
                                    <div class="shipping_content">
                                        <h3>Support@plazathemes.com</h3>
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
                        
                        <!--newsletter area start-->
                    
                                     
                              
            <!-- modal area start-->

    
		
		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        <script>
            const stars = document.querySelectorAll('.stars-rating span');
    stars.forEach(star => {
        star.addEventListener('click', function() {
            document.getElementById('rating-value').value = this.getAttribute('data-value');
            updateStars(this.getAttribute('data-value'));
        });
    });

    function updateStars(value) {
        stars.forEach(star => {
            if(star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }



        function copyURLToClipboard() {
    // Crie um elemento <textarea> temporário
    var textarea = document.createElement("textarea");
    textarea.textContent = window.location.href;  // Pega a URL atual
    textarea.style.position = "fixed";  // Evita rolar para o final da página
    document.body.appendChild(textarea);
    textarea.select();
    try {
        document.execCommand('copy');  // Tenta copiar o texto para a área de transferência
        alert('LINK copiado com sucesso!');  // Notificação de sucesso
    } catch (err) {
        alert('Falha ao copiar URL');  // Notificação de erro
    } finally {
        document.body.removeChild(textarea);  // Remove o elemento <textarea> temporário
    }
}
        </script>
    </body>
</html>
