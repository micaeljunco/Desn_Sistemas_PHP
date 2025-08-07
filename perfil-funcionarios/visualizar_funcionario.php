<?php
// Configuração do banco de dados
$host = 'localhost';
$dbname = 'bd_imagens';
$username = 'root';
$password = '';

try {
    // Monta a DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    // Cria a conexão PDO
    $pdo = new PDO($dsn, $username, $password);

    // Define o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        // Verifica se a exclusão do funcionário foi solicitada
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['excluir_id'])) {
            $excluir_id = $_POST['excluir_id'];
            $sql_excluir = "DELETE FROM funcionarios WHERE id = :excluir_id";
            $stmt_excluir = $pdo->prepare($sql_excluir);
            $stmt_excluir->bindParam(':excluir_id', $excluir_id, PDO::PARAM_INT);
            $stmt_excluir->execute();

            // Redireciona para evitar reenvio do formulário
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }

        // Recupera os dados do funcionário no banco de dados
        $sql = "SELECT id, nome, telefone, tipo_foto, foto FROM funcionarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);                                // Prepara a instrução SQL para execução
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);   // Vincula o valor de $id ao parâmetro :id 
        $stmt->execute();                                                  // Executa a instrução SQL

        if ($stmt->rowCount() > 0) {
            // Busca dados do funcionario como um array associativo
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo '[ERRO]: Funcionário não encontrado';
            exit();
        }
    } else {
        echo '[ERRO]: ID do funcionário não foi fornecido.';
        exit();
    }
} catch (PDOException $e) {
    echo '[ERRO]: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Funcionário</title>
</head>

<body>
    <main id="principal-vizu">
        <div class="titulo-pag">
            <h1>Visualizar</h1>
            <h2>Funcionário</h2>
        </div>

        <p>
            Nome: <?= htmlspecialchars($funcionario['nome']) ?>
        </p>
        <p>
            Telefone: <?= htmlspecialchars($funcionario['telefone']) ?>
        </p>
        <p>Foto:
            <img src="data:<?= $funcionario['tipo_foto'] ?>;base64,<?= base64_encode($funcionario['foto']) ?>"
                alt="Imagem de <?= htmlspecialchars($funcionario['nome']) ?>">
        </p>
        <form method="post">
            <input type="hidden" name="excluir_id" value="<?= $id ?>">
            <button type="submit">Excluir Funcionário</button>
        </form>
    </main>
</body>

</html>
