<?php
include("php/conexao.php");

$id_prod = $_GET['id'];

$sql = "SELECT preco FROM produto WHERE id = $id_prod";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $preco = $row['preco'];
} else {
    echo "Produto não encontrado!";
    exit;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Pago Form</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Mercado Pago JS -->
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <style>
        /* Estilização Geral */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .payment-wrapper {
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border-radius: 20px;
            width: 450px;
        }

        .amount {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #333;
        }

        .card-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .card-details input {
            width: 48%; /* Ligeiramente menor para ajustar ao espaço */
        }

        #paymentForm input, #paymentForm select {
            width: 100%;
            padding: 10px;
            border: 2px solid #e1e1e1;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        #paymentForm input[type="text"]:focus, #paymentForm select:focus {
            border-color: #00a6e2;
            outline: none;
        }

        #paymentForm button {
            width: 100%;
            background-color: #00a6e2;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 15px;
            cursor: pointer;
            font-weight: 600;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        #paymentForm button:hover {
            background-color: #0086b3;
        }

        .card-image {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 25px;
        }

        .card-icon {
            font-size: 60px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="payment-wrapper">
        <div class="card-image">
            <i class="fas fa-credit-card card-icon"></i>
        </div>
        <div class="amount">Valor a ser pago: R$ <?php echo number_format($preco, 2, ',', '.'); ?></div>
        <form id="paymentForm">
            <input type="text" placeholder="Card number" id="cardNumber" data-checkout="cardNumber" pattern="\d{19}" maxlength="19"/>
            <div class="card-details">
                <input type="text" placeholder="MM" id="cardExpirationMonth" data-checkout="cardExpirationMonth" pattern="\d{2}" maxlength="2"/>
                <input type="text" placeholder="YY" id="cardExpirationYear" data-checkout="cardExpirationYear" pattern="\d{2}" maxlength="2"/>
            </div>
            <input type="text" placeholder="Card holder name" id="cardholderName" data-checkout="cardholderName"/>
            <input type="text" placeholder="CVV" id="securityCode" data-checkout="securityCode" pattern="\d{3,4}" maxlength="4"/>
            <select name="installments" id="installments">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?>x <?= number_format($preco/$i, 2, ',', '.') ?></option>
                <?php endfor; ?>
            </select>
            <input type="hidden" name="paymentMethodId" id="paymentMethodId" />
            <button type="submit">Pagar</button>
        </form>
    </div>

<script>




document.addEventListener('DOMContentLoaded', function() {
    Mercadopago.setPublishableKey('YOUR_PUBLIC_KEY');
    
    document.getElementById('cardNumber').addEventListener('keyup', function() {
        if (this.value.length >= 6) {
            Mercadopago.getPaymentMethod({
                "bin": this.value.substring(0,6)
            }, function(status, response) {
                if (status == 200) {
                    const paymentMethodId = response[0].id;
                    document.getElementById('paymentMethodId').value = paymentMethodId;
                    updateCardIcon(paymentMethodId);
                } 
            });
        }
    });


    document.getElementById('cardNumber').addEventListener('input', function(e) {
    let value = e.target.value;
    value = value.replace(/\D/g, "");
    value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
    e.target.value = value;
});

    document.getElementById('securityCode').addEventListener('focus', function() {
        const cardIconElement = document.querySelector('.card-icon');
        cardIconElement.style.transform = "rotateY(180deg)";
    });

    document.getElementById('securityCode').addEventListener('blur', function() {
        const cardIconElement = document.querySelector('.card-icon');
        cardIconElement.style.transform = "rotateY(0deg)";
    });
    
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();
    
        Mercadopago.createToken(e.target, function(status, response) {
            if (status != 200 && status != 201) {
                alert("Erro ao obter o token do cartão: " + response.cause[0].description);
            } else {
                const token = response.id;
                console.log("Token do cartão:", token);
                // Aqui, você pode adicionar o token a um campo oculto e enviar o formulário, por exemplo:
                // const inputToken = document.createElement('input');
                // inputToken.setAttribute('type', 'hidden');
                // inputToken.setAttribute('name', 'token');
                // inputToken.setAttribute('value', token);
                // e.target.appendChild(inputToken);
                // e.target.submit();
            }
        });
    });
});

function updateCardIcon(paymentMethodId) {
    const cardIconElement = document.querySelector('.card-icon');
    cardIconElement.classList.remove('fa-credit-card-back', 'fa-credit-card');
    
    if (paymentMethodId === 'visa') {
        cardIconElement.classList.add('fa-cc-visa');
    } else if (paymentMethodId === 'master') {
        cardIconElement.classList.add('fa-cc-mastercard');
    } else {
        cardIconElement.classList.add('fa-credit-card');
    }
}

</script>    

</body>
</html>
