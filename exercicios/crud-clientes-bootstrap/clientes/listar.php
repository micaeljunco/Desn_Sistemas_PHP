<?php
// Inclui o arquivo de conexão com o banco de dados
require_once '../src/config/conexao.php';

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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <header id="cabecalho-pag">
        <h1 class="display-3">CRUD PHP
            <small class="text-body-secondary display-5">Micael Jeferson Junco</small>
        </h1>
    </header>

    <nav id="acesso" class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand">Acesso Rápido</a>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="../" target="_self">Home</a>
                <a class="nav-link" href="inserir.php" target="_self">Cadastrar</a>
                <a class="nav-link" href="pesquisar.php" target="_self">Pesquisar</a>
                <a class="nav-link" href="listar.php" target="_self">Visualizar</a>
                <a class="nav-link" href="atualizar.php" target="_self">Atualizar</a>
                <a class="nav-link" href="deletar.php" target="_self">Deletar</a>
            </div>
        </div>
    </nav>

    <main id="pag-formulario">
        <h2>Lista Clientes</h2>
        <table id="tabela-vizu-clientes" class="table table-striped table-hover" style="margin-top:12px;">
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
    </main>
    <footer id="rodape-pag">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <img src="../css/senai-logo.png" alt="Logo do SENAI" width="200">
            <p class="text-light m-0">Desenvolvido por Micael Jeferson Junco como parte do curso Técnico em
                Desenvolvimento de Sistemas - SC/SENAI.</p>
        </div>
    </footer>
</body>
</html>