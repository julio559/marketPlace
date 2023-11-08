<?php 
include("conexao.php");
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: logred.php");
} else {
    $id = $_SESSION['usuario'];
    $sql = "SELECT * FROM refound WHERE id_usuario = $id";
    $query = $mysqli -> query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
        body {
            background-color: #f2f4f8;
            font-family: 'Roboto', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            height: 100vh;
        }
        .dashboard-header {
            background-color: #2972f5;
            color: #fff;
            padding: 40px 0;
            margin-bottom: 50px;
        }
        .dashboard-header h1 {
            font-size: 3rem;
            font-weight: 700;
        }
        .complaints-section {
            padding: 25px;
            border-radius: 15px;
            background: #fff;
            margin-bottom: 30px;
            border: 1px solid #dee2e6;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .complaints-section h2 {
            color: #2972f5;
            font-weight: 700;
            margin-bottom: 30px;
            font-size: 1.5rem;
        }
        .complaint-card {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            border-left: 5px solid #2972f5;
            transition: all 0.3s ease-in-out;
        }
        .complaint-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .complaint-card h5 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2972f5;
            margin-bottom: 12px;
        }
        .complaint-card p {
            margin-bottom: 15px;
        }
        .status-indicator {
    display: flex;
    align-items: center;
}

@keyframes pulse {
    0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(52, 195, 143, 0.7);
    }
    70% {
        transform: scale(1);
        box-shadow: 0 0 0 10px rgba(52, 195, 143, 0);
    }
    100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(52, 195, 143, 0);
    }
}

.status-dot {
    height: 12px;
    width: 12px;
    border-radius: 50%;
    margin-right: 10px;
    animation: pulse 2s infinite;
}
.status-text {
    font-size: 0.9rem;
    color: #495057; /* Or any color you prefer */
}

   
        .btn-view-complaint {
            background-color: #2972f5;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
        }
        .btn-view-complaint:hover {
            background-color: #165ece;
        }
        .text-center p {
            color: #6c757d;
            font-size: 1rem;
        }
    </style>
</head>
<body>

<header class="dashboard-header text-center">
    <h1>Dashboard do Usuário</h1>
</header>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <section class="complaints-section">
                <h2>Reclamações em Aberto</h2>
                <?php 
                if ($query->num_rows > 0) {
                    while($row = $query->fetch_assoc()) {
                        $motivo = $row['motivo'];
                        $ordem = $row['id_ordem'];
                        $response = $row['response'];
                ?>
                        <div class="complaint-card">
                        <div class="status-indicator">
    <span class="status-dot" style="background-color: <?php echo ($response == '1') ? '#34c38f;' : 'red;'; ?>"></span>
    <span class="status-text"><?php echo ($response == '1') ? 'Solicitação já respondida' : 'Não atendida'; ?></span>
</div>
                            <h5>Ordem de compra: <?php echo htmlspecialchars($ordem); ?></h5>
                            <p><?php echo htmlspecialchars($motivo); ?></p>
                           
                            <button class="btn-view-complaint">Abrir chat com vendedor</button>
                        </div>
                <?php 
                    }
                } else {
                ?>
                    <div class="text-center">
                        <p>Não há reclamações em aberto no momento.</p>
                    </div>
                <?php 
                }
                ?>
            </section>
        </div>
    </div>
</div>

<!-- Scripts -->
</body>
</html>
<?php 
}
?>