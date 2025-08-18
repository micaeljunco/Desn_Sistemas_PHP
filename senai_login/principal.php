<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

require 'permissoes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    <title>Home</title>
</head>

<body>
    <header>
        <div class="saudacao">
            <h2>Bem-vindo, <?php echo $_SESSION["usuario"] ?>! Perfil: <?php echo $nome_perfil ?></h2>
        </div>

        <div class="logout">
            <form action="logout.php" method="post">
                <button type="submit">LogOut</button>
            </form>
        </div>
    </header>

    <nav>
        <ul class="menu">
            <?php foreach ($opcoes_menu as $categoria => $arquivos): ?>

                <li class="dropdown">
                    <a href="#"><?= $categoria ?></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($arquivos as $arquivo): ?>

                            <li>
                                <a href="<?= $arquivo ?>"><?= ucfirst(str_replace("_", " ", basename($arquivo, ".php"))) ?></a>
                            </li>
                        <?php endforeach ?>

                    </ul>
                </li>
            <?php endforeach ?>

        </ul>
    </nav>
    <p>Micael Jeferson Junco</p>
</body>

</html>