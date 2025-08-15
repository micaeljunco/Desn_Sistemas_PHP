<?php
session_start();
require 'conexao.php';

if ($_SESSION['perfil'] != 1) {
    echo "<script>alert('Acesso negado!'); window.location.href = 'principal.php';</script>";
    exit();
}

$usuarios = [];

$sql = "SELECT * FROM usuario ORDER BY nome ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = $_GET['id'];

    $sql = "DELETE FROM usuario WHERE id_usuario = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_usuario);

    if ($stmt->execute()) {
        echo "<script>alert('Usuário excluído com sucesso!'); window.location.href = 'excluir_usuario.php';</script>";
    } else {
        echo "<script>alert('[ERRO]: Não foi possível excluir o usuário.'); window.location.href = 'excluir_usuario.php';</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js"></script>
</head>

<body>
    <h2>Excluir Usuário</h2>
    <?php if (!empty($usuarios)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['id_usuario']); ?></td>
                        <td><?= htmlspecialchars($usuario['nome']); ?></td>
                        <td><?= htmlspecialchars($usuario['email']); ?></td>
                        <td><?= htmlspecialchars($usuario['id_perfil']); ?></td>
                        <td><a href="excluir_usuario.php?id=<?= htmlspecialchars($usuario['id_usuario']) ?>"
                                onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir Usuário</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum usuário encontrado.</p>
    <?php endif; ?>
    <a href="principal.php">Voltar</a>
    <p>Micael Jeferson Junco</p>
</body>

</html>