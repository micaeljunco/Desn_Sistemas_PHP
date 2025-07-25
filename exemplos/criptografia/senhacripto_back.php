<?php
if (isset($_POST["senha"]) && isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    echo "Recebido ".$usuario." e ".$senha."!";
    $cripto = MD5($senha);
    echo "Criptografias ".$cripto;
    echo "<br> Micael Jeferson Junco <br>";

}