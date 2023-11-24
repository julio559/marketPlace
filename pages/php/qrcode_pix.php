<?php
include("conexao.php");
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location: ../../argon-dashboard-master/pages/sign-in.php");
    exit();
}

$apiUrl = 'https://api.mercadopago.com/v1/payments';
$accessToken = 'APP_USR-3786249808377944-102717-0761542ae1dd7c1769ec74fa4d8462da-1098015242'; // Substitua pelo seu token real.
$id_client = $_SESSION['usuario'];

// Verifique se 'id_prod' é um array e conte os elementos, caso contrário, defina como 1
$total_itens = is_array($_GET['id_prod']) ? count($_GET['id_prod']) : 1;

for ($i = 0; $i < $total_itens; $i++) {
    $id_prod = $_GET["id_prod_$i"];
    $quantidade = $_GET["quantidade_$i"];
    $endereco = $_GET["endereco"]; // Corrigido para usar o endereço correto para cada item

    $sql = "SELECT preco, nome FROM produto WHERE id = $id_prod";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $preco = $row['preco'];
        $nome = $row['nome'];

        $total = $_GET['total_value'];
        $total = str_replace(',', '.', str_replace('.', '', $total));
        $total = (float) $total;
        $totalFormatado = number_format($total, 2, ',', '.');
        $sql2 = "SELECT email FROM clientes WHERE id = $id_client";
        $q = $mysqli->query($sql2);
        $email = $q->fetch_assoc()['email'];

        $dadosPagamento = [
            'transaction_amount' => floatval($total),
            'description' => "Compra do produto $nome",
            'payment_method_id' => 'pix',
            'payer' => ['email' => $email]
        ];

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dadosPagamento));

        $response = curl_exec($ch);
        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($response === false) {
            die('Erro na chamada da API: ' . curl_error($ch));
        }

        curl_close($ch);
        $data = json_decode($response, true);

        if ($httpStatusCode == 200 || $httpStatusCode == 201) {
            if (isset($data['point_of_interaction']['transaction_data']['qr_code'])) {
                $qrCodeUrl = $data['point_of_interaction']['transaction_data']['qr_code'];
                $qrCodeBase64 = $data['point_of_interaction']['transaction_data']['qr_code_base64'];

                $statusPagamento = $mysqli->real_escape_string($data['status']);
                $sql3 = "INSERT INTO ordemcompra (data, status, total, id_prod, id_cliente, quantidade, endereco_envio) 
                        VALUES (NOW(), ?, ?, ?, ?, ?, ?)";

                $stmt = $mysqli->prepare($sql3);
                if ($stmt) {
                    $stmt->bind_param("siiiss", $statusPagamento, $total, $id_prod, $id_client, $quantidade, $endereco);
                    $stmt->execute();
                    if ($stmt->error) {
                        echo "Erro ao inserir ordem de compra: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Erro na preparação da consulta: " . $mysqli->error;
                }
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>


body {
  background-color: #F0F0F0;
  font-family: 'Roboto', sans-serif;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.centered-div {
  background-color: #fff;
  padding-top: 50px;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  width: 80%; /* Ajuste a largura conforme necessário */
  max-width: 600px; /* Um máximo para não ficar muito grande em monitores grandes */
}

#success-message {
  color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
  position: absolute;
  padding: 10px;
  margin-top: -35px; /* Ajuste conforme necessário */
  border-radius: 4px;
  font-size: 0.9em;
  display: none;
  left: 50%;
  transform: translateX(-50%);
}

#code {
  padding: 10px;
  width: calc(100% - 20px); /* Subtrai o padding */
  border-radius: 7px;
  border: solid 1px #ced4da;
  margin-bottom: 10px; /* Espaço entre o input e o botão */
}

.copy {
  background-color: #00a6e2;
  color: white;
  border: none;
  padding: 10px;
  width: 100%;
  border-radius: 7px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}


.ola {
  font-size: 30px;
  text-align: center;
  margin-bottom: 20px; /* Espaço antes do cronômetro */
}

.timer {
  font-size: 24px; /* Maior para mais destaque */
  text-align: center;
  margin-bottom: 20px; /* Espaço antes do QR Code */
}

.imgQr {
  display: flex;
  justify-content: center;
  margin-bottom: 20px; /* Espaço antes do input */
}


        </style>
</head>
<body>
    

<div class="container">
<a href="cart.php" title="Voltar ao carrinho">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
<div class="centered-div">
<p class="ola">  Validade do seu pagamento <br> no valor de R$<?php echo $totalFormatado; ?></p>

<div class="timer" id="timer">
  30:00
</div>

<div class="imgQr">


<?php echo "<img src='data:image/jpeg;base64, $qrCodeBase64 ' alt='QR Code Pix' width='300px' />" ?>

</div>
<div id="success-message">Copiado com sucesso!</div>
<br>
<input type="text" id="code" disabled value="<?php echo $qrCodeUrl; ?>">
<button type="button" class="copy" onclick="copyToClipboard()">Copiar</button>
</div>
</div>

</body>


<script>

function copyToClipboard() {
    // Obtém o valor do campo de texto
    var copyText = document.getElementById("code");

    // Habilita o campo de texto para a cópia
    copyText.disabled = false;

    // Seleciona o texto dentro do campo de texto
    copyText.select();
    copyText.setSelectionRange(0, 99999); // Para dispositivos móveis

    try {
      // Executa a ação de cópia
      var successful = document.execCommand('copy');
      var msg = successful ? 'Copiado com sucesso!' : 'Houve um erro ao copiar.';

      // Mostra a mensagem de sucesso
      var messageBox = document.getElementById('success-message');
      messageBox.textContent = msg;
      messageBox.style.display = 'block';

      // Esconde a mensagem de sucesso após 2 segundos
      setTimeout(function(){
        messageBox.style.display = 'none';
      }, 2000);

    } catch (err) {
      console.log('Oops, não foi possível copiar');
    }

    // Desabilita o campo de texto novamente
    copyText.disabled = true;
  }
  let totalTime = 30 * 60; // 10 minutos em segundos
const timerElement = document.getElementById('timer');

const countdown = setInterval(function() {
  // Convertendo o tempo em minutos e segundos
  let minutes = parseInt(totalTime / 60); // Aqui estava o erro, removemos o segundo argumento do parseInt
  let seconds = parseInt(totalTime % 60); // E aqui também

  // Adicionando zero à esquerda se os minutos ou segundos forem menores que 10
  minutes = minutes < 10 ? "0" + minutes : minutes;
  seconds = seconds < 10 ? "0" + seconds : seconds;

  // Atualizando o cronômetro na página
  timerElement.textContent = minutes + ":" + seconds;

  // Diminuindo o tempo total
  totalTime--;

  // Quando o cronômetro chegar a 0, limpe o intervalo
  if (totalTime < 0) {
    clearInterval(countdown);
    timerElement.textContent = "00:00";
    // Aqui você pode adicionar qualquer ação que gostaria que acontecesse quando o cronômetro chega a zero.
  }
}, 1000); // Definindo o intervalo para 1 segundo



// Adicione isso dentro da sua tag <script> existente
function checkPaymentStatus() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'check_payment_status.php?id_order=' + <?php echo json_encode($orderId); ?>, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      if (response.status !== 'pending') {
        clearInterval(paymentStatusCheck); // Para de verificar o status do pagamento
        alert('Status do pagamento: ' + response.status);
        // Aqui você pode redirecionar o usuário ou atualizar a página conforme necessário
      }
    } else {
      console.error('Erro ao verificar o status do pagamento.');
    }
  };
  xhr.send();
}

// Inicia o processo de verificação após a página ser carregada
var paymentStatusCheck = setInterval(checkPaymentStatus, 10000); // Verifica a cada 10 segundos


</script>

</html>



