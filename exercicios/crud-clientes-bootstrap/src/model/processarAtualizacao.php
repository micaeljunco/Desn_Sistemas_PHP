<?php
require_once "../config/conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexao = conectarBanco();

    $id = filter_var($_POST['id_cliente'], FILTER_SANITIZE_NUMBER_INT);
    $nome = htmlspecialchars(trim($_POST['nome']));
    $endereco = htmlspecialchars(trim($_POST['endereco']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if (!$id || !$email) {
        die('ERRO: ID Inválido ou e-mail incorreto.');
    }

    $sql = "UPDATE cliente SET nome = :nome, endereco = :endereco, telefone = :telefone, email = :email WHERE id_cliente = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":endereco", $endereco);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":email", $email);

    try {
        // Executa a consulta preparada
        $stmt->execute();
        // Exibe uma mensagem de sucesso ao usuário
        echo "Cliente atualizado com sucesso!";
    } catch (PDOException $e) {
        // Registra o erro no log do servidor sem expor detalhes ao usuário
        error_log("Erro ao atualizar cliente: " . $e->getMessage());
        // Exibe uma mensagem genérica de erro ao usuário
        echo "Erro inesperado ao atualizar registro.";
    }

}