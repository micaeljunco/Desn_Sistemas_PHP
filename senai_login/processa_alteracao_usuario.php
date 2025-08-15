<?php
session_start();
require 'conexao.php';

if ($_SESSION['perfil'] != 1) {
    echo "<script>alert('Acesso negado!'); window.location.href = 'principal.php';</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $id_perfil = $_POST['id_perfil'];
    $nova_senha = !empty(($_POST['nova_senha'])) ? password_hash($_POST['nova_senha'], PASSWORD_DEFAULT) : null;

    // Atualiza dados do usuário
    if ($nova_senha) {
        $sql = "UPDATE usuario SET nome=:nome, email=:email, id_perfil=:id_perfil, senha=:nova_senha WHERE id_usuario=:id_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nova_senha', $nova_senha);
    } else {
        $sql = "UPDATE usuario SET nome=:nome, email=:email, id_perfil=:id_perfil WHERE id_usuario=:id_usuario";
        $stmt = $pdo->prepare($sql);
    }
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id_perfil',$id_perfil);
    $stmt->bindParam(':id_usuario', $id_usuario);

    if ($stmt->execute()) {
        echo "<script>alert('Usuário alterado com sucesso!'); window.location.href = 'buscar_usuario.php';</script>";
    } else {
        echo "<script>alert('[ERRO]: Não foi possível alterar as informações do usuário.'); window.location.href = 'buscar_usuario.php';</script>";
    }
}
?>