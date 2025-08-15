<?php
session_start();
require_once 'conexao.php';

// Verifica se o usuário tem permissão supondo que o perfil 1 seja ADM

if ($_SESSION['perfil'] != 1) {
    echo "Acesso Negado!";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $id_perfil = $_POST['id_perfil'];

    $sql = "INSERT INTO usuario(nome, email, senha, id_perfil) VALUES (:nome, :email, :senha, :id_perfil)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha);
    $stmt->bindParam(":id_perfil", $id_perfil);

    if ($stmt->execute())
    {
        echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
    }
    else
    {
        echo "<script>alert('Erro ao cadastrar usuário!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Cadastrar Usuário</h2>
    <form action="cadastro_usuario.php" method="post">
        <label for="nome">* Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="nome">* Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="senha">* Senha:</label>
        <input type="text" name="senha" id="senha" required>
        
        <label for="id_perfil">* Perfil:</label>
        <select name="id_perfil" id="id_perfil" required>
            <option value="1">Administrador</option>
            <option value="2">Secretaria</option>
            <option value="3">Almoxarifado</option>
            <option value="4">Cliente</option>
        </select>

        <button type="submit">Cadastrar</button>
        <button type="reset">Cancelar</button>
    </form>
    <a href="principal.php">Voltar</a>
</body>
</html>