<?php   
include("php\pesquisar.php");

?>




<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cigar - shop list</title>
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

                <!--header top start-->
                
                <!--header middel start-->
                <div class="header_middel">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-5">
                                <div class="search_bar">
                                    <form action="#">
                                        <input placeholder="Search entire store here..." type="text">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="cart_area">
                                    <div class="wishlist_link">
                                        <a href="#"><i class="ion-ios-heart-outline"></i></a>
                                    </div>
                                    <div class="cart_link">
                                        <a href="javascript:void(0)"><i class="ion-ios-cart-outline"></i>My Cart</a>
                                        <span class="cart_count">2</span>
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
                                            <li><a href="#"> Fashion  <i class="fa fa-angle-right"></i></a>
                                                <ul class="categories_mega_menu">
                                                    <li><a href="#">Dresses</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Sweater</a></li>
                                                                <li><a href="">Evening</a></li>
                                                                <li><a href="">Day</a></li>
                                                                <li><a href="">Sports</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><a href="#">Handbags</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Shoulder</a></li>
                                                                <li><a href="">Satchels</a></li>
                                                                <li><a href="">kids</a></li>
                                                                <li><a href="">coats</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><a href="#">shoes</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Ankle Boots</a></li>
                                                                <li><a href="">Clog sandals </a></li>
                                                                <li><a href="">run</a></li>
                                                                <li><a href="">Books</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><a href="#">Clothing</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Coats  Jackets </a></li>
                                                                <li><a href="">Raincoats</a></li>
                                                                <li><a href="">Jackets</a></li>
                                                                <li><a href="">T-shirts</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li><a href="#"> Furnitured & Decor <i class="fa fa-angle-right"></i></a>
                                                <ul class="categories_mega_menu column_3">
                                                    <li><a href="#">Chair</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Dining room</a></li>
                                                                <li><a href="">bedroom</a></li>
                                                                <li><a href=""> Home & Office</a></li>
                                                                <li><a href="">living room</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><a href="#">Lighting</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Ceiling Lighting</a></li>
                                                                <li><a href="">Wall Lighting</a></li>
                                                                <li><a href="">Outdoor Lighting</a></li>
                                                                <li><a href="">Smart Lighting</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><a href="#">Sofa</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Fabric Sofas</a></li>
                                                                <li><a href="">Leather Sofas</a></li>
                                                                <li><a href="">Corner Sofas</a></li>
                                                                <li><a href="">Sofa Beds</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#"> Toys & Hobbies <i class="fa fa-angle-right"></i></a>
                                                <ul class="categories_mega_menu column_2">
                                                    <li><a href="#">Boys' Toys</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Building Toys</a></li>
                                                                <li><a href="">Electronics Toys</a></li>
                                                                <li><a href="">action figures </a></li>
                                                                <li><a href="">specialty & boutique toy</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><a href="#">Girls' Toys</a>
                                                        <div class="categorie_sub_menu">
                                                            <ul>
                                                                <li><a href="">Dolls for Girls</a></li>
                                                                <li><a href="">Girls' Learning Toys</a></li>
                                                                <li><a href="">Arts and Crafts for Girls</a></li>
                                                                <li><a href="">Video Games for Girls</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li><a href="#"> Accessories</a></li>
                                            <li><a href="#"> Jewelry & Watches</a></li>
                                            <li><a href="#"> Health & Beauty</a></li>
                                            <li><a href="#">Books & Office</a></li>
                                            <li><a href="#"> Sport & Outdoor</a></li>
                                            <li id="cat_toggle" class="has-sub"><a href="#"> More Categories</a>
                                                <ul class="categorie_sub">
                                                    <li><a href="#"> Computer - Laptop</a></li>
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
                                            <li><a href="php\index-4.php">Home <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li><a href="index.html">Home 1</a></li>
                                                   
                                                </ul>
                                            </li>
                                            <li class="active"><a href="shop.html">shop <i class="fa fa-angle-down"></i></a>
                                                <ul class="mega_menu">
                                                    <li><a href="#">Shop Layouts</a>
                                                        <ul>
                                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                       
                                                        </ul>
                                                    </li>
                                                  

                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>  
                                            <ul>
                                            <li><a href="index-4.php">Home</a>
                                                <ul>
                                                    <li><a href="index.html">Home 1</a></li>
                                                 
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">shop</a>
                                                <ul>
                                                    <li><a href="#">Shop Layouts</a>
                                                        <ul>
                                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                         
                                                        </ul>
                                                    </li>
</div> </div>
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
         
                            <!--shop toolbar end-->
                             <!--shop tab product-->
                             <div class="shop_tab_product">   
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade " id="large" role="tabpanel">
            <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single_product"> 
                            <div class="product_thumb">
                                <div class="btn_quickview">
                                    <a href="produto.php?idProd=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#modal_box" title="Quick View"><i class="ion-ios-eye"></i></a>
                                </div>
                            </div> 
                            <div class="product_content">   
                                <div class="product_ratting">
                                    <!-- Você pode criar um loop aqui para exibir as estrelas baseado em uma coluna 'rating' ou algo similar -->
                                    <!-- Por enquanto, deixarei como está -->
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-star-outline"></i></a></li>
                                    </ul>
                                </div>
                                <h3><a href="product-details.html"><?php echo htmlspecialchars($row['nome']); ?></a></h3>
                                <div class="product_price">
                                    <span class="current_price"><?php echo $row['preco']; ?></span>
                                </div>
                                <div class="product_action">
                                    <ul>
                                        <li class="product_cart"><a href="cart.html" title="Add to Cart">Adicionar ao carrinho</a></li>
                                    </ul>
                                </div>
                            </div>    
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>


                          
                            <!--shop tab product end-->
                            
                            <!--pagination style start--> 
                            <div class="pagination_style">
                                <ul>
                                    <li class="current_number">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                            <!--pagination style end--> 
                        </div>
                    </div>
                </div>
            </div>
            <!--shop wrapper end-->
    
   
              <!--shipping area start-->
          

		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>