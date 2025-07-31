<?php
// configuração do banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "empresa_teste";

// conexão usando MySQLI sem proteção contra SQL injection
$conexao = new mysqli(hostname: $servidor, username: $usuario, password: $senha, database: $banco);

// verifica se há erro de conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}


// captura os dados do formulário (nome do usuário)
$nome = $_POST["nome"];

// executa a consulta SEM proteção contra SQL injection
$sql = "SELECT * FROM cliente_teste WHERE nome = '$nome'";
$resultado = $conexao->query(query: $sql);

// se houver resultados, o login é considerado bem-sucedido

if ($resultado->num_rows > 0) {
    header("Location: area_restrita.php");
    // garante que o código para aqui para evitar execução indevida
    exit();    
} else {
    echo "Nome não encontrado."; 
}

// fecha conexão
$conexao->close();