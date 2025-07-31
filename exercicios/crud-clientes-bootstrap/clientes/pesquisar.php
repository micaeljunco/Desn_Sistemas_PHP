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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

    <div class="acesso bg-body-tertiary sticky-top">
        <a class="acesso dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Acesso
            Rápido</a>

        <div class="collapse dropdown-menu" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <a class="nav-link" href="../" target="_self">Home</a>
                <a class="nav-link" href="inserir.php" target="_self">Cadastrar</a>
                <a class="nav-link" href="pesquisar.php" target="_self">Pesquisar</a>
                <a class="nav-link" href="listar.php" target="_self">Visualizar</a>
                <a class="nav-link" href="atualizar.php" target="_self">Atualizar</a>
                <a class="nav-link" href="deletar.php" target="_self">Deletar</a>
            </ul>
        </div>
    </div>

        <?php

        require_once '../src/config/conexao.php';

        $conexao = conectarBanco();

        $busca = $_GET["busca"] ?? '';

        if ($busca == '') {
            ?>
    <main id="pag-formulario">

            <h2>Pesquisar Clientes</h2>
            <form action="pesquisar.php" method="GET">
                <div class="mb-3">
                    <label for="busca" class="form-label">Digite o ID ou Nome:</label>
                    <input type="text" id="busca" name="busca" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </form>
        </main>
        <footer id="rodape-pag">
            <div class="container d-flex justify-content-between align-items-center flex-wrap">
                <img src="../css/senai-logo.png" alt="Logo do SENAI" width="200">
                <p class="text-light m-0">Desenvolvido por Micael Jeferson Junco como parte do curso Técnico em
                    Desenvolvimento de Sistemas - SC/SENAI.</p>
            </div>
        </footer>
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
    <main id="pag-formulario">

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