<?php

include("php/apiMe.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Pago Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .payment-wrapper {
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            width: 100%;
            max-width: 480px;
        }

        .back-arrow {
            margin-bottom: 20px;
        }

        .back-arrow a {
            display: flex;
            align-items: center;
            color: #555;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .back-arrow i {
            margin-right: 10px;
            font-size: 20px;
        }

        .back-arrow a:hover {
            color: #00a6e2;
        }

        .card-image {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-icon {
            font-size: 70px;
            color: #e0e0e0;
            transition: all 0.3s;
        }

        .amount {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        .card-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .card-details input {
            width: 48%;
        }

        #paymentForm input, #paymentForm select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 15px;
            transition: border 0.3s;
        }

        #paymentForm input:focus, #paymentForm select:focus {
            border-color: #00a6e2;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 166, 226, 0.2);
        }

        #paymentForm button {
            width: 100%;
            background-color: #00a6e2;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px;
            cursor: pointer;
            font-weight: 600;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        #paymentForm button:hover {
            background-color: #0086b3;
        }



        .card-representation {
            position: relative;
            perspective: 1500px;
            height: 200px; /* Modificado o tamanho do cartão */
            margin-top: 30px;
            margin-bottom: 50px;
            width: 350px; /* Adicionei largura para o cartão */
            
        }


        .card-brand {
            height: 60px;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: contain;
        }

.card-front, .card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.5s;
}

.card-front {
    background: linear-gradient(135deg, #0061f2, #60bbe6);
    color: white;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-back {
    background: #313131;
    transform: rotateY(180deg);
    padding: 20px;
}

.card-number, .card-name, .card-expiration {
    font-size: 18px;
}

.card-cvv {
    font-size: 18px;
    text-align: right;
    color: white;
}

.card-brand {
    height: 40px;
}

.card-stripe {
    height: 50px;
    background: black;
    margin-bottom: 10px;
}

.card-icon.fa-credit-card-back {
    display: none;
}


    </style>
</head>

<body>
<div class="payment-wrapper">
    <div class="back-arrow">
        <a href="php/cart.php" title="Voltar ao carrinho">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
        <div class="card-representation">
    <div class="card-front">
        <div class="card-brand"></div>
        <div class="card-number">•••• •••• •••• ••••</div>
        <div class="card-name">NOME DO TITULAR</div>
        <div class="card-expiration">MM/AA</div>
    </div>
    <div class="card-back">
        <div class="card-stripe"></div>
        <div class="card-cvv">•••</div>
    </div>
</div>
    </div>

    <div class="amount">Valor a ser pago: R$ <?php echo number_format($total, 2, ',', '.'); ?></div>
    <form id="paymentForm" action="process_payment.php" method="post">
        <input type="text" placeholder="Card number" id="cardNumber" data-checkout="cardNumber" maxlength="19"/>
        <div class="card-details">
            <input type="text" placeholder="MM" id="cardExpirationMonth" data-checkout="cardExpirationMonth" pattern="\d{2}" maxlength="2"/>
            <input type="text" placeholder="YY" id="cardExpirationYear" data-checkout="cardExpirationYear" pattern="\d{2}" maxlength="2"/>
        </div>
        <input type="text" placeholder="Card holder name" id="cardholderName" data-checkout="cardholderName"/>
        <input type="text" placeholder="CVV" id="securityCode" data-checkout="securityCode" pattern="\d{3,4}" maxlength="4"/>
        <select name="installments" id="installments">
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?>x <?= number_format($total/$i, 2, ',', '.') ?></option>
            <?php endfor; ?>
        </select>
        <input type="hidden" name="paymentMethodId" id="paymentMethodId" />
        <input type="hidden" name="transactionAmount" value="<?php echo $total; ?>"/>
        <button type="submit">Pagar</button>
    </form>
</div>


<script>


function updateCardIcon(paymentMethodId) {
    const cardBrandElement = document.querySelector('.card-brand');
    
    if (!cardBrandElement) {
        console.error('Elemento ".card-brand" não encontrado!');
        return;
    }

    cardBrandElement.style.backgroundImage = '';  // Resetar imagem de fundo

    if (paymentMethodId === 'visa') {
        cardBrandElement.style.backgroundImage = 'url("visa.png")';
    } else if (paymentMethodId === 'master') {
        cardBrandElement.style.backgroundImage = 'url("https://icons8.com.br/icon/13610/mastercard")';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    Mercadopago.setPublishableKey('APP_USR-cd325aad-a839-4f87-930c-1701ca5e1b88');

    
    document.getElementById('cardNumber').addEventListener('keyup', function() {
        let cardNumber = this.value.replace(/\s+/g, '');
        if (cardNumber.length >= 6) {
            Mercadopago.getPaymentMethod({
                "bin": cardNumber.substring(0,6)
            }, function(status, response) {
                if (status == 200) {
                    const paymentMethodId = response[0].id;
                    document.getElementById('paymentMethodId').value = paymentMethodId;
                    updateCardIcon(paymentMethodId);
                } else {
                    console.error(response);
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
        const formData = new FormData(e.target);
        formData.append('cardNumber', document.getElementById('cardNumber').value.replace(/\s+/g, ''));
        Mercadopago.createToken(formData, function(status, response) {
            if (status != 200 && status != 201) {
                alert(response.cause[0].description);
            } else {
                const token = response.id;
                const form = e.target;
                const inputToken = document.createElement('input');
                inputToken.setAttribute('type', 'hidden');
                inputToken.setAttribute('name', 'token');
                inputToken.setAttribute('value', token);
                form.appendChild(inputToken);
                form.submit();
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



const cardFront = document.querySelector('.card-front');
const cardBack = document.querySelector('.card-back');
const cardNumberDisplay = document.querySelector('.card-number');
const cardCVVDisplay = document.querySelector('.card-cvv');
const cardExpirationDisplay = document.querySelector('.card-expiration');
const cardNameDisplay = document.querySelector('.card-name');

document.getElementById('securityCode').addEventListener('focus', function() {
    cardFront.style.transform = "rotateY(180deg)";
    cardBack.style.transform = "rotateY(0deg)";
});

document.getElementById('securityCode').addEventListener('blur', function() {
    cardFront.style.transform = "rotateY(0deg)";
    cardBack.style.transform = "rotateY(180deg)";
});

document.getElementById('cardNumber').addEventListener('input', function() {
    let value = this.value.replace(/\s+/g, '');
    cardNumberDisplay.textContent = value.padEnd(16, '•').replace(/(.{4})(?=.)/g, '$1 ');
});

document.getElementById('securityCode').addEventListener('input', function() {
    let value = this.value;
    cardCVVDisplay.textContent = value.padEnd(3, '•');
});

document.getElementById('cardExpirationMonth').addEventListener('input', function() {
    cardExpirationDisplay.textContent = this.value + '/' + document.getElementById('cardExpirationYear').value;
});

document.getElementById('cardExpirationYear').addEventListener('input', function() {
    cardExpirationDisplay.textContent = document.getElementById('cardExpirationMonth').value + '/' + this.value;
});

document.getElementById('cardholderName').addEventListener('input', function() {
    cardNameDisplay.textContent = this.value.toUpperCase() || 'NOME DO TITULAR';
});

</script>

</body>
</html>