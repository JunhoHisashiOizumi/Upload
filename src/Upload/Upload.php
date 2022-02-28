<?php

namespace OizumiJunho\Upload;

/*
    $files = array(
        "nomeDoArquivo" => $_FILES["file"]["name"],
        "extensaoDoArquivo" => explode('.', $_FILES["file"]["name"])[1],
        "extensoesAceitas" => ['png', 'jpg'],
        "nomeTemporarioDoArquivo" => $_FILES["file"]["tmp_name"],
        "tamanhoDoArquivo" => $_FILES["file"]["size"],
        "tamanhoAceitoEmBytes" => 50000,
        "caminhoParaSalvar" => "arquivos/"
    );

*/

class Upload
{

    public static function ExeUpload($dados)
    {

        if (self::ValidarDados($dados) == "não") {

            if ($dados['tamanhoDoArquivo'] > $dados['tamanhoAceitoEmBytes']) {
                return "Tamanho não permitido";
            } else {

                if (self::ValidarExtensoesPermitidas($dados['extensaoDoArquivo'], $dados['extensoesAceitas']) == "permitido") {

                    $nomeFinal = $dados['caminhoParaSalvar'] . date("dmYHis") . $dados['nomeDoArquivo'];
                    move_uploaded_file($dados['nomeTemporarioDoArquivo'], $nomeFinal);

                    return "Upload realizado";
                } else {
                    return "Extenção não permitida";
                }
            }
        } else {
            return "Dados incorretos";
        }
    }

    public static function ValidarExtensoesPermitidas($nomeDaExtensao, $extensoesPermitidas)
    {
        $statusPermissao = 'não permitido';

        foreach ($extensoesPermitidas as $resExtensoesPermitidas) {

            if ($nomeDaExtensao == $resExtensoesPermitidas) {
                $statusPermissao = 'permitido';
            }
        }

        return $statusPermissao;
    }

    public static function ValidarDados($dados)
    {
        $camposVazios = 'não';

        foreach ($dados as $res) {

            if (empty($res)) {
                $camposVazios = 'sim';
            }
        }

        return $camposVazios;
    }
}
