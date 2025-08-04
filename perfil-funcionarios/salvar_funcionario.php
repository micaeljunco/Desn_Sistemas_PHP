<?php
// Função para redimencionar a imagem
function redimencionarImagem($imagem, $largura, $altura)
{
    // Obtem as dimensões originais da imagem
    // getimagesize() retorna a altura e largura de uma imagem
    list($largura_original, $altura_original) = getimagesize($imagem);

    // Cria uma nova imagem em branco com as novas dimensões
    // imagecreatetruecolor() cria uma imagem em branco em alta qualidade
    $nova_imagem = imagecreatetruecolor($largura, $altura);

    // Carrega a imagem original (JPEG) a partir do arquivo
    // imagecreatefromjpeg() cria uma imagem a partir de um jpeg 
    $imagem_original = imagecreatefromjpeg($imagem);

    // Copia e redimensiona a imagem original para a nova 
    // imagecopyresampled() copia com redimensionamento e suavização
    imagecopyresampled($nova_imagem, $imagem_original, 0, 0, 0, 0, $largura, $largura_original, $altura, $altura_original);

    // Inicia um buffer para guardar a imagem como texto binário
    // ob_start() inicia o output buffer, guardando a saída
    ob_start();

    // imagejpeg() envia a imagem para o output
    imagejpeg($nova_imagem);

    // ob_get_clean() pega o conteúdo do buffer e limpa
    $dados_imagem = ob_get_clean();

    // Libera a memória usada pelas imagens
    // imagedestroy() limpa a memória da imagem criada
    imagedestroy($nova_imagem);
    imagedestroy($imagem_original);

    return $dados_imagem;
}

// Configuração do banco de dados
$host = 'localhost';
$dbname = 'bd_imagens';
$username = 'root';
$password = '';

try {
    // Conexão com o BD por PDO
    $pdo = new PDO('mysql:host=localhost;dbname=bd_imagens;charset=utf8', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto-func'])) {
        if ($_FILES['foto-func']['error'] == 0) {

            $nome_func = $_POST['nome-func'];
            $tel_func = $_POST['tel-func'];
            $foto_func = $_FILES['foto-func']['name'];      // Obtem o nome original do arquivo de imagem
            $tipo_foto_func = $_FILES['foto-func']['type']; // Obtem o tipo original do arquivo de imagem

            // Redimensionando a imagem
            $foto_redimensionada = redimencionarImagem($_FILES['foto-func']['tmp_data'], 300, 400);

            // Insere no banco de dados
            $sql = "INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto)
                    VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome',$nome_func);
            $stmt->bindParam(':telefone',$tel_func);
            $stmt->bindParam(':nome_foto',$foto_func);
            $stmt->bindParam(':tipo_foto',$tipo_foto_func);
            $stmt->bindParam(':foto', $foto_redimensionada, PDO::PARAM_LOB);    // LOB é iagual ao Large Object, usado para dados binários.

            if ($stmt->execute()) {
                echo "[SUCESSO]: Funcionário cadastrado com êxito!";
            } else {
                echo "[ERRO]: Problema ao cadastrar o usuário.";
            }
        } else {
            echo "[ERRO]: Problema ao realizar o upload do arquivo. Mais detalhes: ".$_FILES['foto-func']['error'];
        }
    }

} catch (PDOException $e) {
    echo "[ERRO]: ".$e->getMessage();
}
