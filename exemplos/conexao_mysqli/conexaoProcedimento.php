<?php
// Definição das credenciais do acesso do banco de dados

$nomeServidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBD = "empresa";

// Criação da conexão com MySQLi
$conn = mysqli_connect(hostname: $nomeServidor, username: $usuario, password: $senha, database: $nomeBD);

if (!$conn) {   // Interrompe o script se a conexão falhar.
    die("[ERRO]: A conexão com o banco de dados falhou." . mysqli_connect_error());
}

// Configuração do conjunto de caracteres para evitar problemas de acentuação

mysqli_set_charset($conn, "utf8mb4");

echo "[SUCESSO] Conexão bem sucedida! <br>";

// Consulta SQL para obter clientes

$sql = "SELECT id_cliente, nome, email FROM cliente";
$resultado = mysqli_query($conn, $sql);

// Verifica se há resultados na consulta
if (mysqli_num_rows($resultado) > 0) {
    // Itera sobre os resultados e exibe os dados
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "ID: " . $linha["id_cliente"] . " |   Nome: " . $linha["nome"] . " |  Email: " . $linha["email"] . " <br>";
    }

} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
