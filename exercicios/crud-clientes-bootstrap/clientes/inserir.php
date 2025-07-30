<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Clientes</title>
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
        <h2>Cadastro Clientes</h2>
        <form action="../src/model/processaInsercao.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">* Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required maxlength="50"
                    placeholder="Pedro Oliveira">
                <div id="usernameHelp" class="form-text">No máximo 50 caractéres.</div>
            </div>

            <div class="mb-3">
                <label for="endereco" class="form-label">* Endereço:</label>
                <input type="text" name="endereco" id="endereco" class="form-control" required maxlength="80"
                    placeholder="Rua 123 Bairro">
                <div id="enderecoHelp" class="form-text">Endereço do cliente até 80 caractéres.</div>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">* Telefone:</label>
                <input type="text" name="telefone" id="telefone" class="form-control" required maxlength="20"
                    placeholder="12 12345 12345">
                <div id="telHelp" class="form-text">Telefone até 20 caractéres.</div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">* Email:</label>
                <input type="text" name="email" id="email" class="form-control" required maxlength="50"
                    placeholder="exemplo@me.com">
                <div id="emailHelp" class="form-text">Apenas emails válidos de até 50 caractéres.</div>
            </div>

            <div class="mb-3 d-flex flex-row justify-content-between">
                <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
                <button type="reset" class="btn btn-outline-danger">Cancelar</button>
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