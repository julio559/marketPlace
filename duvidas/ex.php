<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your existing head elements -->
</head>
<body>
    <!-- Your existing body content -->

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
      const mp = new MercadoPago('YOUR_PUBLIC_KEY', { locale: 'pt-BR' });

      // Replace <PREFERENCE_ID> with the actual preference ID from PHP
      mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "<?php echo $preference->id; ?>",
        },
      });
    </script>
</body>
</html>




