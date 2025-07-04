<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /* -----------------------
        |    FUNÇÕES DE STRING   |
        ----------------------- */ 
        
        $name = "Stefanie Hatcher";
        // Comprimento da string
        // strlen() retorna o número de caracteres na string
        $length = strlen($name);
        // Comparação
        // Retorna 0 se forem iguais, um valor negativo se a primeira for menor, ou um valor positivo se a primeira for maior
        $cmp = strcmp($name, "Brian Le");
        // Índice dos caracteres
        // strpos() retorna a posição do primeiro 'e' na string, ou false se não encontrado
        $index = strpos($name, "e");
        // Sub-string
        // substr() retorna uma parte da string, começando do índice 9 e com comprimento 5 (Hatch, 5 de comprimento e começando do 9º caractere)
        $first = substr($name, 9, 5);
        // Transformação de string
        // strtoupper() converte todos os caracteres da string para maiúsculas
        $name = strtoupper($name);
        
        echo "<h1>Funções de String</h1>";
        echo "<p>Nome: $name</p>";
        echo "<p>Comprimento: $length</p>";
        echo "<p>Comparação: $cmp</p>";
        echo "<p>Posição do 'e': $index</p>";
        echo "<p>Sub-string: $first</p>";
    ?>
</body>
</html>