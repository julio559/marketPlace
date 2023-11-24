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
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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




  body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
  }
  .carrinho {
    width: 60%;
    background-color: #fff;
    margin: 30px auto;
    padding: 20px;
    border: 1px solid #e1e1e1;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  .carrinho-header {
    border-bottom: 2px solid #e1e1e1;
    padding-bottom: 10px;
    margin-bottom: 20px;
  }
  .carrinho-header h3 {
    margin: 0;
    color: #333;
    font-size: 1.5em;
  }
  .carrinho-item {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e1e1e1;
  }
  .carrinho-item img {
    width: 100px;
    margin-right: 15px;
  }
  .carrinho-info {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .carrinho-info h4 {
    margin: 0 0 10px 0;
    font-size: 1.2em;
    color: #333;
  }
  .carrinho-info p {
    margin: 0;
    font-size: 0.9em;
    color: #666;
  }
  .action-buttons {
    display: flex;
    align-items: center;
  }
  .action-buttons button {
    background-color: #2971f5;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-left: 10px;
    border-radius: 4px;
    cursor: pointer;
  }
  .action-buttons button:first-child {
    margin-left: 0;
  }
  .price {
    font-weight: bold;
    color: #333;
    font-size: 1.4em;
    margin-right: 10px;
  }
  .subtotal {
    text-align: right;
    margin-top: 20px;
    font-size: 1.4em;
    font-weight: bold;
    color: #333;
  }


  .payment {
  
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-top: 20px; /* Espaço acima do subtotal e do botão */
}

.ppa{

padding: 30px;
background-color: white;
border: 5px;
}

.subtotal {
  font-size: 18px; /* Tamanho da fonte do subtotal */
  margin-bottom: 10px; /* Espaço entre o subtotal e o botão */
}

.btn-payment {
  background-color: #2971f5; /* Cor amarela do botão */
  color: white; /* Cor do texto do botão */
  border: none;
  padding: 10px 50px; /* Padding para tornar o botão mais largo */
  border-radius: 20px; /* Bordas arredondadas */
  cursor: pointer;
  font-size: 18px; /* Tamanho da fonte do botão */
  text-transform: uppercase; /* Texto em maiúsculas */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Sombra no botão */
  /* Borda amarela para manter a forma do botão ao focar ou clicar */
}

.btn-payment:hover {
  background-color: #2971f5; /* Cor do botão quando passa o mouse */
}

.btn-payment:focus {
  outline: none; /* Remove o contorno que aparece ao focar o botão */
}

@media (max-width: 768px) {
  .payment {
    align-items: center; /* Centraliza o botão em telas menores */
  }
}

@media screen and (max-width: 768px) {
    .carrinho {
      flex-direction: column;
    }

    .carrinho-item {
      flex-direction: column;
      text-align: center;
    }

    .carrinho-item img {
      max-width: 100%;
    }
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
                                <h3>Carrinho</h3>
                                <ul>
                                    <li><a href="index-4.php">pagina inicial</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>carrinho</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            <!--breadcrumbs area end-->
       
             <!--shopping cart area start -->
             <div class="carrinho">
  <div class="carrinho-header">
    <h3>Carrinho de compras</h3>
  </div>

  <?php
  $isEmpty = true;
  $subtotal = 0;
  while ($row = $query->fetch_assoc()):
    $isEmpty = false;
    $quantidade = is_numeric($row['quantidade']) ? $row['quantidade'] : 1;
    $preco = is_numeric($row['preco']) ? $row['preco'] : 0;
    $total = $quantidade * $preco;
    $subtotal += $total;
    $itemId = $row['id'];

    $sql2 = "SELECT id_vendedor FROM produto WHERE id = $itemId";
    $que = $mysqli -> query($sql2);
    while( $row2 = $que -> fetch_assoc()){

$id_vendor = $row2['id_vendedor'];
$sql3 = "SELECT nome FROM clientes WHERE id = $id_vendor";
$que3 = $mysqli -> query($sql3);
while($row3 = $que3 -> fetch_assoc()){

$nome_vendor = $row3['nome'];

}

    }
  ?>


  <div class="carrinho-item">
    <img src="../uploads/<?php echo $row['imagem']; ?>" alt="<?php echo htmlspecialchars($row['produto_nome']); ?>">
    <div class="carrinho-info">
      <h4><?php echo htmlspecialchars($row['produto_nome']); ?></h4>
      <p>Em estoque</p>
      <p>Vendido por: <?php echo $nome; ?></p>
    </div>
    <div class="price">
      R$<?php echo number_format($preco, 2, ',', '.'); ?>
    </div>
    <div class="action-buttons">
    <form method="POST" action="cart.php">
  <input type="hidden" name="id_cart" value="<?php echo $row['id']; ?>">
  <button type="submit" class="delete-item-btn" name="delete_item">
    <i class="fa fa-trash-o"></i> 
  </button>
</form>
      <button type="button">Compartilhar</button>
    </div>
  
    <div class="quantity">
  <form method="POST" action="cart.php">
    <input class="quantity-input" min="1" max="99" value="<?php echo $quantidade; ?>" type="number" name="numero" data-prod-id="<?php echo $row['id_prod']; ?>">
  </form>

    </div>
    <div class="total">
      R$<?php echo number_format($total, 2, ',', '.'); ?>
    </div>
  </div>

  <?php endwhile; ?>

  <?php if ($isEmpty): ?>
  <div class="carrinho-empty">
    <p>SEU CARRINHO AINDA ESTÁ VAZIO</p>
  </div>
  <?php else: ?>
  <div class="subtotal">
<?php echo $query->num_rows; ?> produto(s)
  </div>
  <?php endif; ?>
</div>
             
<div class="payment">
    <div class="pa">
        <div class="ppa">
  <div class="subtotal"> Subtotal (<?php echo $query->num_rows; ?> produto(s)): R$<?php echo number_format($subtotal, 2, ',', '.'); ?></div>
  <form action="confirm_payment.php" method="GET" id="qr-code-form">
  <?php
  $query->data_seek(0); // Resetando o ponteiro do resultado se necessário
  while ($row = $query->fetch_assoc()):
  ?>

<input type="hidden" id="total_value" name="total_value" value="<?php echo $subtotal ?>">
<input type="hidden" name="id_prod" value="<?php echo $row['id_prod']; ?>">
<input type="hidden" name="quantidade" value="<?php echo $row['quantidade']; ?>">

 
  <?php endwhile; ?>
  <button type="submit" class="btn-payment">Fechar pedido</button>
  </form>
</div>     
</div>     
</div>    <!--coupon code area end-->
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

$(document).ready(function() {
  $('.quantity-input').on('blur', function() {
    console.log("Blur event triggered");
    var productId = $(this).data('prod-id');
    var newQuantity = $(this).val();
    console.log(productId, newQuantity);
    $.ajax({
      url: 'updateCart.php',
      type: 'POST',
      data: { product_id: productId, quantity: newQuantity },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          $('.subtotal').text(`Subtotal (${response.num_items} produto(s)): R$${response.subtotal}`);
          $('.total').text(`R$${response.subtotal}`);
          
          // Calcule o novo valor total e defina-o no campo oculto
          $('#total_value').val(response.subtotal);

        } else {
          console.error("Erro ao atualizar o carrinho.");
        }
      },
      error: function(request, status, error) {
        console.error("Erro na requisição AJAX: ", request.responseText);
      }
    });
  });
});



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


$(document).on('click', '.delete-item-btn', function(e) {
  e.preventDefault();

  var btn = $(this);
  var carrinhoItem = btn.closest('.carrinho-item');
  var formData = new FormData(btn.closest('form')[0]);

  btn.prop('disabled', true);

  $.ajax({
      type: "POST",
      url: "remove_item.php", // A URL do seu script de remoção
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function(response) {
          if(response.status === "success") {
              carrinhoItem.fadeOut(300, function() {
                  $(this).remove();
                  // Aqui você pode recalcular o subtotal, se necessário
              });
          } else {
              alert('Houve um erro ao remover o item.');
          }
      },
      error: function() {
          alert('Erro na chamada AJAX.');
      },
      complete: function() {
          btn.prop('disabled', false);
      }
  });
});

</script>


    </body>
</html>
