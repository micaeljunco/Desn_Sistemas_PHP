<?php
session_start();
require_once 'conexao.php';

// Faz a verificação de permissões
if (!isset($_SESSION['perfil']) || ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 2)) {
    echo "<script>alert('Acesso negado!'); window.location.href='principal.php';</script>";
    exit; // Para garantir que o script não continue executando
}

$usuarios = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty(trim($_POST['busca']))) {
    $busca = trim($_POST['busca']);

    // Verifica se a busca é um número ou um nome
    if (is_numeric($busca)) {
        $sql = "SELECT * FROM usuario WHERE id_usuario = :busca ORDER BY nome ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':busca', $busca, PDO::PARAM_INT);
        $stmt->execute();

    } else {
        $sql = "SELECT * FROM usuario WHERE nome LIKE :busca ORDER BY nome ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':busca', $busca . '%', PDO::PARAM_STR);
        $stmt->execute();
    }

} else {
    $sql = "SELECT * FROM usuario ORDER BY nome ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca de Usuários</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Lista de Usuários</h2>
    <form action="buscar_usuario.php" method="POST">
        <label for="busca">Digite o ID ou nome:</label>
        <input type="text" name="busca" id="busca">
        <button type="submit">Pesquisar</button>
    </form>

    <?php if(!empty($usuarios)): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>Ações</th>
            </tr>
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['id_usuario']); ?></td>
                    <td><?= htmlspecialchars($usuario['nome']); ?></td>
                    <td><?= htmlspecialchars($usuario['email']); ?></td>
                    <td><?= htmlspecialchars($usuario['id_perfil']); ?></td>
                    <td>
                        <a href="
                            alterar_usuario.php?id=<?= htmlspecialchars($usuario['id_usuario']); ?>">Alterar
                        </a>
                        <a href="
                            excluir_usuario.php?id=<?= htmlspecialchars($usuario['id_usuario']); ?>" onclick="return confirm('Tem certeza de que deseja excluir este usuário?')">Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
            <p>Nenhum usuário encontrado.</p>
        <?php endif; ?>
        <a href="principal.php">Voltar</a>
</body>
</html>