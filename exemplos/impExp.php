<?php
string : $turma = "Turma de Desenvolvimento";
echo "Turma: ".$turma."<br>";

$turma1 = explode(" ", $turma);
echo "turma1: "; print_r($turma1); echo "<br>";
$turma2 = implode(" ", $turma1);
echo "turma2: "; print_r($turma2); echo "<br>";

echo "<br> Micael Jeferson Junco <br>";
