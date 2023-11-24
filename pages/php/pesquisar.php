<?php  
session_start();
include("conexao.php");
if(!isset($_SESSION['usuario'])){


    header("location: ../../argon-dashboard-master/pages/sign-in.php");

}
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
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, h2, h3, p {
            font-family: 'Arial', sans-serif;
        }

        /* Cores */
        :root {
            --primary-color: #2971f5;
            --text-color: #333;
            --background-color: #f6f6f6;
            --button-hover-color: #165ad7;
            --white: #fff;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Estilo do cabeçalho */
        h2 {
            background-color: var(--primary-color);
            padding: 20px;
            color: var(--white);
            text-align: center;
            font-size: 28px;
        }

        /* Container Principal */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }

        /* Barra de Pesquisa */
        .search-bar {
            padding: 20px;
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
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
            background-color: var(--primary-color);
            border: none;
            border-radius: 5px;
            color: var(--white);
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .search-bar input[type="submit"]:hover {
            background-color: var(--button-hover-color);
            transform: translateY(-2px);
        }

        /* Estilos para produtos */
        .produto {
            display: flex;
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .produto:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .produto-imagem img {
            max-width: 150px;
            border-radius: 10px;
            display: block;
            margin-right: 30px;
        }

        .produto-info {
            flex: 1;
        }

        .preco {
            color: var(--primary-color);
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
            background-color: var(--primary-color);
            border-radius: 5px;
            color: var(--white);
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            text-decoration: none; /* Remover sublinhado */
            display: inline-block;
        }

        .back-btn:hover {
            background-color: var(--button-hover-color);
            transform: translateY(-2px);
        }

        .product-link {
            text-decoration: none;
            color: inherit;
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
    $pesquisa = $_GET['pesquisa'];
    $consulta = $mysqli->prepare("SELECT id, nome, cartegoria, descricao, sub_descricao, preco, imagem FROM produto WHERE nome LIKE ?");
    $stringDePesquisa = "%" . $pesquisa . "%";
    $consulta->bind_param("s", $stringDePesquisa);
    $consulta->execute();

    // Associa cada coluna do resultado a uma variável
    $consulta->bind_result($id, $nome, $categoria, $descricao, $subDescricao, $preco, $imagem);

    $encontrouProduto = false;

    while ($consulta->fetch()) {
        $encontrouProduto = true;
        ?>
        <a href="../product-details.php?id_prod=<?php echo $id; ?>" class="product-link">
            <div class="produto">
                <div class="produto-imagem">
                    <img src="../uploads/<?php echo $imagem; ?>" alt="Imagem do produto <?php echo htmlspecialchars($nome); ?>">
                </div>
                <div class="produto-info">
                    <h3><?php echo htmlspecialchars($nome); ?></h3>
                    <p><strong>Tipo:</strong> <?php echo htmlspecialchars($categoria); ?></p>
                    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($subDescricao); ?></p>
                    <p class="preco">R$:<?php echo number_format($preco, 2, ',', '.'); ?> </p>
                </div>
            </div>
        </a>
        <?php 
    }

    if (!$encontrouProduto) {
        echo '<div class="not-found">Desculpe, não encontramos nenhum produto com esse nome.</div>';
    }

    $consulta->close();
} else {
    header("Location: index-4.php");
    exit;
}
?>

</div> <!-- Final do container -->

</body>
</html>
