<?php  
session_start();
include("conexao.php");

$nome = "";
$notLOG = "Você ainda nao esta logado";

if(isset($_SESSION["usuario"])) {    
    $id = $_SESSION['usuario'];
    $stmt = $mysqli->prepare("SELECT nome FROM clientes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nome);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <style>
        /* Reset básico para alguns elementos */
        body, h2, h3, p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f6f6f6;
            color: #333;
        }

        /* Estilo para o cabeçalho da página */
        h2 {
            background-color: #2971f5;
            padding: 20px;
            color: #fff;
            text-align: center;
            font-size: 28px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .search-bar {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
        }

        .search-bar input[type="text"] {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
        }

        .search-bar input[type="submit"] {
            padding: 10px 20px;
            background-color: #2971f5;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-bar input[type="submit"]:hover {
            background-color: #165ad7;
        }

        /* Estilos para cada produto */
        .produto {
            display: flex;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .produto-imagem img {
            max-width: 150px;
            border-radius: 10px;
        }

        .produto-info {
            flex: 1;
            margin-left: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .preco {
            color: #2971f5;
            font-size: 1.5em;
            font-weight: bold;
        }

        /* Estilos para mensagens e botões */
        .not-found, .back-btn {
            text-align: center;
            margin-bottom: 30px;
        }

        .not-found {
            padding: 50px 0;
            font-size: 20px;
        }

        .back-btn {
            padding: 10px 20px;
            background-color: #e0e0e0;
            border-radius: 5px;
            color: #333;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
            display: inline-block;
        }

        .back-btn:hover {
            background-color: #c7c7c7;
        }

        .product-link {
            text-decoration: none;
            color: inherit; /* Mantém a cor do texto original */
        }

    </style>
</head>

<body>
<?php   
    if(!empty($nome)){
        echo "<h2>Resultado de sua pesquisa, $nome</h2>";
    } else {
        echo "<h2>$notLOG</h2>";
    }
?>

<div class="container">
    <div class="search-bar">
        <form action="" method="get">
            <input type="text" name="pesquisa" placeholder="Digite o produto..." required>
            <input type="submit" value="Pesquisar">
        </form>
    </div>

    <a class="back-btn" href="index-4.php">
        &larr; Voltar
    </a>

    <?php 

    if (isset($_GET['pesquisa'])) {
        $pesq = $_GET['pesquisa'];
        $stmt = $mysqli->prepare("SELECT id, nome, cartegoria, descricao, sub_descricao,preco, imagem FROM produto WHERE nome LIKE ?");
        $searchString = "%" . $pesq . "%";
        $stmt->bind_param("s", $searchString);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()): ?>
                <a href="../product-details.php?id_prod=<?php echo $row['id']; ?>" class="product-link">
                    <div class="produto">
                        <div class="produto-imagem">
                            <img src="../uploads/<?php echo $row['imagem']; ?>" alt="Imagem do produto <?php echo htmlspecialchars($row['nome']); ?>">
                        </div>
                        <div class="produto-info">
                            <h3><?php echo htmlspecialchars($row['nome']); ?></h3>
                            <p><strong>Tipo:</strong> <?php echo htmlspecialchars($row['cartegoria']); ?></p>
                            <p><strong>Descrição:</strong> <?php echo htmlspecialchars($row['sub_descricao']); ?></p>
                            <p class="preco"><?php echo number_format($row['preco'], 2, ',', '.'); ?> R$</p>
                        </div>
                    </div>
                </a>
            <?php endwhile;
        } else {
            echo '<div class="not-found">Desculpe, não encontramos nenhum produto com esse nome.</div>';
        }

        $stmt->close();
    } else {
        header("location: index-4.php");
        exit;
    }
    ?>
</div> <!-- Final do container -->

</body>
</html>
