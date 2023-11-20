<?php 
session_start();
include("conexao.php");


if(!isset($_SESSION['usuario'])){ 

    header("location: ../logred.php");
}
if(isset($_SESSION['usuario'])){ 

$id = $_SESSION['usuario'];
$sql = "SELECT nome FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

$nome = $row['nome'];

}



$sql_verify_account = "SELECT verify_account, imagem_verify FROM clientes WHERE id = $id ";
$query_verify = $mysqli -> query($sql_verify_account);


while ($row_verify = $query_verify -> fetch_assoc()){


$verif = $row_verify["verify_account"];
$imgv = $row_verify["imagem_verify"];
if( $imgv !== '' && $verif == 0){
  die ( "<style>
    body {
        background-color: #f0f0f0; /* Fundo suave */
        font-family: 'Arial', sans-serif; /* Fonte mais moderna */
    }

    .centralizado {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
    }

    .centralizado form {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        max-width: 400px;
        width: 100%;
    }

    h2 {
        color: #333;
        margin-bottom: 15px; /* Espaçamento abaixo do título */
    }

    p {
        color: #555;
        margin-bottom: 20px;
        font-size: 16px;
    }

    #foto {
        display: none;
    }

    #foto + label, input[type='submit'] {
        padding: 10px 15px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
        display: inline-block;
        margin-top: 20px;
        width: 100%; /* Ocupa toda a largura disponível */
        text-align: center;
    }

    #foto + label:hover, input[type='submit']:hover {
        background-color: #0056b3;
        transform: translateY(-2px); /* Efeito de elevação */
    }

    #foto:checked + label {
        background-color: #004192;
    }

    input[type='submit'] {
        margin-top: 30px; /* Mais espaço acima do botão de enviar */
    }
</style>
<div class='centralizado'>
    <form method='POST'>
    <a href='logout.php'> Sair </a>
        <h2>Envio de Documento</h2>
        <p>Por favor aguarde, estamos verificando seu documento para liberarmos seu acesso.</p>
        
        <p>Avisaremos assim que alguém liberar seu acesso.</p>
    </form>
</div>

    ");


    
}
if (isset($_FILES['file'])) {
    $arquivo = $_FILES['file'];
    $pasta = "../uploads/";
    $nomeArquivo = $arquivo['name'];
    $novoNome = uniqid();
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    $caminhoCompleto = $pasta . $novoNome . "." . $extensao;
    
    // Supondo que você já tenha iniciado a sessão e que o ID do usuário esteja armazenado nela
    
    $id = $_SESSION['usuario']; 



    // Move o arquivo para a pasta de uploads
    if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
        // Prepara e executa a atualização no banco de dados
        $stmt = $mysqli->prepare("UPDATE clientes SET imagem_verify = ? WHERE id = ?");

        if (!$stmt) {
            die("Erro na preparação: " . $mysqli->error);
        }

        $stmt->bind_param("si", $caminhoCompleto, $id);
        if (!$stmt->execute()) {
            echo "Erro ao atualizar no banco de dados: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao fazer upload do arquivo.";


    }

header("location: index-4.php");

}


if($verif == 0){
    die("
    <style>
    body {
        background-color: #f0f0f0; /* Fundo suave */
        font-family: 'Arial', sans-serif; /* Fonte mais moderna */
    }

    .centralizado {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
    }

    .centralizado form {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        max-width: 400px;
        width: 100%;
    }

    h2 {
        color: #333;
        margin-bottom: 15px; /* Espaçamento abaixo do título */
    }

    p {
        color: #555;
        margin-bottom: 20px;
        font-size: 16px;
    }

    #foto {
        display: none;
    }

    #foto + label, input[type='submit'] {
        padding: 10px 15px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
        display: inline-block;
        margin-top: 20px;
        width: 70%; /* Ocupa toda a largura disponível */
        text-align: center;
    }

    #foto + label:hover, input[type='submit']:hover {
        background-color: #0056b3;
        transform: translateY(-2px); /* Efeito de elevação */
    }

    #foto:checked + label {
        background-color: #004192;
    }

    input[type='submit'] {
        margin-top: 30px; /* Mais espaço acima do botão de enviar */
    }
</style>
<div class='centralizado'>
<form method='POST' enctype='multipart/form-data'>
    <h2>Envio de Documento</h2>
    <a href='logout.php'> Sair </a>

    <p>Por favor, envie uma foto do seu documento para liberarmos seu acesso.</p>
    <input type='file' name='file' id='foto' accept='image/*' required>
    <label for='foto'>Enviar Documento com foto</label>
    <input type='submit' value='Enviar'>
    <p>Avisaremos assim que alguém liberar seu acesso.</p>
</form>
</div>

    ");

}
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

$sql = "SELECT tipe, block FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {
$block = $row["block"];

if ($block === '1') {
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
            <h2>Usuário Bloqueado</h2>
            <p>Este usuário foi bloqueado por um administrador do sistema.</p>
            <p>Por favor, entre em contato com o suporte para mais informações.</p>
        </div>
    </div>
    ");
}else{

$block = false;

}


    $tipe = $row['tipe'];
    if ($tipe >= 1) {
header("location: ../../argon-dashboard-master/pages/dashboard.php");

}
}
}


$sql23 = "SELECT * FROM edit_screen";
$query23 = $mysqli -> query($sql23);
if ($query23->num_rows > 0) {
    while ($row23 = $query23->fetch_assoc()) {
        $text1 = $row23["box1"];
        $text2 = $row23["box2"];
        $text3 = $row23["box3"];
        $desc3 = $row23["desc3"];
        $desc2 = $row23["desc2"];
        $desc1 = $row23["desc1"];
        $icon1= $row23["icon1"];
        $icon2= $row23["icon2"];
        $icon3= $row23["icon3"];
    }
} else {
   
    $text1 = "Ainda não foi editado";
    $text2 = "Ainda não foi editado";
    $text3 = "Ainda não foi editado";
    $desc3 = "Ainda não foi editado";
    $desc2 = "Ainda não foi editado";
    $desc1 = "Ainda não foi editado";
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
        <link rel="stylesheet" href="../css/index-4.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>

        <style>




#escrita{
color: white;

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
                                    <a href="index-4.php"><img src="assets/img/logo/logo4.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-7">
                                <div class="categories_menu">
                                    <div class="categories_title">
                                        <h2 class="categori_toggle"> Todas cartegorias</h2>
                                    </div>
                                    <div class="categories_menu_inner">
                                       
 


                                                    <li class="seila"><a id="red" href="../shop.php?cartegoria=eletronico">Eletronicos</a>
                                                        
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
                                <button class="blue" onclick="red()"><i class='ion-ios-cart-outline'></i> Venha comprar</button>
                                    <div class="cart_link">
                                        <?php
                                        if(isset($_SESSION["usuario"])){
                                        echo "<a href='cart.php?idd=$id'><i class='ion-ios-cart-outline'></i>My Cart</a>";
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
                                  
                                                <h1 id="escrita"> Sejam bem vindo ao<br><strong> Nosso market place</strong></h1>
                                      
                                                <a id="escrita" href="../shop.php">venha comprar agora</a>
                                                
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="single_slider slider_two">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                      
                                            <div class="slider_content">
                                  
                                                <h1 id="escrita"><strong>Somos o mais diferente </strong><br> e dinamicos do pais </h1>
                                                <h3>venha com a gente</h3>
                                         
                                                <a id="escrita" href="../shop.php">compre agora</a>
                                             
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
                                                <span class="<?php echo $icon1 ?>"></span>
                                            </div>
                                            <div class="shipping_content">
                                                <h3><?php echo $text1 ?></h3>
                                                <p>   <?php echo $desc1 ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_shipping">
                                            <div class="shipping_icone">
                                                <span class="<?php echo $icon2 ?>"></span>
                                            </div>
                                            <div class="shipping_content">
                                            <h3><?php echo $text2 ?></h3>
                                                <p>   <?php echo $desc2 ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_shipping column_3">
                                            <div class="shipping_icone">
                                                <span class="<?php echo $icon3 ?>"></span>
                                            </div>
                                            <div class="shipping_content">
                                            <h3><?php echo $text3 ?></h3>
                                                <p>   <?php echo $desc3 ?></p>
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
    
       <div class="row">
          
       <?php 
// Prepare the SQL query

// Prepara a consulta SQL

// Prepara a consulta SQL
$consulta = $mysqli->prepare("SELECT id, imagem, nome, preco, stock FROM `produto` WHERE tipe = 0 ORDER BY `id` DESC LIMIT 4");
$consulta->execute();

// Associa as colunas do seu resultado às variáveis
$consulta->bind_result($idProduto, $imagemProduto, $nomeProduto, $precoProduto, $estoqueProduto);

// Itera sobre cada linha do resultado
while ($consulta->fetch()) {
    $imagemProduto = htmlspecialchars($imagemProduto);
    $nomeProduto = htmlspecialchars($nomeProduto);
    $precoFormatado = number_format($precoProduto, 2, ',', '.');

    ?>

    <div class="col-lg-3">
        <div class="single_product"> 
            <div class="product_thumb">
                <a href="../product-details.php?id_prod=<?php echo $idProduto; ?>"><img src="../uploads/<?php echo $imagemProduto; ?>" width="250px" height="250px" alt=""></a>
            </div> 
            <div class="product_content">   
                <h3><a href="../product-details.php?id_prod=<?php echo $idProduto; ?>"><?php echo $nomeProduto; ?></a></h3>
                <div class="product_price">
                    <span class="current_price">R$<?php echo $precoFormatado; ?></span>
                </div>
                <div class="product_action">
                    <ul>
                        <?php if(isset($_SESSION["usuario"])): ?>
                            <?php  
                            if ($estoqueProduto > 0) {
                                echo "<li class='product_cart'>
                                    <a href='../product-details.php?id_prod=$idProduto' title='Adicionar ao carrinho'>Detalhes</a>
                                </li>";
                            } else {
                                echo "<li class='product_cart'>
                                    <button class='not' disabled title='Adicionar ao carrinho'>SEM ESTOQUE</button>
                                </li>";
                            }
                            ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>    
        </div>
    </div>

    <?php 
}
$consulta->close();
?>


                
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
                   
                    <!--brand area end-->

                    <a href="https://1518.3cx.cloud/instapet" target="_blank">
    <img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/live-chat-2388830-2011859.png" class="floating-icon" alt="Icon Link">
</a>

            
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
            <li><a href="../contact.html">Fale Conosco</a></li>
          
            <li><a href="my-account.php">Minha Conta</a></li>
        </ul>
    </div>
</div>
<div class="col-lg-2 col-md-4 col-sm-6">
    <div class="single_footer">
        <h3>Informações</h3>
        <ul>
            <li><a href="sobre.html">Sobre Nós</a></li>
            <li><a href="php/faq.html">Informações de Entrega</a></li>
            <li><a href="termos.html">Política de Privacidade</a></li>
            <li><a href="termos.html">Termos & Condições</a></li>
            <li><a href="php/faq.html">Perguntas Frequentes</a></li>
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
    

		<!-- all js here -->
        <script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
       
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>


        <script>

function red(){

window.location.href = "../shop.php";

}




        </script>
    </body>
</html>
