<?php
    echo "<br>Micael Jeferson Junco<br>";

    $vogals = array(
        'a', 'e', 'i', 'o', 'u',
        'A', 'E', 'I', 'O', 'U'
    );

    echo '<h1>Hello World of PHP!</h1>';

    $cons = str_replace($vogals, '', 'Hello World of PHP');

    echo "<p>Consoantes: $cons</p>";

    #        012345678901
    $test = "Hello World! \n";

    print "Posição da letra 'o' : ";
    print strpos($test, 'o'). "<br>";

    print "Posição da letra 'o' após 5ª: ";
    print strpos($test, 'o', 5). "<br>";

    $message = "Trocar letra uma a uma:";

    echo "<h3>$message</h3>";

    $new_message = strtr($message, 'abcdef', '123456');
    echo "Criptografando: ".$new_message."<br>";

    $new_message = strtr($message, '123456', 'abcdef');
    echo "Descriptografando: ".$new_message."<br>";


?>