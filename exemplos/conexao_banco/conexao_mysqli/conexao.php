<?php
// Habilita relatório detalhado dos erros no MySQL
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/*
 * Função para conectar ao banco de dados
 * Retorna um objeto de conexão MySQL ou 
 * interrompe o script em caso de erro. 
 */

function conectadb () {
    // Configuração do banco de dado:
    $endereco = "localhost";    // Endereço do servidor MySQL
    $usuario = "root";          // Nome do usuário do banco de dados
    $senha = "";                // Senha do usuário
    $banco = "empresa";         // Nome do banco de dados

    try {
        // Criação da conexão
        $conectadb = new mysqli($endereco, $usuario, $senha, $banco);
        
        // Definição do conjunto de caracteres para evitar problemas
        $conectadb->set_charset("utf8mb4");
        return $conectadb;

    }

    catch (Exception $e) {
        // Exibe uma mensagem de erro
        die("Erro de conexão: ". $e->getMessage());
        
    }

}