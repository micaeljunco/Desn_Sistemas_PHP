<?php
foreach (file('livros.txt') as $livro) {
    list($titulo, $autor) = explode(', ', $livro);
    echo "<p> Título: $titulo ".". Autor: $autor </p>";
}

echo "<br> Micael Jeferson Junco <br>";
