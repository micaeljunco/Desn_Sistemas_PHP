<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de formulário com PHP</title>
</head>

<body>
    <h1>Formulário</h1>
    <form method="get">
        <label for="campoNome">Nome</label>
        <input type="text" name="campoNome" id="campoNome" placeholder="Digite seu nome...">

        <label for="campoIdade">Idade</label>
        <input type="Number" name="campoIdade" id="campoIdade" placeholder="16..." min="0" max="121">

        <button type="submit">Enviar</button>
    </form>
</body>

</html>