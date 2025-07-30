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