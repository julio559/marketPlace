    <?php
    
    if (isset($_FILES['file'])) {
        $arquivo = $_FILES['file'];

        if ($arquivo['error']) {
            $erro = 'Falha ao enviar o arquivo';
        }

        if ($arquivo['size'] > 2097152) {
            $erro = 'Tamanho de arquivo muito grande';
        }

        $pasta = "uploads/";

        $nomeA = $arquivo['name'];
        $novo = uniqid();
        $extensao = strtolower(pathinfo($nomeA, PATHINFO_EXTENSION));

        if ($extensao != "png" && $extensao != "jpg" && $extensao != "jpeg") {
            $erro = 'Você está tentando enviar um arquivo que não é uma imagem';
        }

        $path = $pasta . $novo . "." . $extensao;
        $caminho_completo = $path;

        $enviado = move_uploaded_file($arquivo['tmp_name'], $caminho_completo);
    }


    ?>