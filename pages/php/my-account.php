<?php  
include("conexao.php");

session_start();

if(!isset($_SESSION["usuario"])){

header("location: ../logred.php");

}
$id = $_SESSION["usuario"];

$sql  = "SELECT nome, endereco FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);  
while($row = $query -> fetch_assoc()) {

 $endereco = $row['endereco'];
$nome = $row['nome'];   
}

if( isset($_POST['endereco'])) {

$endereco = $_POST['endereco'];   

$sql = "UPDATE clientes SET endereco = '$endereco' WHERE id = $id";
$query = $mysqli -> query($sql);
header("location: my-account.php");
}

?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cigar - my account</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                                            <li><a href="index-4.php">Home <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub_menu">
                                                    <li><a href="index.html">Home 1</a></li>
                                                    
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">shop <i class="fa fa-angle-down"></i></a>
                                                <ul class="mega_menu">
                                                    <li><a href="#">Shop Layouts</a>
                                                        <ul>
                                                            <li><a href="../shop-fullwidth.html">Full Width</a></li>
                                                         
                                                        </ul>
                                                    </li>
                                                </ul>
                                            
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>

                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>  
                                            <ul>
                                            <li><a href="index.html">Home</a>
                                                <ul>
                                                    <li><a href="index.html">Home 1</a></li>
                                                    <li><a href="index-2.html">Home 2</a></li>
                                                    <li><a href="index-3.html">Home 3</a></li>
                                                    <li><a href="index-4.html">Home 4</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">shop</a>
                                                <ul>
                                                    <li><a href="#">Shop Layouts</a>
                                                        <ul>
                                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                            <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                            <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                            <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                                            <li><a href="shop-list.html">List View</a></li>
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
                                                    <li><a href="#">Product Types</a>
                                                        <ul>
                                                            <li><a href="product-details.html">product details</a></li>
                                                            <li><a href="product-sidebar.html">product sidebar</a></li>
                                                            <li><a href="product-gallery.html">product gallery</a></li>
                                                            <li><a href="product-slider.html">product slider</a></li>
                                                            
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">blog</a>
                                                <ul>
                                                    <li><a href="#">Blog Layouts</a>
                                                        <ul>

                                                            <li><a href="blog-details.html">blog details</a></li>
                                                            <li><a href="blog-sidebar.html">blog  Sidebar</a></li>
                                                            <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">blog Pages</a>
                                                        <ul>
                                                            <li><a href="#">Author</a></li>
                                                            <li><a href="blog-sidebar.html">Category</a></li>
                                                            <li><a href="#">Blog tag</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Post Formats</a>
                                                        <ul>
                                                            <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                            <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                            <li><a href="blog-sidebar.html">Gallery Format</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">pages</a>
                                                <ul>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="services.html">services</a></li>
                                                    <li><a href="faq.html">Frequently Questions</a></li>
                                                    <li><a href="login.html">login</a></li>
                                                    <li><a href="my-account.html">my account</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="404.html">Error 404</a></li>
                                                    <li><a href="compare.html">Compare</a></li>
                                                    <li><a href="coming-soon.html">Coming soon</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">converse com nosco</a></li>
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
                                <h3>conta de <?php echo $nome; ?></h3>
                                <ul>
                                    <li><a href="index.html">home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>my account</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            <!--breadcrumbs area end-->
      
             <!-- my account start  -->
            <section class="main_content_area">
                <div class="container">   
                    <div class="account_dashboard">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <!-- Nav tabs -->
                                <div class="dashboard_tab_button">
                                    <ul role="tablist" class="nav flex-column dashboard-list">
                                      
                                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Ordens de compra</a></li>
                                     
                                        <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                                        <li><a href="#account-details" data-toggle="tab" class="nav-link">Detalhes da conta</a></li>
                                        <li><a href="logout.php" class="nav-link">sair</a></li>
                                    </ul>
                                </div>    
                            </div>
                            <div class="col-sm-12 col-md-9 col-lg-9">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard_content">
                                    <div class="tab-pane fade show active" id="dashboard">
                                        <h3>minha conta </h3>
                                        <p>Aqui você podera ver alguns detalhes da sua conta como </br> compras, endereço etc  </p>
                                    </div>
                                    <div class="tab-pane fade" id="orders">
                                        <h3>Orders</h3>
                                        <div class="coron_table table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>	 	 	 	
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>May 10, 2018</td>
                                                        <td><span class="success">Completed</span></td>
                                                        <td>$25.00 for 1 item </td>
                                                        <td><a href="cart.html" class="view">view</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>May 10, 2018</td>
                                                        <td>Processing</td>
                                                        <td>$17.00 for 1 item </td>
                                                        <td><a href="cart.html" class="view">view</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                 
                                      
                                    <div class="tab-pane" id="address">
                                      
                                        <h4 class="billing-address">endereço de <?php echo $nome;?></h4>
                                      
                                        <p><strong><?php echo $endereco;?></strong></p>
                                        <address>
                                  <?php echo $endereco;?>
                                        </address>
                                        <p>Bangladesh</p>   
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
editar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">

      <input type="text" placeholder="altere o endereço" required name="endereco">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

                                    </div>
                                    
                                    <div class="tab-pane fade" id="account-details">
                                        <h3>Account details </h3>
                                        <div class="login">
                                            <div class="login_form_container">
                                                <div class="account_login_form">
                                                    <form action="#">
                                                       
                                                        <div class="input-radio">
                                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                                        </div> <br>
                                                        <label>First Name</label>
                                                        <input type="text" name="first-name">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last-name">
                                                        <label>Email</label>
                                                        <input type="text" name="email-name">
                                                        <label>Password</label>
                                                        <input type="password" name="user-password">
                                                        <label>Birthdate</label>
                                                        <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday">
                                                        <span class="example">
                                                          (E.g.: 05/31/1970)
                                                        </span>
                                                        <br>
                                                        <span class="custom_checkbox">
                                                            <input type="checkbox" value="1" name="optin">
                                                            <label>Receive offers from our partners</label>
                                                        </span>
                                                        <br>
                                                        <span class="custom_checkbox">
                                                            <input type="checkbox" value="1" name="newsletter">
                                                            <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                        </span>
                                                        <div class="save_button primary_btn default_button">
                                                            <a href="#">Save</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>        	
            </section>			
            <!-- my account end   --> 

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
                     
                        <!--newsletter area end-->
                    </div>    
                </div>
            </div>
            <!--shipping area end-->
            
            <!--footer area start-->
            <div class="footer_area">
                <div class="container">
                    <div class="footer_top">
                        <div class="row">
                            <div class="col-lg-4 col-md-8">
                                <div class="single_footer">
                                    <div class="footer_logo">
                                        <a href="#"><img src="assets/img/logo/logo.png" alt=""></a>
                                    </div>
                                    <div class="footer_desc">
                                        <p>We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.</p>
                                    </div>
                                    <div class="footer_contact">
                                        <ul>
                                            <li><i class="ion-location"></i> Ullenhall, Henley-in-Arden B578 5CC, England</li>
                                            <li><i class="ion-ios-telephone"></i> +123.456.789 - +123.456.678/li>
                                            <li><i class="ion-ios-email"></i> <a href="#">support@plazathemes.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="single_footer">
                                    <h3>Information</h3>
                                    <ul>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Warranty</a></li>
                                        <li><a href="#">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                           
            <!--footer area end-->

		<!-- all js here -->
        <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
</script>

    </body>
</html>
