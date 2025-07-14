<?php
    $numeros = array(
        1, 2, 3, 4, 5,
        6, 7, 8, 9, 10,
        11, 12, 13, 14, 15,
        16, 17, 18, 19, 20
    );

    echo "Micael Jeferson Junco <br>";
    echo "<h1>Tabuada</h1>";

    // Esse laço for percorre todo o array numérico para entrar na tabuada de cada um
    // A função count serve para determinar o comprimento do array para melhor modularidade
    for ($i=0; $i < count($numeros); $i++) { 
        // Esse segundo for determina por qual valor os números são multiplicados, 
        // nesse caso de um até 10, mas poderia ser expandido 
        for ($j=0; $j < 10; $j++) { 
            // Imprime a multiplicação e o produto com formatação e concatenado
            echo "$numeros[$i] X $numeros[$j] = <b>" .
                ($numeros[$i]*$numeros[$j]) . "</b><br>";

        }

        //Separa as tabuadas
        echo "<br>";
    }
?>