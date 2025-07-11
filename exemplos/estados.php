<?php
    $estados = array(
        'AC',
        'AL',
        'AP',
        'AM',
        'BA',
        'CE',
        'DF',
        'ES',
        'GO',
        'MA',
        'MS',
        'MT',
        'MG',
        'PA',
        'PB',
        'PR',
        'PE',
        'PI',
        'RJ',
        'RN',
        'RS',
        'RO',
        'RR',
        'SC',
        'SP',
        'SE',
        'TO'
    );

    echo "Original: ";
    echo "<br> STRTOLOWER: Converte uma string para minusculas<br>";

    for ($i = 0; $i < count($estados); $i++){
        $estados[$i] = strtolower($estados[$i]);
    }

    echo "STRTOLOWER: ";
    print_r($estados);
    $rotaciona = array_shift($estados);
    echo "SHIFT:";
    print_r($estados);
    echo "<br>POP: Extrai um elemento do final de um array<br>";
    array_pop($estados);
    echo "POP:";
    print_r($estados);
    echo "<br>PUSH: Adiciona um ou mais elementos no final de um array<br>";
    array_push($estados, "...MAIS");
    echo "PUSH:";
    print_r($estados);
    echo "<br>REVERSE: Retorna um array com os elementos invertidos<br>";
    array_reverse($estados);
    echo "REVERSE:";
    print_r($estados);


?>