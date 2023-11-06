<?php   
include("conexao.php");

session_start();


if (isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
} else {
    $mensagem = '';
}

if (isset($_SESSION["usuario"])) {
$id = $_SESSION['usuario'];
}else{

header('location: logred.php');

}

$sql = "SELECT * FROM clientes WHERE id = $id";
$query = $mysqli -> query($sql);
while ($row = $query -> fetch_assoc()) {

$nome = $row['nome'];
$email = $row['email'];
$endereco = $row['endereco'];
$cpf = $row['cpf'];
$cep = $row['cep'];


}


$stmt = $mysqli->prepare("SELECT COUNT(*) FROM enderecos WHERE id_usuario = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($addressCountFromDB);
$stmt->fetch();
$stmt->close();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conexão ao banco de dados (ajuste com suas configurações)
    if ($mysqli->connect_error) {
        die('Erro de conexão: ' . $mysqli->connect_error);
    }

    // Coletando dados do primeiro endereço
    $endereco = $_POST['endereco'] ?? '';
    $cep = $_POST['cep'] ?? '';

    // Inserir primeiro endereço aqui (ajuste conforme sua tabela de endereços)
    // ...

    // Coletando e inserindo endereços adicionais
    for ($i = 1; $i <= 3; $i++) {
        if (isset($_POST['address'.$i]) && isset($_POST['cep'.$i])) {
            $additionalAddress = $_POST['address'.$i];
            $additionalCep = $_POST['cep'.$i];

            // Prepara a inserção para evitar SQL Injection
            $stmt = $mysqli->prepare("INSERT INTO enderecos (id_usuario, endereco, cep) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $id, $additionalAddress, $additionalCep);

            // Executa a inserção
            if ($stmt->execute()) {
                $_SESSION['mensagem'] = "Endereço adicionado com sucesso!";
                // Redireciona para a mesma página para evitar reenvio do formulário
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }
        }
    }

    // Fechar conexão e redirecionar se necessário
    $stmt->close();
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        h2 {
            color: #665eff;
            font-weight: 500;
            padding-bottom: 15px;
            border-bottom: 2px solid #665eff;
        }

        .container {
            background: rgba(255,255,255,0.8);
            max-width: 650px;
            margin: 5% auto;
            padding: 50px 60px;
            border-radius: 25px;
            box-shadow: 0 10px 25px rgba(102, 94, 255, 0.15);
        }

        .profile-image {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #665eff;
            margin-bottom: 20px;
            box-shadow: 0 6px 15px rgba(102, 94, 255, 0.1);
        }

        button.btn-primary,
        button.btn-secondary {
            background: #665eff;
            border: none;
            border-radius: 35px;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s;
            color: white;
        }

        button.btn-primary:hover,
        button.btn-secondary:hover {
            background: #504de4;
        }

        label {
            font-weight: 600;
            color: #555;
            margin-top: 15px;
        }

        .btn-secondary {
            background-color: #f3f4f6;
            color: #665eff;
        }

        .btn-secondary:hover {
            background-color: #e2e4e7;
            color: white;
        }

        i.fa-camera {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #665eff;
            padding: 8px;
            border-radius: 50%;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        i.fa-camera:hover {
            background-color: #504de4;
        }

        #successAlert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }

    </style>
</head>

<body>

<div id="successAlert">
    <?php if ($mensagem !== ''): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <?php echo $mensagem; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

</div>
    <div class="container">
        <div class="text-center">
            <h2>Editar Perfil</h2>
            <div class="position-relative d-inline-block">
                <img src="path/to/default/profile.jpg" alt="Foto de Perfil" id="profileImagePreview" class="profile-image">
                <i class="fa fa-camera" onclick="document.getElementById('profileImage').click();"></i>
            </div>
            <input type="file" id="profileImage" style="display:none;" />
        </div>
        <form class="mt-5" method="POST">
            <div class="form-group">
                <label for="name"><i class="fas fa-user mr-2"></i>Nome:</label>
                <input type="text" class="form-control" id="name" name="nome" value="<?php echo $nome; ?>" placeholder="Digite seu nome" required>
            </div>


            <div class="form-group">
                <label for="email"><i class="fas fa-envelope mr-2"></i>Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Digite seu email" required> 
            </div>

           
            <div class="form-group">
                <label for="name"><i class="fas fa-user mr-2"></i>CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf; ?>" placeholder="CPF" required>
            </div>
 
            <div class="form-group">
    <label for="name"><i class="fas fa-user mr-2"></i>CEP:</label>
    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $cep; ?>" placeholder="CEP" required>
</div>

<div class="form-group">
    <label for="address"><i class="fas fa-map-marker-alt mr-2"></i>Endereço:</label>
    <input type="text" class="form-control" id="address" name="endereco" value="<?php echo $endereco; ?>" placeholder="Digite seu endereço" required>
</div>

<button type="button" class="btn btn-secondary btn-sm mb-3" id="addAddress">Adicionar outro endereço</button>
<div class="form-group" id="additionalAddresses"></div>
<button type="submit" class="btn btn-primary mt-3">Salvar Mudanças</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>





        document.getElementById("profileImage").onchange = function () {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("profileImagePreview").src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        };

        let addressCount = <?php echo $addressCountFromDB; ?>;
        document.getElementById("addAddress").onclick = function () {
            if (addressCount < 4) {
                const addressField = `
                    <div class="form-group">
                        <label for="cep${addressCount}"><i class="fas fa-user mr-2"></i>CEP ${addressCount}:</label>
                        <input type="text" class="form-control" id="cep${addressCount}" name="cep${addressCount}" placeholder="CEP" required>
                    </div>
                    <div class="form-group">
                        <label for="address${addressCount}"><i class="fas fa-map-marker-alt mr-2"></i>Endereço ${addressCount}:</label>
                        <input type="text" class="form-control" id="address${addressCount}" name="address${addressCount}" placeholder="Digite outro endereço" required>
                    </div>
                `;
                document.getElementById("additionalAddresses").innerHTML += addressField;

                document.getElementById(`cep${addressCount}`).addEventListener("blur", function() {
                    let cepField = document.getElementById(`cep${addressCount}`);
                    let addressField = document.getElementById(`address${addressCount}`);
                    fetchAddress(cepField, addressField);
                });

                addressCount++;
            } else {
                alert('Limite de endereços adicionais alcançado.');
            }
        };

        function fetchAddress(cepField, addressField) {
            let cep = cepField.value.replace(/\D/g, '');

            if (cep != "") {
                let validacep = /^[0-9]{8}$/;
                if(validacep.test(cep)) {
                    fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!("erro" in data)) {
                            addressField.value = `${data.logradouro}, ${data.bairro}, ${data.localidade} - ${data.uf}`;
                        } else {
                            alert("CEP não encontrado.");
                        }
                    })
                    .catch(() => {
                        alert("Erro ao buscar o CEP. Tente novamente.");
                    });
                } else {
                    alert("Formato de CEP inválido.");
                }
            }
        }

        document.getElementById("cep").addEventListener("blur", function() {
            let cepField = document.getElementById("cep");
            let addressField = document.getElementById("address");
            fetchAddress(cepField, addressField);
        });
    </script>
</body>
</html>
