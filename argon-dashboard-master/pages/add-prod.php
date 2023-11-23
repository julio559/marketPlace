<?php
include '../../pages/php/conexao.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: sign-in.php");
    exit;
}

$id_vendedor = $_SESSION['usuario'];
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cor = $_POST['cor'];
$altura = $_POST['altura'];
$largura = $_POST['largura'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $type = '1'; // Se você tiver um campo para 'type', deve incluir no formulário
    $stock = $_POST['stock'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
$composicao = $_POST['composicao'];
    $imageNames = array('', '', '', '');
    $uploadDir = '../../pages/uploads/';

    for ($i = 1; $i <= 4; $i++) {
        if (isset($_FILES['image' . $i]) && $_FILES['image' . $i]['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image' . $i]['tmp_name'];
            $fileName = $_FILES['image' . $i]['name'];
            
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $imageNames[$i - 1] = $newFileName;
            } else {
                echo 'Houve um erro ao mover o arquivo para o diretório de upload.';
                exit;
            }
        }
    }

    // Ajuste o nome da tabela e das colunas conforme o seu banco de dados
    $stmt = $mysqli->prepare("INSERT INTO produto (nome, preco, descricao, tipe, id_vendedor, stock, imagem, imagem2, imagem3, imagem4, cartegoria, sub_descricao, composicao, tamanho, largura, cor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssisssssssssss", $name, $price, $description, $type, $id_vendedor, $stock, $imageNames[0], $imageNames[1], $imageNames[2], $imageNames[3], $category, $subcategory, $composicao, $altura, $largura, $cor);

    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $message = '<div class="message-box success">Produto adicionado com sucesso.</div>';
    } else {
        $message = '<div class="message-box error">Erro ao adicionar o produto: ' . htmlspecialchars($stmt->error) . '</div>';
    }


    $stmt->close();
}

$mysqli->close();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adicionar Produto</title>
<link rel="stylesheet" href="styles.css">
<style>
body, html {
  margin: 0;
  padding: 0;
  font-family: 'Arial', sans-serif;
  background-color: #e9ecef; /* Um cinza claro, você pode substituir pela cor da imagem */
}

.add-product-form {
  max-width: 600px;
  margin: 2rem auto;
  padding: 2rem;
  background-color: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.add-product-form h2 {
  text-align: center;
  margin-bottom: 1.5rem;
}

#productForm {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

#productForm input,
#productForm textarea {
  padding: 0.75rem;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
}

#productForm button {
  padding: 0.75rem;
  border: none;
  background-color: #007bff; /* Azul, pode ser substituído pela cor da imagem */
  color: white;
  border-radius: 0.25rem;
  cursor: pointer;
  transition: background-color 0.2s;
}

#productForm button:hover {
  background-color: #0056b3;
}

.image-upload-container {
  display: flex;
  gap: 0.5rem;
}

.image-upload {
  width: 100px; 
  height: 100px; 
  border: 1px dashed #ced4da;
  border-radius: 0.25rem;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  overflow: hidden;
}

.image-upload input[type="file"] {
  opacity: 0;
  width: 100%;
  height: 100%;
  position: absolute;
  cursor: pointer;
}

.image-upload::before {
  content: "+";
  font-size: 2rem;
  color: #ced4da;
  position: absolute;
}

.image-preview {
  display: none; 
}
.message-box {
  padding: 1rem;
  margin-bottom: 1rem;
  border-radius: 0.25rem;
  color: #fff;
  text-align: center;
}

.success {
  background-color: #28a745; 
}

.error {
  background-color: #dc3545; 
}

</style>
</head>
<body>
<div class="add-product-form">
  <h2>Adicionar Novo Produto</h2>
  <?php echo $message; ?>
  <form id="productForm" enctype="multipart/form-data" method="POST">
  <div class="image-upload-container">
  <div class="image-upload">
    <input type="file" id="image1" name="image1" accept="image/*">
  </div>
  <div class="image-upload">
    <input type="file" id="image2" name="image2" accept="image/*">
  </div>
  <div class="image-upload">
    <input type="file" id="image3" name="image3" accept="image/*">
  </div>
  <div class="image-upload">
    <input type="file" id="image4" name="image4" accept="image/*">
  </div>
</div>
 
    <input type="text" id="name" name="name" placeholder="Nome do Produto" required>
    <input type="number" step="0.01" id="price" name="price" placeholder="Preço" required>
    <textarea id="description" name="description" placeholder="Descrição" required></textarea>
    <input type="text" id="subcategory" name="composicao" placeholder="Composição" required>
   
    <input type="number" id="stock" name="stock" placeholder="Estoque" required>
    <input type="text" id="stock" name="altura" placeholder="tamanho" oninput="addX()" required>
    <input type="text" id="stock" name="cor" placeholder="cor" oninput="addX()" required>
    <input type="text" id="stock" name="largura" placeholder="largura em cm" oninput="addX()" required>
<span id="formattedOutput"></span>


    <input type="text" id="category" name="category" placeholder="Categoria" required>
    <input type="text" id="subcategory" name="subcategory" placeholder="Subcategoria" required>
    <button type="submit">Adicionar Produto</button>
  </form>
</div>
<script>

document.querySelectorAll('.image-upload input[type="file"]').forEach(input => {
  input.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const imageUploadContainer = input.parentElement;
        imageUploadContainer.style.backgroundImage = `url(${e.target.result})`;
        // Remove o '+' ao carregar a imagem
        if (imageUploadContainer.querySelector('::before')) {
          imageUploadContainer.style.content = '';
        }
      };
      reader.readAsDataURL(file);
    }
  });
});






</script>
</body>
</html>
