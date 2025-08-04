<?php
// Exibe todo e qualquer erro em relação a imagem
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Limpa qualquer saída inesperada antes do header
ob_clean();

// Inclui a conexão com o banco de dados
require 'conexao.php';

// Obtem o ID da imagem da URL, garantindo que seja um número inteiro
$id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Cria a consulta para buscar a imagem no banco de dados
$querySelecPorCod = "SELECT imagem, tipo_imagem FROM imagens WHERE codigo = ?";

// Usa prepare stmt para segurança
$stmt = $conexao->prepare($querySelecPorCod);
$stmt->bind_param('i', $id_imagem);
$stmt->execute();
$resultado = $stmt->get_result();

// Verifica se a imagem existe no banco de dados
if ($resultado->num_rows > 0) {
    // Object pois é uma imagem
    $imagem = $resultado->fetch_object();

    // Define o tipo correto da imagem (fallback para jpeg caso esteja vazio)
    $tipo_imagem = !empty($imagem->tipo_imagem) ? $imagem->tipo_imagem : 'image/jpeg';

    header('Content-type: '.$tipo_imagem);

    // Exibe a imagem armazenada no banco
    echo $imagem->imagem;
} else {
    echo "Imagem não encontrada";
}

// Fecha a consulta
$stmt->close();