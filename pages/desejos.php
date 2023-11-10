<?php
include("php/conexao.php");
session_start();

if (!isset($_SESSION['usuario'])) {
    header('location: logred.php');
    exit;
}

$id = $_SESSION['usuario'];
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos curtidos</title>
    <link rel="stylesheet" href="wishlist.css">

<style>

/* Reset básico */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Helvetica Neue', Arial, sans-serif;
    background: #f0f2f5;
    color: #333;
    line-height: 1.6;
    padding: 20px;
}

.wishlist-page {
    max-width: 1100px;
    margin: 0 auto;
}

.wishlist-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.wishlist-title {
    font-size: 2rem;
    color: #555;
    margin-bottom: 20px;
    text-align: center;
}

.wishlist-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.wishlist-item {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.wishlist-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.wishlist-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.wishlist-item-content {
    padding: 15px;
}

.wishlist-item-title {
    font-size: 1.25rem;
    margin-bottom: 10px;
    color: #333;
}

.wishlist-item-description {
    font-size: 0.9rem;
    margin-bottom: 15px;
    color: #666;
}

.wishlist-item-actions {
    text-align: right;
    padding: 10px 15px;
    background: #efefef;
    border-top: 1px solid #ddd;
}

.wishlist-item-actions button {
    background: #5e72e4;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.wishlist-item-actions button:hover {
    background: #3e52d4;
}


#ola{

    background: #5e72e4;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;


}

    </style>

</head>
<body>

<div class="wishlist-page">
    <div class="wishlist-container">
        <h2 class="wishlist-title">Minha Lista de produtos curtidos</h2>
        <div id="wishlist-items" class="wishlist-grid">
            <?php
            $sql = "SELECT * FROM wish WHERE id_usuario = ?";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $id_prod = $row['id_prod'];
                    $sql2 = "SELECT * FROM produto WHERE id = ?";
                    if ($stmt2 = $mysqli->prepare($sql2)) {
                        $stmt2->bind_param("i", $id_prod);
                        $stmt2->execute();
                        $result2 = $stmt2->get_result();
                        if ($row2 = $result2->fetch_assoc()) {
                            $estoque = $row2['stock'];
                            $nome = $row2['nome'];
                            $categoria = $row2['cartegoria']; // Assumindo que o campo é 'categoria', não 'cartegoria'
                            $img = $row2['imagem'];
                            $preco = $row2['preco'];
                            $descricao = $row2['descricao'];
                            ?>
                            <div class="wishlist-item">
                                <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($nome); ?>">
                                <div class="wishlist-item-content">
                                    <h3 class="wishlist-item-title"><?php echo htmlspecialchars($nome); ?></h3>
                                    <p class="wishlist-item-description"><?php echo htmlspecialchars($descricao); ?></p>
                                    <!-- Adicione o preço se necessário -->
                                </div>
                                <div class="wishlist-item-actions">
                         <?php           
                                if ($estoque > 0) {
                        echo "
                            <a id='ola' href='php/cart.php?id=$id_prod' title='Adicionar ao carrinho'> + carrinho</a>
                        ";
                    } else {
                        echo "
                            <button class='not' disabled title='Adicionar ao carrinho'> SEM ESTOQUE </button>
                        ";
                    }
                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        $stmt2->close();
                    }
                }
                $stmt->close();
            }
            ?>

                    
                

               
        </div>
    </div>
</div>

</body>
</html>

