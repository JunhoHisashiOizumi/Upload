<!DOCTYPE html>
<html lang="en">

<?php

require "vendor/autoload.php";

use OizumiJunho\Upload\Upload;

if (!empty($_FILES["file"]["name"])) {

    $files = array(
        "nomeDoArquivo" => $_FILES["file"]["name"],
        "extensaoDoArquivo" => explode('.', $_FILES["file"]["name"])[1],
        "extensoesAceitas" => ['png', 'jpg'],
        "nomeTemporarioDoArquivo" => $_FILES["file"]["tmp_name"],
        "tamanhoDoArquivo" => $_FILES["file"]["size"],
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