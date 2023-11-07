<?php  
include("php/usuario.php");


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIGAR Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bundle.css">
        <link rel="stylesheet" href="assets/css/plugins.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .middel {
         
            padding-left: 5vw;
            padding-right: 5vw;
           padding-bottom: 5vh;
           margin-bottom: 5vh;
            margin-top: 5vh;
            padding-top: 7vh;
            margin-left: 7vw;
            margin-right: 10vw;
            background-color: #2971F5;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            background-color: white;
            padding: 10px 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #D9D9D9;
            font-weight: normal;
        }

        #pesq {
            background-color: white;
           width: 50%;
        margin-left: 20vw;
        }

        .icon-actions {
    display: flex;
    justify-content: center;
    gap: 10px;
}
.icon-actions img {
    width: 24px;
    height: 24px;
    cursor: pointer;
}

.success {
    background-color: #4CAF50;  /* Green background */
    color: white;               /* White text */
}

.error {
    background-color: #F44336;  /* Red background */
    color: white;               /* White text */
}

.notification {
    transition: opacity 0.5s;
}


    </style>
</head>

<body>
    <header class="header_area">
        <div class="header_top top_four">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="welcome_text"></div>
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
                                <li class="currency">
                                    <a href="#">BRL <i class="ion-chevron-down"></i></a>
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
                            <form action="pesquisar.php">
                                <input placeholder="Search entire store here..." name="pesquisa" type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

        

        <div id="notification" style="display: none; padding: 10px; border-radius: 5px; position: fixed; top: 20px; right: 20px; z-index: 1000;"></div>


        <div class="header_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle"> Menu </h2>
                            </div>
                            <div class="categories_menu_inner">
                                <ul>
                                    <li class="categorie_list">
                                        <a href="#"> Editar usuarios <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                            <li><a href="#">Todos usuarios</a>
                                                <div class="categorie_sub_menu">
                                                    <ul>
                                                        <li><a href="usuarios.php?very=<?php echo '1' ?>">Administrativos</a></li>
                                                        <li><a href="usuarios.php?very=<?php echo '0' ?>">Usuarios padrões da plataforma</a></li>
                                                        <li><a href="usuarios.php">todos usuarios</a></li>
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
                                    <li><a href="php/dashboardAdmin.php">Dashboard</a></li>
                                    <li><a href="Minha.php">Minha loja</a></li>
                                </ul>
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
    </header>

    <div class="breadcrumbs_area commun_bread">
                <div class="container">   
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <h3>Usuarios</h3>
                                <ul>
                                    <li><a href="dashboardAdmin.php">Dashboard</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>USUARIOS</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>


    <div class="middel">
        <form>
            <input type="text" name="pesquisar" id="pesq" placeholder="Pesquisar Usuarios">
        </form>
        <section>
        <div class="table-responsive">
            <table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(isset($_GET['very'])){
            $tipe = $_GET['very'];
            $sql = "SELECT * FROM clientes WHERE tipe = '$tipe'";
            $quet = $mysqli->query($sql);
            while ($row = $quet->fetch_assoc()){

$id23 = $row["id"];

echo "<tr id='row-$id23'>";

                echo "<td>" . htmlspecialchars($row['nome']) . "</td>";      // Supondo que sua coluna se chame 'nome'
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";     // Supondo que sua coluna se chame 'email'
                echo "<td>" . htmlspecialchars($row['numero']) . "</td>";  // Supondo que sua coluna se chame 'telefone'
                echo "<td>" . htmlspecialchars($row['cpf']) . "</td>";  
                echo '<td>';
                echo '<div class="icon-actions">';
        
                echo "<img src='https://cdn-icons-png.flaticon.com/512/4812/4812459.png' alt='Deletar' onclick='deleteFunction($id23)' />";
                echo "<img src='https://cdn-icons-png.flaticon.com/512/700/700291.png' alt='Editar' onclick='editFunction($id23)' />";


                echo '</div>';
                echo '</td>';     // Supondo que sua coluna se chame 'cpf'
                echo "</tr>";
            }
        }else{
         
            $sql = "SELECT * FROM clientes";
            $quet = $mysqli->query($sql);
            while ($row = $quet->fetch_assoc()){
                $id23 = $row["id"];
                echo "<tr id='row-$id23'>";

                echo "<td>"  .htmlspecialchars($row['nome']) . "</td>";      // Supondo que sua coluna se chame 'nome'
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";     // Supondo que sua coluna se chame 'email'
                echo "<td>" . htmlspecialchars($row['numero']) . "</td>";  // Supondo que sua coluna se chame 'telefone'
                echo "<td>" . htmlspecialchars($row['cpf']) . "</td>"; 
                echo '<td>';
                echo '<div class="icon-actions">';
             
                echo "<img src='https://cdn-icons-png.flaticon.com/512/4812/4812459.png' alt='Deletar' onclick='deleteFunction($id23)' />";

                echo "<img src='https://cdn-icons-png.flaticon.com/512/700/700291.png' alt='Editar' onclick='editFunction($id23)' />";
          
                echo '</div>';
                echo '</td>';      // Supondo que sua coluna se chame 'cpf'
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
        </div>
                  
                </tbody>
            </table>
        </section>
    </div>

    <footer>
        <!-- Aqui pode vir o conteúdo do rodapé, caso tenha. -->
    </footer>

    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#pesq').on('input', function() {
        var pesquisa = $(this).val();
        
        // Se a pesquisa não estiver vazia, faça a chamada AJAX
        if(pesquisa != "") {
            $.ajax({
                url: 'php/pesquisa.php',
                type: 'POST',
                data: { 'pesquisa': pesquisa },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        } else {
            // Se a pesquisa estiver vazia, recarregue todos os usuários
            // (ou você pode ajustar isso conforme sua necessidade)
            location.reload();
        }
    });
});





function editFunction(userId) {
    window.location.href = "editar_usuario.php?id=" + userId;
}





function deleteFunction(userId) {
    // The URL to your server-side script
    const url = 'php/delete_user.php';
    const notification = document.getElementById('notification');

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: userId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove the row from the table
            document.getElementById('row-' + userId).remove();
            
            // Display success message
            showNotification('User deleted successfully!', 'success');
        } else {
            // Display error message
            showNotification('Error deleting user: ' + data.error, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        
        // Display error message
        showNotification('An error occurred while deleting the user.', 'error');
    });
}

function showNotification(message, type) {
    const notification = document.getElementById('notification');
    notification.innerHTML = message;
    notification.classList.add(type);
    notification.style.display = 'block';
    notification.style.opacity = 1;

    setTimeout(() => {
        notification.style.opacity = 0;
        setTimeout(() => {
            notification.style.display = 'none';
            notification.classList.remove(type);
        }, 500); // wait for the opacity transition to finish before hiding
    }, 5000); // display for 5 seconds
}


</script>




</body>

</html>
