<?php
session_start();
include "banco.php";
if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = array();

    $tarefa['nome'] = $_GET['nome'];

    if (isset($_GET['descricao'])) {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }

    if (isset($_GET['prazo'])) {
        $tarefa['prazo'] = $_GET['prazo'];
    } else {
        $tarefa['prazo'] = '';
    }
    $tarefa['prioridade'] = $_GET['prioridade'];

    if (isset($_GET['concluida'])) {
        $tarefa['concluida'] = $_GET['concluida'];
    } else {
        $tarefa['concluida'] = '';
    }
    $sqlInsert = "INSERT INTO tarefas (nome, descricao, prazo, prioridade, concluida) VALUES (
        '{$tarefa['nome']}', 
        '{$tarefa['descricao']}', 
        '{$tarefa['prazo']}', 
        '{$tarefa['prioridade']}', 
        '{$tarefa['concluida']}'
    )";
    mysqli_query($conexao, $sqlInsert);

    $lista_tarefas = buscar_tarefas($conexao);
}
include "template.php";
//if(array_key_exists('lista_tarefas', $_SESSION)) {
//  $lista_tarefas = $_SESSION['lista_tarefas']; 
//} else {
// $lista_tarefas = []; 
//}
//session_destroy(); 0
