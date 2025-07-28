<?php
// Função para estabelecer uma conexão com o banco de dados
function conectarBanco() {
    // Configuração do Data Source Name (DSN) para conexão com o banco MySQL
    // "host" é o endereço do servidor do banco de dados (neste caso, localhost)
    // "dbname" é o nome do banco de dados (neste caso, empresa)
    // "charset" define o conjunto de caracteres usado na conexão (neste caso, utf8)
    $dsn = "mysql:host=localhost;dbname=empresa;charset=utf8";

    // Nome de usuário para acessar o banco de dados
    $usuario = "root";

    // Senha para acessar o banco de dados (neste caso, está vazia)
    $senha = "";

    try {
        // Criação de uma nova instância da classe PDO para conexão com o banco
        // O array passado como quarto parâmetro define opções adicionais para a conexão
        $conexao = new PDO($dsn, $usuario, $senha, [
            // Configura o PDO para lançar exceções em caso de erro
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Define o modo de busca padrão como associativo (chaves como nomes das colunas)
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        // Retorna a conexão estabelecida
        return $conexao;

    } catch (PDOException $e) {
        // Captura erros relacionados à conexão com o banco de dados

        // Registra o erro no log do servidor sem expor detalhes ao usuário
        error_log("Erro ao conectar ao banco: ". $e->getMessage());

        // Interrompe a execução do script e exibe uma mensagem genérica ao usuário
        die("Erro ao se conectar ao banco.");
    }
}