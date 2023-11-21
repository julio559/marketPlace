<?php  
include("conexao.php");

session_start();

if(!isset($_SESSION["usuario"])){

    header("location: ../../argon-dashboard-master/pages/sign-in.php");

}
$id = $_SESSION["usuario"];

$sql  = "SELECT nome, endereco, cep, email, cpf, img_perfil FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);  
while($row = $query -> fetch_assoc()) {

 $endereco = $row['endereco'];
$nome = $row['nome'];   
$email = $row['email'];   
$cep = $row['cep'];  
$cpf = $row['cpf']; 

if($row['img_perfil']  != ''){
$img_us = $row['img_perfil'];  
}else{

$img_us = false;

}
}

if( isset($_POST['endereco'])) {

$endereco = $_POST['endereco'];   

$sql = "UPDATE clientes SET endereco = '$endereco' WHERE id = $id";
$query = $mysqli -> query($sql);
header("location: my-account.php");
}

$sql  = "SELECT id, data, status, total, id_prod FROM ordemcompra WHERE id_cliente = $id";
$query = $mysqli -> query($sql);  







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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/bundle.css">
        <link rel="stylesheet" href="../assets/css/plugins.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>

<style>


#edit{

background-color: #2971f5;
color: white;
border:none;
padding: 10px ;
border-radius: 5px ;
}


.usuarioi{

border-radius: 10px;

}

    </style>

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
   
            <div class="breadcrumbs_area commun_bread">
                <div class="container">   
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <h3>conta de <?php echo $nome; ?></h3>
                                <ul>
                                    <li><a href="index-4.php">home</a></li>
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
                                     
                                        <li><a href="#address" data-toggle="tab" class="nav-link">endereço</a></li>
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
                                        <div class="coron_table table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Date</th>
                <th>Status</th>
                <th>Nome produto</th>
                <th>Total</th>
                <th>Actions</th>
                <th>reembolso</th>
            </tr>
        </thead>
        <tbody>


        <?php while($row = $query->fetch_assoc()): ?>
            
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["data"]; ?></td>
        <td><span class="<?php echo ($row["status"] == 'Completed' ? 'success' : 'processing'); ?>"><?php echo $row["status"]; ?></span></td>
        
        <?php 
$id33 = $row["id"];
if($row['status'] == 'completa'){
         $sql = "SELECT id_prod FROM ordemcompra WHERE id = $id33";
         $query23 = $mysqli -> query($sql);   
         $row325 = $query23->fetch_assoc();  
         $id_prod = $row325['id_prod'];
       
            $sql2 = "SELECT nome, id_vendedor FROM produto WHERE id = $id_prod";
            $query2 = $mysqli->query($sql2);
            $row2512 = $query2->fetch_assoc(); 
            $id_vendedor = $row2512['id_vendedor'];

            if(isset($_POST['refound'])){
                $id_133 = $_SESSION["usuario"];
            $motivo = $_POST['refound'];
            
            
            $sqlRef = "INSERT INTO refound (id_usuario, id_vendor, motivo, id_ordem) VALUES ('$id_133', '$id_vendedor', '$motivo', '$id33')";
            $queryRef = $mysqli -> query($sqlRef);    
            
            }
        }
        ?>
        <td><?php echo isset($row2512["nome"]) ? $row2512["nome"] : "Nome não encontrado"; ?></td>
        <td>R$<?php echo $row["total"]; ?></td>
        <td><a href="nf.php?id=<?php echo $row["id"]; ?>" class="view">view</a></td> 
        <?php 


           // Primeiro, busque na tabela refound
$sqlRefound = "SELECT * FROM refound WHERE id_ordem = $id33";
$resultRefound = $mysqli->query($sqlRefound);

if($row['status'] == "completa") {
    if($resultRefound->num_rows > 0) {
        // Já existe um pedido de reembolso
        echo "<td>Aguardando resposta do vendedor</td>";
    } else {
        // Mostrar botão para pedir reembolso
        echo "
        <td>
            <!-- Botão que aciona o modal -->
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal$id33'>
                Pedir reembolso
            </button>

            <!-- Modal -->
            <div class='modal fade' id='exampleModal$id33' tabindex='-1' aria-labelledby='exampleModalLabel$id33' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel$id33'>Motivo Reembolso</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <form method='POST'>
                                <input type='text' placeholder='Escreva aqui o motivo do refound' name='refound' required>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                            <button type='submit' class='btn btn-primary'>Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        ";
    }
} else {
    echo "<td><a href='#' class='view'>Compra ainda não efetuada</a></td>";
}

        ?>
    </tr>


<?php 


?>
<?php endwhile; ?>


         
        </tbody>
    </table>
</div>
                                        </div>
                                    </div>
                                 
                                      
                                    <div class="tab-pane" id="address">
                                      
                                        <h4 class="billing-address">endereço de <?php echo $nome;?></h4>
                                      
                                        <p><strong><?php echo $endereco;?></strong></p>
                                      
                                 

                                        <h4 class="billing-address">cep de <?php echo $nome;?></h4>
                                      
                                      <p><strong><?php echo $cep;?></strong></p>
                                    
                                
                                 
                                    
                                      
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


<?php   
$id_usuario = $_SESSION["usuario"];
$sql = "SELECT * FROM enderecos WHERE id_usuario = $id_usuario";
$quer = $mysqli ->query($sql); 
while($row = $quer->fetch_assoc()) {

$cep = $row["cep"];
$endereco = $row["endereco"];

echo "";
}


?>

                                    </div>
                                    
                                    <div class="tab-pane fade" id="account-details">
                                        <h3>Account details </h3>
                                        <div class="login">
                                            <div class="login_form_container">
                                                <div class="account_login_form">
                                                    <form action="#">
                                                       
                                                     
                                                    <label>Imagem de usuario</label>
                                                    <br>
                                                    <?php if($img_us == false){
                                              echo "<img class='usuarioi' src='https://png.pngtree.com/png-vector/20220608/ourlarge/pngtree-user-profile-character-faceless-unknown-png-image_4816132.png' width='150px'>";

                                                    }else{
                                                        echo "<img class='usuarioi' src='../uploads/$img_us'  width='150px'>";
                                                    }
                                                    ?>
                                                     <br>
                                                     <br>

                                                        <label>Nome</label>
                                                        <input type="text" value="<?php echo $nome; ?>" name="first-name" disabled>
                                                      
                                                        <label>Email</label>
                                                        <input type="text" value="<?php echo $email; ?>" name="email-name" disabled >
                                                        <label>CPF </label>
                                                        <input type="text" value="<?php echo $cpf; ?>" name="email-name" disabled >
                                                       
                                                       <button id="edit" type="button" onclick="editar()"> Editar informações </button>
                                                  
                                                        <br>
                                                    
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
         
            <!--footer area end-->

		<!-- JS, Popper.js e Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

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

function editar(){

window.location.href ='editar_profile.php'


}

</script>

    </body>
</html>
