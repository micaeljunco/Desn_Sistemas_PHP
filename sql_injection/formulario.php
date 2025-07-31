<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
        }
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        div {
            margin: 20px;
            padding: 30px;
        }

        form button {
            display: block;
        }
    </style>
</head>
<body>
    <main>
        <div>
            <h2>Sem Segurança</h2>
            <form action="login_inseguro.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="...">
                <button type="submit">Entrar</button>
            </form>
        </div>
        <div>
            <h2>Com Segurança</h2>
            <form action="login_seguro.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="...">
                <button type="submit">Entrar</button>
            </form>
        </div>
    </main>
</body>
</html>