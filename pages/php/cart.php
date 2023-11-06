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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/bundle.css">
        <link rel="stylesheet" href="../assets/css/plugins.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>

        <style> 

.submit-button{

border: none;
background-color: #007bff;
color: white;
padding: 7px;
}

    .Ola{

background: none;
border: none;


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
                                        <li class="language"><a href="#"><img src="assets/img/logo/language.png" alt=""> Português <i class="ion-chevron-down"></i></a>
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
                                    <form action="pesquisar.php" method="GET">
                                        <input placeholder="Search entire store here..." name="pesquisa" type="text">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                            </div>
                         
                                    
                                      
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header middel end-->
                
             
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
                                    <li><a href="index-4.php">home</a></li>
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
                                        <th class="product_total">area de pagamento</th>
                                    </tr>
                                </thead>
                                <?php
                                $isEmpty = true;
                                while($row = $query->fetch_assoc()):
                                    $isEmpty = false;
                                
                                    
    $quantidade = is_numeric($row['quantidade']) ? $row['quantidade'] : 0;
    $preco = is_numeric($row['preco']) ? $row['preco'] : 0;
    $total = $quantidade * $preco;
?>
<tr>
    <td class="product_remove">
        <form method="POST" action="cart.php">
            <input type="hidden" name="id_cart" value="<?php echo $row['id']; ?>">
            <button type="submit" class="Ola" name="delete_item"><i class="fa fa-trash-o"></i></button>
        </form>
    </td>
    <td class="product_thumb">
        <a href="#"><img src="../uploads/<?php echo $row['imagem']; ?>" width="250px" alt=""></a>
    </td>
    <td class="product_name">
        <a href="#"><?php echo $row['produto_nome']; ?></a>
    </td>
    <td class="product-price">
        <span class="current_price">R$<?php echo number_format($row['preco'], 2, ',', '.'); ?></span>
    </td>
    <td class="product_quantity">
    <form method="POST" action="cart.php">


    <input min="1" max="<?php  if(isset($estoque)){echo $estoque;}?> " value="<?php echo $row['quantidade']; ?>" type="number" name="numero">
    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
    <button type="submit" class="submit-button">
        <i class="bi bi-arrow-clockwise"></i> 
    </button>
</form>

    </td>
    <td class="product_total">
        R$<?php echo  number_format($total, 2, ',', '.'); ?>
    </td>
    <td class="product_total">
        <form action="../mercado_pago.php" method="GET">
        <input type="hidden" name="quantidade" value="<?php echo $row['quantidade']; ?>">
            <input type="hidden" name="id_prod" value="<?php echo $row['id_prod']; ?>">
            <input type="hidden" name="total_value" value="<?php echo $total; ?>">
            <button type="submit" style="background-color: #007bff; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">comprar</button>
        </form>
    </td>
</tr>
<?php endwhile; ?>
<?php if ($isEmpty): ?>
        <tr>
            <td colspan="6" style=" font-size: 20px; text-align: center; padding: 20px;">SEU CARRINHO AINDA ESTÁ VAZIO</td>
        </tr>
    <?php endif; ?>
</table>

</tbody>


                            </table>   
                            
                        </div>  
                    </div>
                    
                </div>
            </div>
        </form>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>

    function updateQuantity(event, formElement) {
        event.preventDefault();
        
        var form = $(formElement);
        var numero = form.find("input[name='numero']").val();
        var product_id = form.find("input[name='product_id']").val();

        $.ajax({
    url: 'carrrinho.php',
    type: 'POST',  // Mudar para POST
    data: {
        id_cart: product_id,
        numero: numero
    },
            success: function(response) {
                if(response.success) {
                    alert('Quantidade atualizada com sucesso!');
                } else {
                    alert('Erro ao atualizar a quantidade.');
                }
            },
            error: function(error) {
                alert('Erro ao atualizar a quantidade.');
            }
        });
        return false;
    }




            
  $(document).off('click', '.Ola').on('click', '.Ola', function(e) {
    e.preventDefault();

    var btn = $(this);  // Referência ao botão clicado
    var parentRow = btn.closest('tr');
    var formData = new FormData(btn.closest('form')[0]);

    // Desativa o botão
    btn.prop('disabled', true);

    $.ajax({
        type: "POST",
        url: "remove_item.php",
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response) {
            if(response.status === "success") {
                parentRow.fadeOut(300, function() {
                    $(this).remove();
                });
            } else {
                alert('Houve um erro ao remover o item.');
            }
        },
        error: function() {
            alert('Erro na chamada AJAX.');
        },
        complete: function() {
            // Reativa apenas o botão que foi clicado
            btn.prop('disabled', false);
        }
    });
});

</script>


    </body>
</html>
