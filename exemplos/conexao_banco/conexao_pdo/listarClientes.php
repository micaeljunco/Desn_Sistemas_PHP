<?php
// Inclui o arquivo de conexão com o banco de dados
require 'conexao.php';

// Chama a função para estabelecer a conexão com o banco de dados
$conexao = conectarBanco();

// Prepara uma consulta SQL para selecionar todos os registros da tabela "cliente"
$stmt = $conexao->prepare('SELECT * FROM cliente');

// Executa a consulta preparada
$stmt->execute();

// Obtém todos os resultados da consulta em forma de array associativo
$clientes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista Clientes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>            
        </tr>
        <!-- Loop para exibir cada cliente como uma linha na tabela -->
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <!-- Exibe os dados do cliente, escapando caracteres especiais para evitar ataques XSS -->
            <td> <?= htmlspecialchars($cliente["id_cliente"]) ?></td>
            <td> <?= htmlspecialchars($cliente["nome"]) ?></td>
            <td> <?= htmlspecialchars($cliente["endereco"]) ?></td>
            <td> <?= htmlspecialchars($cliente["telefone"]) ?></td>
            <td> <?= htmlspecialchars($cliente["email"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>