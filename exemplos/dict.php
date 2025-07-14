<?php
    echo "<br>Micael Jeferson Junco<br>";

    $AmazonProducts = array(
        array("Código" => "Livros", "Descrição" => "Livros", "Preço" => 50),
        array("Código" => "DVDs", "Descrição" => "Filmes", "Preço" => 15),
        array("Código" => "CDs", "Descrição" => "Música", "Preço" => 20)

    );

    for ($linha=0; $linha < 3; $linha++) { ?>
        <p>
            | <?= $AmazonProducts[$linha]['Código'] ?>
            | <?= $AmazonProducts[$linha]['Descrição'] ?>
            | <?= $AmazonProducts[$linha]['Preço'] ?>
        </p>
        <?php
    }
?>