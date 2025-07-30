<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Cliente</title>
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
        <?php

        require_once '../src/config/conexao.php';

        $conexao = conectarBanco();

        $busca = $_GET["busca"] ?? '';

        if ($busca == '') {
            ?>
            <form action="pesquisar.php" method="GET">
                <label for="busca">Digite o ID ou Nome:</label>
                <input type="text" id="busca" name="busca" required>
                <button type="submit">Pesquisar</button>
            </form>
            <?php
            exit;
        }

        if (is_numeric($busca)) {
            $stmt = $conexao->prepare('SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id');
            $stmt->bindparam(':id', $busca, PDO::PARAM_INT);
        } else {
            $stmt = $conexao->prepare('SELECT id_cliente, nome, endereco, email FROM cliente WHERE nome LIKE :nome');
            $buscaNome = "busca%";
            $stmt->bindParam(":nome", $buscaNome, PDO::PARAM_STR);
        }

        $stmt->execute();
        $clientes = $stmt->fetchAll();

        if (!$clientes) {
            die("ERRO: Nenhum cliente encontrado.");
        }
        ?>
        <table id="tabela-vizu-clientes" class="table table-striped table-hover" style="margin-top:12px;">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>telefone</th>
                <th>E-mail</th>
                <th>Ação</th>
            </tr>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= htmlspecialchars($cliente['id_cliente']) ?></td>
                    <td><?= htmlspecialchars($cliente['nome']) ?></td>
                    <td><?= htmlspecialchars($cliente['endereco']) ?></td>
                    <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                    <td><?= htmlspecialchars($cliente['email']) ?></td>
                    <td>
                        <a class="btn btn-primary" href="atualizar.php" role="button">Editar</a>
                        <a class="btn btn-danger" href="deletar.php" role="button">Excluir</a>
                    </td>
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