<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Clientes</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form label, input, button {
            display: block;
        }
    </style>
</head>
<body>
    <h2>Cadastro Clientes</h2>
    <form action="processaInsercao.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required maxlength="50">

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" required maxlength="80">

        <label for="telefone">telefone:</label>
        <input type="text" name="telefone" id="telefone" required maxlength="20">
        
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required maxlength="50">

        <button type="reset">Cancelar</button>
        <button type="submit">Cadastrar Cliente</button>
    </form>
</body>
</html>

