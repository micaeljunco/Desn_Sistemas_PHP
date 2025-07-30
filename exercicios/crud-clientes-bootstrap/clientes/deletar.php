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
        <h2>Excluir Cliente</h2>
        <form action="../src/model/processarDelecao.php" method="POST">
            <label for="id">ID do Cliente:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Excluir Cliente</button>
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