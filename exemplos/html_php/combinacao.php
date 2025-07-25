<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        // Função usada para definir fuso horário padrão
        date_default_timezone_set('America/Sao_Paulo');
        // Manipulando HTML e PHP
        $data_hoje = date('d/m/Y', time());

    ?>

    <h1 style="text-align: center;">
        Exemplo de Combinação de HTML e PHP</h1>

    <p style="text-align: center;">
        Hoje é <?php echo $data_hoje; ?>.
    </p>
    <p>Micael Jeferson Junco</p>

</body>
</html>