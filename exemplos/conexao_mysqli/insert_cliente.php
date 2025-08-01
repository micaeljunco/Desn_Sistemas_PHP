<?php
// Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

// Estabelece conexão
$conexao = conectadb();

// Definição dos valores para inserção 
$nome = "Micael Junco";
$endereco = "Rua Kalamango, 32";
$telefone = "(41) 5555-5555";
$email = "mjj@teste.com";

// Prepara a consulta SQL usando 'prepare()' para evidar SQL injections
$stmt = $conexao->prepare("INSERT INTO cliente (nome, endereco, telefone, email) VALUES (?,?,?,?)");

// Associa os parâmetros aos valores da consulta
$stmt->bind_param("ssss", $nome, $endereco, $telefone, $email);

// Executa a inserção
if ($stmt ->execute()) {
    echo "[SUCESSO]: Cliente adicionado com êxito.";
} else {
    echo "[ERRO]: Não foi possível cadastrar o cliente no banco de dados." . $stmt->error;
}

// Fecha a consulta e a conexão
$stmt->close();
$conexao->close();