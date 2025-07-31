<?php
require_once '../src/config/conexao.php';

$conexao = conectarBanco();

// Obtendo o ID via GET
$idCliente = $_GET['id'] ?? null;
$cliente = null;
$msgErro = "";

// Função local para buscar cliente por ID
function buscarClientePorId($idCliente, $conexao)
{
    $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email
        FROM cliente
        WHERE id_cliente = :id");

    $stmt->bindParam(":id", $idCliente, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

if ($idCliente && is_numeric($idCliente)) {
    $cliente = buscarClientePorId($idCliente, $conexao);

    if (!$cliente) {
        $msgErro = "Erro: Cliente não encontrado.";
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="../css/style.css">
    <script>
        function habilitarEdicao(campo) {
            document.getElementById(campo).removeAttribute("readonly");
        }
    </script>
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
        <h2>Atualizar Cliente</h2>
        <!-- Se houver erro, exibe a mensagem e o campo de busca -->
        <?php if (!empty($msgErro) || !$cliente): ?>
            <p style="color:red;"><?= htmlspecialchars($msgErro) ?></p>
            <form action="atualizar.php" method="GET">
                <div class="mb-3">
                    <label for="id" class="form-label">ID do Cliente:</label>
                    <input type="text" name="id" id="id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        <?php else: ?>
            <!-- Se o cliente for encontrado exibe o formulario preenchido -->
            <form action="../src/model/processarAtualizacao.php" method="POST">
                <div class="mb-3">
                    <input type="hidden" name="id_cliente" id="id_cliente"
                        value="<?= htmlspecialchars($cliente['id_cliente']) ?>" readonly
                        onclick="habilitarEdicao('id_cliente')" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" readonly
                        onclick="habilitarEdicao('nome')" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>"
                        readonly onclick="habilitarEdicao('endereco')" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>"
                        readonly onclick="habilitarEdicao('telefone')" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" name="email" id="email" value="<?= htmlspecialchars($cliente['email']) ?>" readonly
                        onclick="habilitarEdicao('email')" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Atualizar Clientes</button>
                </div>
            </form>
        <?php endif; ?>
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