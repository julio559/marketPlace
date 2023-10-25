<?php  
session_start();
include("conexao.php");


if(isset($_SESSION["usuario"]) ) {	
$id = $_SESSION['usuario'];
$SQL = "SELECT nome FROM clientes WHERE id = $id";
$quet = $mysqli -> query($SQL);
while($row = $quet -> fetch_assoc()) {
$nome = $row["nome"];

}
}else{ 

$notLOG = "Você ainda nao esta logado ";

}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
            color: #333;
        }

        h2 {
            background-color: #2971f5;
            padding: 20px;
            margin: 0;
            color: #fff;
            text-align: center;
            font-size: 28px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .container {
            margin: 30px;
        }

        .search-bar {
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .search-bar input[type="text"] {
            padding: 15px;
            width: 70%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .search-bar input[type="submit"] {
            padding: 15px 30px;
            background-color: #2971f5;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px;
            transition: background 0.3s;
        }

        .search-bar input[type="submit"]:hover {
            background-color: #165ad7;
        }

        .produto {
            display: flex;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .produto-info {
            flex: 1;
            margin-left: 30px;
        }

        .produto-imagem {
            width: 150px;
            height: 150px;
            background-color: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
        }

        .preco {
            color: #2971f5;
            font-size: 1.5em;
            font-weight: bold;
        }

        .not-found {
            text-align: center;
            padding: 50px 0;
            font-size: 20px;
        }

        .back-btn {
            display: flex;
            align-items: center;
            background-color: #e0e0e0;
            color: #333;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            margin: 20px;
            font-size: 16px;
            transition: background 0.3s;
        }

        .back-btn:hover {
            background-color: #c7c7c7;
        }

        .back-btn span {
            margin-right: 10px;
            font-size: 20px;
        }

    </style>
</head>

<body>
<?php   if(isset($_SESSION["usuario"])){


    echo "<h2>Resultado de sua pesquisa $nome</h2>";
}else{

echo "<h2>$notLOG</h2>";

}
    ?>
    <div class="search-bar">
        <form action="" method="get">
            <input type="text" name="pesquisa" placeholder="Digite o produto..." required>
            <input type="submit" value="Pesquisar">
        </form>
    </div>

    <button class="back-btn" onclick="window.location.href='index-4.php';">
        <span>&larr;</span> Voltar
    </button>

    <?php 
    include("conexao.php");




    if (isset($_GET['pesquisa'])) {
        $pesq = $_GET['pesquisa'];
        $stmt = $mysqli->prepare("SELECT nome, tipo, descricao, preco FROM produto WHERE nome LIKE ?");
        $searchString = "%" . $pesq . "%";
        $stmt->bind_param("s", $searchString);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0) {
    ?>

    <div class="container">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="produto">
            <div class="produto-imagem"></div>

            <div class="produto-info">
                <h3><?php echo htmlspecialchars($row['nome']); ?></h3>
                <p><strong>Tipo:</strong> <?php echo htmlspecialchars($row['tipo']); ?></p>
            <p><?php echo htmlspecialchars($row['descricao']); ?></p>
            <p class="preco"><?php echo number_format($row['preco'], 2, ',', '.'); ?> R$</p>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php 
    } else {
        echo '<div class="not-found">Desculpe, não encontramos nenhum produto com esse nome.</div>';
    }

    $stmt->close();
} else {
    header("location: index-4.php");
}
?>
</body>
</html>