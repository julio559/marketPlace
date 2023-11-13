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

#nod{

    border: none;
    outline: none;
}


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
    .coupon-area {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
  }
  .coupon {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 5px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  .coupon:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  }
  .coupon h2 {
    margin: 0;
    font-size: 1.2em;
    color: #333;
  }
  .coupon p {
    margin: 5px 0;
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

                                           echo     "<li><a href='../desejos.php'> Produtos curtidos </a></li>";
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
                                        <th class="product_total">Melhor cupom</th>
                                        <th class="product_total">Forma de pagamento</th>
                                       
                                    </tr>
                                </thead>
                                <?php
$isEmpty = true;
while ($row = $query->fetch_assoc()):
    $isEmpty = false;
    $quantidade = is_numeric($row['quantidade']) ? $row['quantidade'] : 0;
    $preco = is_numeric($row['preco']) ? $row['preco'] : 0;
    $total = $quantidade * $preco;
    $itemId = $row['id'];

    // Tente encontrar um cupom de desconto aplicável
    $sql23 = "SELECT id, nome, porcentagem, valor_min FROM cupons WHERE valor_min <= $total ORDER BY porcentagem DESC LIMIT 1";
    $quer23 = $mysqli->query($sql23);
    $descontoAplicado = false;
    $valorComDesconto = $total;

    if ($row22 = $quer23->fetch_assoc()) {
        $porcentagemDesconto = $row22['porcentagem'] / 100;
        $valorComDesconto = $total - ($total * $porcentagemDesconto);
        $descontoAplicado = true;
    } ?>
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
            <input min="1" max="<?php echo $stock ?>" value="<?php echo $row['quantidade']; ?>" type="number" name="numero">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="submit-button">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </form>
    </td>
    <td class="product_total">
    <span id="total-text-<?= $itemId; ?>"><?php echo number_format($total, 2, ',', '.'); ?></span>
</td>
    <td>
    <?php  
    $sql23 = "SELECT id, nome, porcentagem, valor_min FROM cupons WHERE valor_min <= $total ORDER BY porcentagem DESC LIMIT 1";
    $quer23 = $mysqli->query($sql23);
    if ($row22 = $quer23->fetch_assoc()):
        $nome = $row22['nome'];
        $porcentagem = $row22['porcentagem'];
        $couponId = $row22['id'];
    ?>
    <div id="coupon-<?= $couponId ?>" class="coupon" onclick="applyDiscount(<?= $itemId ?>, <?= $couponId ?>, <?= $porcentagem ?>)">
        <h2><?= htmlspecialchars($nome) ?></h2>
        <p>Desconto: <?= htmlspecialchars($porcentagem) ?>%</p>
        <p>Valor mínimo: <?= htmlspecialchars($row22['valor_min']) ?> $</p>
    </div>
    <?php endif; ?>
</td>
    <td class="product_total">
    <form id="paymentForm" action="../mercado_pago.php" method="GET" onsubmit="return redirectPage(this);">

    <input type="hidden" name="quantidade" value="<?php echo $row['quantidade']; ?>">
    <input type="hidden" name="id_prod" value="<?php echo $row['id_prod']; ?>">
    <input type="hidden" name="total_value" id="total-value-<?= $itemId; ?>" value="<?php echo $descontoAplicado ? $valorComDesconto : $total; ?>">
    <select name="paymentMethod" id="paymentMethod">
        <option id="nod" value="pix">Pix</option>
        <option id="nod" value="cartao">Cartão</option>
    </select>
    <button type="submit" style="background-color: #007bff; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Comprar</button>
</form>
    </td>
</tr>
<?php endwhile; ?>
<?php if ($isEmpty): ?>
<tr>
    <td colspan="6" style="font-size: 20px; text-align: center; padding: 20px;">SEU CARRINHO AINDA ESTÁ VAZIO</td>
</tr>
<?php endif; ?>
</tbody>


                            </table>   
                            
                        </div>  
                    </div>
                    
                    
                    <div class="coupon-area">

                    <div class="coupon-container">




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



function buildQueryString(form) {
    var elements = form.elements;
    var queryString = '';
    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        if (element.type !== 'submit') {
            if (queryString !== '') {
                queryString += '&';
            }
            queryString += encodeURIComponent(element.name) + '=' + encodeURIComponent(element.value);
        }
    }
    return queryString;
}


function redirectPage(form) {
    var paymentMethod = form.paymentMethod.value; // acessa diretamente do formulário enviado
    if (paymentMethod === 'pix') {
        window.location.href = 'qrcode_pix.php?' + buildQueryString(form);
        return false; // Evita o envio do formulário
    } else if (paymentMethod === 'cartao') {
        return true; // Permite o envio do formulário
    }
}


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




  
    function applyDiscount(itemId, couponId, porcentagemDesconto) {
    var totalElement = document.getElementById('total-value-' + itemId);
    var total = parseFloat(totalElement.value);
    
    // Calcula o valor do desconto
    var valorDoDesconto = total * (porcentagemDesconto / 100);
    
    // Aplica o desconto ao valor total
    var totalComDesconto = total - valorDoDesconto;
    
    // Atualiza o valor do input com o total com desconto
    totalElement.value = totalComDesconto.toFixed(2);

    // Atualiza o texto do total na tela
    var totalTextElement = document.getElementById('total-text-' + itemId);
    if (totalTextElement) {
        totalTextElement.textContent = 'R$' + totalComDesconto.toFixed(2).replace('.', ',');
    }
    
    // Oculta o cupom da tela
    var couponElement = document.getElementById('coupon-' + couponId);
    if (couponElement) {
        couponElement.style.display = 'none';
    }
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
