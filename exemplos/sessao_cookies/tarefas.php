<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
</head>

<body>
    <h1>Gerenciador de Tarefas</h1>
    <form>
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label for="tarefaNova">Tarefa:</label>
            <input type="text" name="tarefaNova" id="tarefaNova">
            <button type="submit">Adicionar</button>
        </fieldset>
    </form>
    <?php

    if (!isset($_SESSION["lista_tarefas"]) || !is_array($_SESSION["lista_tarefas"])) {
        $_SESSION["lista_tarefas"] = array();
    }

    if (isset($_GET["tarefaNova"]) && !empty($_GET["tarefaNova"])) {
        $_SESSION["lista_tarefas"][] = $_GET["tarefaNova"];
    }

    $lista_tarefas = $_SESSION["lista_tarefas"];
    echo "<br> Micael Jeferson Junco <br>";
    ?>


    <table>
        <tr>
            <th>Tarefas</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>
                <td><?php echo htmlspecialchars($tarefa); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>



</body>

</html>