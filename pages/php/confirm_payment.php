<?php 
include("conexao.php");
session_start();
if( !isset($_SESSION['usuario'])){


    header("location: ../../argon-dashboard-master/pages/sign-in.php");

}
$id_usuario = $_SESSION['usuario']; // Substitua isso pela obtenção do ID do usuário de forma segura, como $_SESSION['id_usuario']
$total_pedido = 0; // Vamos calcular o total com base nos itens no carrinho.


?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout Estilizado</title>
<style>
  /* Reset básico para evitar inconsistências entre diferentes navegadores */
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Arial', sans-serif; background: #eceff1; padding: 20px; }
  
  /* Container principal */
  .container {
    max-width: 800px; margin: auto; background: white; padding: 20px;
    border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  
  /* Seções e cabeçalhos */
  .section {
    background: #ffffff; padding: 20px; margin-bottom: 20px; border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
  }
  .section-header {
    font-size: 1.5em; color: #333; margin-bottom: 20px;
    padding-bottom: 10px; border-bottom: 3px solid #5c6bc0;
  }
  
  /* Estilos de Rádio e Formulários */
  .radio-group { margin-bottom: 15px; }
  .radio-group label {
    display: block; background: #f6f8fa; border: 1px solid #d1d9e6;
    padding: 10px 15px; margin-bottom: 10px; border-radius: 6px;
    cursor: pointer; transition: transform 0.2s ease-in-out;
    display: flex; align-items: center;
  }
  .radio-group input[type="radio"] {
    display: none;
  }
  .radio-group input[type="radio"]:checked + label {
    background-color: #5c6bc0; color: white; border-color: #5c6bc0;
    transform: scale(1.02);
  }
  .radio-group label:hover {
    background-color: #e8eaf6;
  }
  
  /* Botões */
  .btn {
    background-color: #5c6bc0; color: white; padding: 12px 20px;
    border: none; border-radius: 6px; cursor: pointer; font-size: 16px;
    transition: background-color 0.3s ease;
  }
  .btn:hover { background-color: #3949ab; }
  
  /* Estilos de itens e resumo */
  .item-carrinho { padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #d1d9e6; }
  .total-line { display: flex; justify-content: space-between; font-weight: bold; margin-top: 10px; }
  .item-carrinho {
    padding: 10px;
    background: #fafafa;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    margin-bottom: 15px;
  }
  .item-carrinho span, .item-carrinho p {
    display: block;
  }
  .item-carrinho span {
    font-size: 1.1em;
    color: #333;
  }
  .item-carrinho p {
    color: #666;
    font-size: 0.9em;
    margin: 5px 0;
  }
  .item-total {
    font-weight: bold;
    color: #333;
    font-size: 1.1em;
  }V
  /* Responsividade */
  @media (max-width: 600px) {
    .container { width: 100%; padding: 10px; }
    .section-header { font-size: 1.2em; }
  }
</style>
</head>
<body>
<div class="container">
  <form action=""  id="payment-form"  method="GET">
    <!-- Seção de escolha de endereço de envio -->
    <div class="section">
      <div class="section-header">Escolha um endereço de envio</div>
      <div class="radio-group">
        <!-- PHP para gerar os endereços como opções de rádio -->
        <?php 
        $sql = "SELECT endereco FROM clientes WHERE id = $id_usuario";
        $query = $mysqli->query($sql);
        while($row = $query->fetch_assoc()){
          $endereco = $row['endereco'];
          echo "<input type='radio' id='endereco_$endereco' name='endereco' value='$endereco' required>";
          echo "<label for='endereco_$endereco'><span>$endereco</span></label>";
        }
        $sql2 = "SELECT * FROM enderecos WHERE id_usuario = $id_usuario";
        $query2 = $mysqli->query($sql2);
        while($row2 = $query2->fetch_assoc()){
          $endereco2 = $row2['endereco'];
          echo "<input type='radio' id='endereco_$endereco2' name='endereco' value='$endereco2' required>";
          echo "<label for='endereco_$endereco2'><span>$endereco2</span></label>";
        }
        ?>
      </div>
    </div>

    <!-- Seção de método de pagamento -->
            <div class="section">
            <div class="section-header">Método de pagamento</div>
            <div class="radio-group">
                <input type="radio" id="metodo_pagamento_pix" name="metodo_pagamento" value="pix" required>
                <label for="metodo_pagamento_pix"><span>Pix</span></label>
                <input type="radio" id="metodo_pagamento_cartao" name="metodo_pagamento" value="cartao" required>
                <label for="metodo_pagamento_cartao"><span>Cartão de Crédito</span></label>
                <!-- Adicione mais métodos conforme necessário -->
            </div>
            </div>

    <!-- Seção de itens e envio -->
    <div class="section">
            <div class="section-header">Itens e envio</div>
            <?php 
            $cont = 0;
            $sql = "SELECT * FROM carrinho WHERE id_usuario = $id_usuario";
            $query = $mysqli->query($sql);
           
            while($row = $query->fetch_assoc()){
                $id_prod = $row['id_prod'];
                $quantidade = $row['quantidade'];

                $sql2 = "SELECT * FROM produto WHERE id = $id_prod";
                $query2 = $mysqli->query($sql2);
                while($row2 = $query2->fetch_assoc()){
                    $nome_prod = $row2['nome'];
                    $preco = $row2['preco'];
                    $subtotal = $preco * $quantidade;
                    $total_pedido += $subtotal;

                    echo "<div class='item-carrinho'>";
                    echo "<span>$nome_prod</span>";
                    echo "<p>Quantidade: $quantidade</p>";
                    echo "<p>Preço unitário: R$ ".number_format($preco, 2, ',', '.')."</p>";
                    echo "<p class='item-total'>Subtotal: R$ ".number_format($subtotal, 2, ',', '.')."</p>";
                    echo "<input type='hidden' name='id_prod_$cont' value='$id_prod'>";
                    echo "<input type='hidden' name='quantidade_$cont' value='$quantidade'>";
                    echo "</div>";
                    $cont++;
                }
            }
            ?>
            <input type="hidden" name="total_itens" value="<?php echo $cont; ?>">
        </div>

    <!-- Coluna de resumo do pedido -->
    <div class="right-column">
      <div class="section summary">
        <div class="section-header">Resumo do pedido</div>
        <input type="hidden" id="total_value" name="total_value" value="<?php echo $total_pedido ?>">
<input type="hidden" name="id_prod" value="<?php echo $id_prod; ?>">
<input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
        <div class="total-line">Total do pedido: R$ <?php echo number_format($total_pedido, 2, ',', '.'); ?></div>
        <button type="submit" class="btn">Finalizar Pedido</button>
      </div>
    </div>
  </form>
</div>
<script>
    document.getElementById('payment-form').addEventListener('submit', function(event) {
        var metodoPagamento = document.querySelector('input[name="metodo_pagamento"]:checked').value;
        if (metodoPagamento === 'pix') {
            this.action = 'qrcode_pix.php';
        } else if (metodoPagamento === 'cartao') {
            this.action = '../mercado_pago.php';
        }
    });
</script>

</body>
</html>
