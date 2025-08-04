<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main id="conteudo-cad">
        <div class="titulo-pag">
            <h1>Cadastro</h1>
            <h2> de Funcionários</h2>
        </div>

        <form action="salvar_funcionario.php" method="post" enctype="multipart/form-data">
            <div class="campo-form">
                <label for="nome-func">* Nome:</label>
                <input type="text" name="nome-func" id="nome-func" required maxlength="255">
            </div>

            <div class="campo-form">
                <label for="tel-func">* Telefone:</label>
                <input type="tel" name="tel-func" id="tel-func" required>
            </div>

            <div class="campo-form">
                <label for="foto-func">* Foto do Funcionário:</label>
                <input type="file" name="foto-func" id="foto-func" required>
            </div>

            <div class="botoes-form">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
</body>

</html>
