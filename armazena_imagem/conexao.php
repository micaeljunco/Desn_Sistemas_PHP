<?php
// Habilita relatório detalhado dos erros no MySQL
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Configuração do banco de dado:
$endereco = "localhost";    // Endereço do servidor MySQL
$usuario = "root";          // Nome do usuário do banco de dados
$senha = "";                // Senha do usuário
$banco = "armazena_imagem";         // Nome do banco de dados

$conexao = mysqli_connect($endereco, $usuario, $senha, $banco);
if (!$conexao) {
    die("[ERRO]: Impossível conectar-se ao banco de dados". $conexao -> connect_error);
}