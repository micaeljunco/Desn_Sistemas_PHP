<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="../../css/style.css">
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
                <a class="nav-link" href="../../" target="_self">Home</a>
                <a class="nav-link" href="../../clientes/inserir.php" target="_self">Cadastrar</a>
                <a class="nav-link" href="../../clientes/pesquisar.php" target="_self">Pesquisar</a>
                <a class="nav-link" href="../../clientes/listar.php" target="_self">Visualizar</a>
                <a class="nav-link" href="../../clientes/atualizar.php" target="_self">Atualizar</a>
                <a class="nav-link" href="../../clientes/deletar.php" target="_self">Deletar</a>
            </ul>
        </div>
    </div>

    <main id="secao-principal-index">
        <?php
        // Inclui o arquivo de conexão com o banco de dados
        require_once "../config/conexao.php";

        // Verifica se o método da requisição é POST (indica envio de formulário)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Estabelece a conexão com o banco de dados
            $conexao = conectarBanco();

            // Define a consulta SQL para inserir um novo cliente na tabela "cliente"
            // Os valores são representados por placeholders (ex.: :nome) para evitar injeção de SQL
            $sql = "INSERT INTO cliente (nome, endereco, telefone, email)
            VALUES(:nome, :endereco, :telefone, :email)";

            // Prepara a consulta SQL
            $stmt = $conexao->prepare($sql);

            // Associa os valores enviados pelo formulário aos placeholders da consulta
            $stmt->bindParam(":nome", $_POST["nome"]);
            $stmt->bindParam(":endereco", $_POST["endereco"]);
            $stmt->bindParam(":telefone", $_POST["telefone"]);
            $stmt->bindParam(":email", $_POST["email"]);

            try {
                // Executa a consulta preparada
                $stmt->execute();
                // Exibe uma mensagem de sucesso ao usuário
                echo "Cliente cadastrado com sucesso!";
            } catch (PDOException $e) {
                // Registra o erro no log do servidor sem expor detalhes ao usuário
                error_log("Erro ao inserir cliente: " . $e->getMessage());
                // Exibe uma mensagem genérica de erro ao usuário
                echo "Erro inesperado ao cadastrar cliente.";
            }
        }
        ?>
    </main>

    <footer id="rodape-pag">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <img src="../../css/senai-logo.png" alt="Logo do SENAI" width="200">
            <p class="text-light m-0">Desenvolvido por Micael Jeferson Junco como parte do curso Técnico em
                Desenvolvimento de Sistemas - SC/SENAI.</p>
        </div>
    </footer>
</body>

</html>