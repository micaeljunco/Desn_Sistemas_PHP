<?php
    $musicas = array(
        array("Kid Abelha", "Amanhã", 1993),
        array("Ultrage a Rigor", "Pelados", 1985),
        array("Paralamas do Sucesso", "Alagados", 1987)
    );

    for ($linha=0; $linha < 3; $linha++) { 
        
        for ($coluna=0; $coluna < 3; $coluna++) { 
            echo $musicas[$linha][$coluna]." | ";
        }
        echo "<br>";
    }

    echo "<br>Micael Jeferson Junco<br>";

?>