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