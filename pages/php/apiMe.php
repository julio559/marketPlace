<?php

session_start();
include("conexao.php");

if(isset($_GET["id_prod"])){
$id_prod = $_GET['id_prod'];
} else {
    // Estilos atualizados para a mensagem e o botão
    echo "<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .errorMsg {
            font-size: 30px;  /* Aumento da fonte */
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
        .backBtn {
            display: block;
            padding: 15px 20px;  /* Aumento do padding */
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 18px;  /* Aumento da fonte do botão */
        }
        .backBtn:hover {
            background-color: #0056b3;
        }
        .centeredContent {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>";

    // Mensagem de erro e botão de voltar
    echo "<div class='centeredContent'>
            <div class='errorMsg'>Não há nada aqui.</div>
            <a href='php/cart.php'   class='backBtn'>Voltar</a>

          </div>";

    die();
}

if(isset($_GET["total_value"]) && isset($_GET['quantidade'])){
$total = $_GET["total_value"];
$id_client = $_SESSION['usuario'];
$quantidade = $_GET['quantidade'];

$sql2 = "INSERT INTO ordemcompra (total, status, id_prod, id_cliente, quantidade) VALUES('$total', 'pendente',  '$id_prod', '$id_client', '$quantidade')";
    $query = $mysqli->query($sql2);
$data = 'approved';
    if($data == 'approved') {
        $quantidade = $_GET['quantidade'];
      $sql = "UPDATE produto SET stock = stock - $quantidade WHERE id = $id_prod";
      $quer = $mysqli -> query($sql);
      
      
      }

}else{ 

    
    

$sql = "SELECT preco FROM produto WHERE id = $id_prod";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $preco = $row['preco'];
} else {
    echo "Produto não encontrado!";
    exit;
}

$id_client = $_SESSION['usuario'];

}
?>