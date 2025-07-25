<?php
    echo "<br>Micael Jeferson Junco<br>";
    # rand - Gera um inteiro aleatório
    $sorteio = rand(0, 5);

    echo "<p>Sorteado: $sorteio</p>";

    /*
    | array_merge - Combina um ou mais arrays
    | range - Cria um array contendo uma faixa de elementos com:
    | (inicio, fim, passo)
    */

    $vetor = array_merge(range(0, 10),
        range($sorteio, 20, 2),
        array($sorteio)
    );

    print_r($vetor);
    echo "<hr>";
    // embaralha
    shuffle($vetor);
    print_r($vetor);
    echo "<hr>";
?>