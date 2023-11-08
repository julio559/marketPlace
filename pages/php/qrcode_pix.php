<?php
include("conexao.php");
session_start();
$apiUrl = 'https://api.mercadopago.com/v1/payments';
$accessToken = 'APP_USR-3786249808377944-102717-0761542ae1dd7c1769ec74fa4d8462da-1098015242'; // Substitua pelo seu token real, e mantenha-o seguro!
if (!isset($_GET['id_prod'], $_GET['total_value'], $_GET['quantidade'], $_GET['paymentMethod'])) {
header("location: cart.php");
}
// Verificar se as variáveis necessárias estão definidas
if (isset($_GET['id_prod'], $_GET['total_value'], $_GET['quantidade'], $_GET['paymentMethod'])) {
    $id_prod = $_GET['id_prod'];
    $total = $_GET['total_value'];
    $quantidade = $_GET['quantidade'];
    $paymentMethod = $_GET['paymentMethod'];

    $sql = "SELECT preco, nome FROM produto WHERE id = $id_prod";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $preco = $row['preco'];
        $nome = $row['nome'];

        $id_client = $_SESSION['usuario'];
$sql2 = "SELECT email FROM clientes WHERE id = $id_client";
$q = $mysqli->query($sql2);
while( $row2 = $q->fetch_assoc() ) {
$email = $row2['email'];

}

        if ($paymentMethod === 'pix') {
            // Dados para pagamento com Pix
            $dadosPagamento = [
                'transaction_amount' => floatval($total), // Converter para float
                'description' => "Compra do produto $nome",
                'payment_method_id' => 'pix',
                'payer' => [
                    'email' => "$email" // E-mail do comprador
                ]
            ];

            // Iniciar cURL
            $ch = curl_init($apiUrl);

            // Configurar cURL
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $accessToken
            ]);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dadosPagamento));

            // Executar chamada e obter resposta
            $response = curl_exec($ch);
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($response === false) {
                die('Erro na chamada da API: ' . curl_error($ch));
            }

            curl_close($ch);

            // Decodificar resposta
            $data = json_decode($response, true);

            // Verificar se a chamada foi bem-sucedida
            if ($httpStatusCode == 200 || $httpStatusCode == 201) {
                // Verificar e exibir QR Code (caso a resposta contenha um)
                if (isset($data['point_of_interaction']['transaction_data']['qr_code'])) {
                    $qrCodeUrl = $data['point_of_interaction']['transaction_data']['qr_code'];
                    $qrCodeBase64 = $data['point_of_interaction']['transaction_data']['qr_code_base64'];
            
                    // Aqui você já tem o código para exibir o QR Code
                    
                    // Agora, vamos inserir a ordem de compra na base de dados
                    $statusPagamento = $mysqli->real_escape_string($data['status']); // Sanitize a string for use in the SQL
                    $sql = "INSERT INTO ordemcompra (data, status, total, id_prod, id_cliente, quantidade) 
                            VALUES (NOW(), '$statusPagamento', $total, $id_prod, $id_client, $quantidade)";
            
                    if ($mysqli->query($sql) === TRUE) {
                        // Redirecionar para uma página de confirmação ou exibir uma mensagem de sucesso
                 
                       // No ponto onde você tem o ID da ordem após inserir no banco de dados
$orderId = $mysqli->insert_id; // Isso vai pegar o último ID inserido na conexão

                    } else {
                        echo 'Erro ao inserir ordem de compra: ' . $mysqli->error;
                    }
            
                } else {
                    echo 'QR Code não disponível na resposta da API.';
                }
            } else {
                // Houve um problema na chamada da API, exiba a mensagem de erro
                echo 'Erro na API: ';
                echo '<pre>';
                print_r($data);
                echo '</pre>';
            }
        } elseif ($paymentMethod === 'cartao') {
            // Redirecionar para a página de pagamento com cartão
            header("Location: mercado_pago.php?id_prod=$id_prod&quantidade=$quantidade&total_value=$total");
            exit;
        } else {
            echo 'Método de pagamento inválido.';
        }
    } else {
        echo "Produto não encontrado!";
    }
} else {
    echo 'Parâmetros ausentes.';
}




if($data['status'] == 'approved') {
  $quantidade = $_GET['quantidade'];
$sql = "UPDATE produto SET stock = stock - $quantidade WHERE id = $id_prod";
$quer = $mysqli -> query($sql);


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
<p class="ola">  Validade do seu pagamento <br> no valor de R$<?php echo number_format($total, 2, ',', '.') ; ?></p>

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



