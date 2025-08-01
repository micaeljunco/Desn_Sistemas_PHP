<?php

require_once "conexao.php";
// Obtem os dados
$MAX_FILE_SIZE = $_POST['MAX_FILE_SIZE'];
$evento = $_POST["evento"];
$descricao = $_POST["descricao"];
$arqImagem = $_FILES["imagem"]['tmp_name'];
$tamImagem = $_FILES["imagem"]['size'];
$tipoImagem = $_FILES["imagem"]['type'];
$nomeimagem = $_FILES["imagem"]['name'];

// Verifica se o arquivo foi enviado corretamente
if (!empty($arqImagem) && $tamImagem > 0) {
    // Lê o conteúdo do arquivo
    $fp = fopen($arqImagem,'rb');
    $conteudo = fread($fp, filesize($arqImagem));
    fclose($fp);

    // Protege contra problema de caracteres no sql
    $conteudo = mysqli_real_escape_string($conexao, $conteudo);

    $queryInsercao = "INSERT INTO imagens (evento,descricao,nome_imagem,tamanho_imagem,tipo_imagem,imagem) VALUES ('$evento','$descricao','$nomeimagem','$tamImagem','$tipoImagem','$arqImagem')";

    $result = mysqli_query($conexao, $queryInsercao);

    // Verifica se a inserção foi bem sucedida
    if ($result) {
        echo "[SUCESSO]: Registro inserido com sucesso.";
        header("Location: index.php");
    } else {
        die("[ERRO]: Não foi possível adicionar ao banco. Mais detalhes: ".mysqli_error($conexao));
    }
} else {
    die("[ERRO]: Nenhuma imagem foi anexada. Mais detalhes: ".mysqli_error($conexao));
}
