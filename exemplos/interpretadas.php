<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $idade = 16;
        print "Você tem " . $idade . " anos. <br>";
        print "Você tem $idade anos. <br>";
    ?>

    <?php
        $cidade = "Curitiba";
        $estado = "PR";
        $idadeCidade = 325;
        $fraseCapital = "A capital do estado de $estado é $cidade.";
        $fraseIdade = "A cidade de $cidade tem $idadeCidade anos.";
        echo "<h1>Frases sobre a cidade</h1>";
        echo "
            <p>$fraseCapital</p>
            <p>$fraseIdade<p>
        ";
    ?>

    <?php
        print "Hoje é seu {$idade}º aniversário! <br>";
    
    ?>
</body>
</html>