<?php
// Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

// Cria a consulta SQL para selecionar os dados principais (sem a coluna 'imagem')

$querySelecao = "SELECT codigo,evento,descricao,nome_imagem,tamanho_imagem FROM imagens";

$result = mysqli_query($conexao, $querySelecao);

if (! $result) {
    die("[ERRO]: Não foi possível realizar a consulta. Detalhes: ". mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armazenamento de Imagens no Banco de Dados</title>
</head>
<body>
    <main>
        <h2>Selecione um novo arquivo de imagem</h2>
        <form enctype="multipart/form-data" action="upload.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" value="999999999">
            <input type="text" name="evento" placeholder="Nome do Evento">
            <input type="text" name="descricao" placeholder="Descrição">
            <input type="file" name="imagem">
            <button type="submit">Salvar</button>
        </form>
        <table>
            <tr>
                <th>Código</th>
                <th>Evento</th>
                <th>Descrição</th>
                <th>Nome da Imagem</th>
                <th>Tamanho</th>
                <th colspan="2">Ações</th>
            </tr>
            
            <?php
            while ($arquivos = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $arquivos["codigo"];?></td>
                    <td><?php echo $arquivos["evento"];?></td>
                    <td><?php echo $arquivos["descricao"];?></td>
                    <td><?php echo $arquivos["nome_imagem"];?></td>
                    <td><?php echo $arquivos["tamanho_imagem"];?></td>
                    <td>
                        <a href="ver_imagens.php?id=<?php echo $arquivos['codigo'] ?>">Ver</a>
                    </td>
                    <td>
                        <a href="excluir_imagens.php?id=<?php echo $arquivos['codigo'] ?>">Excluir</a>
                    </td>
                </tr>
            <?php }?>
            
        </table>
    </main>

</body>
</html>