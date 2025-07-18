<?php
# FILE_IGNORE_NEW_LINES ignora o \n de cada linha
$linhas = file("texto.txt", FILE_IGNORE_NEW_LINES);
var_dump($linhas);

foreach ($linhas as $li => $linha) {
    echo "<br> Linha $li : $linha";
}

echo "<br> Micael Jeferson Junco <br>";
