<?php
session_start();
require_once 'conexao.php';

// Faz a verificação de permissões
if ($_SESSION['perfil'] != 1 && $_SESSION['perfil'] != 2) {
    echo "<script>alert('Acesso negado!'); window.location.href='principal.php';</script>";
}

$usuarios = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['busca'])) {
    $busca = trim($_POST['busca']);

    // Verifica se a busca é um número ou um nome
    if (is_numeric($busca)) {
        $sql = "SELECT * FROM usuario WHERE id_usuario = :busca ORDER BY nome ASC";
        $stmt->bindParam(':busca', $busca, PDO::PARAM_INT);

    } else {
        $sql = "SELECT * FROM usuario WHERE nome LIKE :busca ORDER BY nome ASC";
        $stmt->bindValue(':busca', "$busca%", PDO::PARAM_STR);
    }

} else {
    $sql = "SELECT * FROM usuario ORDER BY nome ASC";
}

$stmt = $pdo->prepare($sql);
$stmt->execute();
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
    </form>

    <?php if(!empty($usuarios)): ?>
        <table>
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
                </tr>

            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>