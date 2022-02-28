# Objetivo
Criado para facilitar o upload de arquivos

# Requisitos
PHP: Versão 7 ou acima | oizumi-junho/upload-php: Qualquer versão

# Configuração do arquivo composer.json

```

    "require": {
        "oizumi-junho/upload-php": "dev-master",
        "php": ">=7.0"
    }

```

# Exemplo de uso

```

<!DOCTYPE html>
<html lang="en">

<?php

require "vendor/autoload.php";

use OizumiJunho\Upload\Upload;

if (!empty($_FILES["file"]["name"])) {

    $files = array(
        "nome" => $_FILES["file"]["name"],
        "extensao" => explode('.', $_FILES["file"]["name"])[1],
        "extensoesAceitas" => ['png', 'jpg'],
        "nomeTemporario" => $_FILES["file"]["tmp_name"],
        "tamanho" => $_FILES["file"]["size"],
        "tamanhoAceitoEmBytes" => 50000,
        "caminhoParaSalvar" => "arquivos/"
    );

    var_dump(Upload::ExeUpload($files));
}

?>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Upload</title>

</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button type="submit">Enviar</button>
    </form>

</body>

</html>

```