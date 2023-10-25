<?php    
include("carrinho.php");



?>



<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cigar - cart page</title>
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
                <div class="header_top">
                    <div class="container">   
                        <div class="row align-items-center">

                            <div class="col-lg-6 col-md-6">
                                <div class="welcome_text">
                                    <p>England's Fastest Online Shopping Destination</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="top_right text-right">
                                    <ul>
                                       <li class="top_links"><a href="#">Conta do <?php echo $nome; ?> <i class="ion-chevron-down"></i></a>
                                            <ul class="dropdown_links">
                                                <li><a href="wishlist.html">My Wish List </a></li>
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
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="main_menu_inner">
                                    <div class="main_menu d-none d-lg-block"> 
                                        <ul>
                                            <li><a href="index-4.php">Home <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li><a href="index-4.php">Home 1</a></li>
                                                 
                                                </ul>
                                            </li>
                                            <li class="active"><a href="shop.html">shop <i class="fa fa-angle-down"></i></a>
                                                <ul class="mega_menu">
                                                    <li><a href="#">Shop Layouts</a>
                                                        <ul>
                                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                   
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">other Pages</a>
                                                        <ul>
                                                           
                                                            <li><a href="cart.html">cart</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="my-account.html">my account</a></li>
                                                            

                                                        </ul>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                         
                                        
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>

                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>  
                                            <ul>
                                            <li><a href="index-4.html">Home</a>
                                                <ul>
                                                    <li><a href="index-4.html">Home </a></li>
                                                  
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">shop</a>
                                                <ul>
                                                    <li><a href="#">Shop Layouts</a>
                                                        <ul>
                                                            <li><a href="shop-fullwidth.html">Full Width</a></li>

                                                        </ul>
                                                    </li>
                                                    <li><a href="#">other Pages</a>
                                                        <ul>
                                                            <li><a href="portfolio.html">portfolio</a></li>
                                                            <li><a href="portfolio-details.html">portfolio details</a></li>
                                                            <li><a href="cart.html">cart</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="my-account.html">my account</a></li>
                                                            

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
            <div class="breadcrumbs_area commun_bread">
                <div class="container">   
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <h3>cart</h3>
                                <ul>
                                    <li><a href="index-4.html">home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            <!--breadcrumbs area end-->
      
             <!--shopping cart area start -->
            <div class="shopping_cart_area">
                <div class="container">  
                    <form action="#"> 
                        <div class="row">
                            <div class="col-12">
                                <div class="table_desc">
                                    <div class="cart_page table-responsive">
                                        <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                           <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                            <td class="product_thumb"><a href="#"><img src="assets/img/cart/cart6.jpg" alt=""></a></td>
                                            <td class="product_name"><a href="#">Handbag fringilla</a></td>
                                            <td class="product-price">£65.00</td>
                                            <td class="product_quantity"><input min="1" max="100" value="1" type="number"></td>
                                            <td class="product_total">£130.00</td>


                                        </tr>

                                      

                                    </tbody>
                                </table>   
                                    </div>  
                                    <div class="cart_submit">
                                        <button type="submit">update cart</button>
                                    </div>      
                                </div>
                             </div>
                         </div>
                         <!--coupon code area start-->
                      
                                <div class="col-lg-6 col-md-6">
                                    <div class="coupon_code right">
                                        <h3>Cart Totals</h3>
                                        <div class="coupon_inner">
                                           <div class="cart_subtotal">
                                               <p>Subtotal</p>
                                               <p class="cart_amount">£215.00</p>
                                           </div>
                                           <div class="cart_subtotal ">
                                               <p>Shipping</p>
                                               <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                                           </div>
                                           <a href="#">Calculate shipping</a>

                                           <div class="cart_subtotal">
                                               <p>Total</p>
                                               <p class="cart_amount">£215.00</p>
                                           </div>
                                           <div class="checkout_btn">
                                               <a href="#">Proceed to Checkout</a>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--coupon code area end-->
                    </form> 
                </div>     
            </div>
             <!--shopping cart area end -->
            
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
                    
                       
                                            </form>
                                            <!-- mailchimp-alerts Start -->
                                            <div class="mailchimp-alerts text-centre">
                                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                            </div><!-- mailchimp-alerts end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--newsletter area end-->
                    </div>    
                </div>
            </div>
            <!--shipping area end-->
            
            <!--footer area start-->
         
                  
              
            <!--footer area end-->
            
       

    
		
		<!-- all js here -->
        <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
    </body>
</html>
