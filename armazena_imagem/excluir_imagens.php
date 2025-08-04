<?php

require 'conexao.php';

$id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;


// Verifica se o id é válido

if ($id_imagem>0) {
    $queryExclusao = "DELETE FROM imagens WHERE codigo = ?";

    // Prepara a query
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param('i', $id_imagem);

    // Executa a exclusão
    if ($stmt->execute()) {
        echo "[SUCESSO]: Imagem excluída com êxito!";
    } else {
        die("[ERRO]: Não foi possível excluir a imagem. Mais detalhes: ".$stmt->error);
    }

    // Fecha a consulta
    $stmt->close();
} else {
    echo "[INFO]: ID inválido!";
}

// Redireciona de volta para o index
header('Location: index.php');
exit();