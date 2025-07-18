<?php

$text = file_get_contents("texto.txt");
echo nl2br($text) . "<br><hr>";
$text = $text ."Extra!";
echo nl2br($text) . "<br><hr>";
file_put_contents("texto.txt", $text);
echo "<br> Micael Jeferson Junco <br>";
