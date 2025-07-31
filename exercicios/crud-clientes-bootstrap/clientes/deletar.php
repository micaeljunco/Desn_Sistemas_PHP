<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
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

    <main id="pag-formulario">
        <h2>Excluir Cliente</h2>
        <form action="../src/model/processarDelecao.php" method="POST">
            <div class="mb-3">
                <label for="id" class="form-label">ID do Cliente:</label>
            </div>
            <div class="mb-3">
                <input type="number" id="id" name="id" class="form-control" required min="0" step="1">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Excluir Cliente</button>
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
</body>

</html>