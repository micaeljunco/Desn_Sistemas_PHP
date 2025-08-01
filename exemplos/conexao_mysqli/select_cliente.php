<?php
// Inclui o arquivo de conexão
require_once "conexao.php";

// Estabelece conexão
$conexao = conectadb();

// Define o comando SQL
$sql = "SELECT id_cliente, nome, email FROM cliente";

// Executa a conexão
$result = $conexao->query($sql);

// Verifica se há resultados na consulta
if ($result->num_rows > 0) {
    // Itera sobre os resultados e exibe os dados
    while ($linha = $result->fetch_assoc()) {
        echo "ID: " . $linha["id_cliente"] . " |   Nome: " . $linha["nome"] . " |  Email: " . $linha["email"] . " <br>";
    }

} else {
    echo "Nenhum resultado encontrado.";
}

$conexao->close();