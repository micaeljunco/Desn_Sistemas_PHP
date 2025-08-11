<?php

// Define uma função chamada 'gerarSenhaTemporaria'.
// Esta função tem um parâmetro opcional chamado '$tamanho', que por padrão é 8.
// Isso significa que se você chamar a função sem especificar o tamanho, ela gerará uma senha de 8 caracteres.
function gerarSenhaTemporaria($tamanho = 8) {
    // 1. "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
    // 2. str_shuffle("...")
    //    A função str_shuffle() pega a string fornecida e embaralha seus caracteres aleatoriamente.
    // 3. substr(str_shuffle(...), 0, $tamanho)
    //    A função substr() é usada para pegar uma parte (uma "substring") de uma string.
    // Em resumo: a função embaralha uma lista de letras e números e depois pega os primeiros '$tamanho'
    // caracteres dessa mistura para formar a senha.
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), offset: 0, length: $tamanho);
}

// Esta função recebe dois parâmetros obrigatórios:
// - $destinatario: O endereço de e-mail para quem o e-mail (simulado) seria enviado.
// - $senha: A senha (provavelmente a temporária gerada pela função acima) que será incluída no corpo do e-mail.
function simularEnvioEmail($destinatario, $senha) {
    // Cria a mensagem que seria o corpo do e-mail.
    // A variável $senha é inserida diretamente na string.
    // "\n" representa uma quebra de linha.
    $mensagem = "Olá! Sua nova senha temporária é: $senha\n";

    // Cria uma string de registro que simula o cabeçalho e o corpo do e-mail.
    // Isso é útil para testes, para ver qual e-mail seria enviado sem realmente enviá-lo.
    $registro = "Para: $destinatario\n$mensagem\n----------------------\n";

    // file_put_contents("emails_simulados.txt", $registro, FILE_APPEND);
    // Esta função escreve dados em um arquivo.
    // - "emails_simulados.txt": É o nome do arquivo onde as informações do e-mail simulado serão salvas.
    //   Se o arquivo não existir, ele será criado.
    // - $registro: São os dados que serão escritos no arquivo (as informações do e-mail que montamos acima).
    // - FILE_APPEND: Esta é uma constante importante! Ela diz para a função adicionar ($registro)
    //   ao final do arquivo, em vez de apagar o conteúdo anterior e escrever por cima.
    //   Assim, cada "e-mail simulado" é adicionado como um novo registro no arquivo.

    // Esta função NÃO ENVIA um e-mail de verdade. Ela apenas simula o processo
    // salvando as informações do e-mail em um arquivo de texto local.
    // Isso é muito útil durante o desenvolvimento e teste para não disparar e-mails reais
    // a cada teste e para poder verificar facilmente o conteúdo que seria enviado.
    file_put_contents("emails_simulados.txt", $registro, FILE_APPEND);
}

// Exemplo de como usar as funções (não faz parte da definição das funções, mas para ilustrar):
/*
$emailUsuario = "exemplo@email.com";
$novaSenha = gerarSenhaTemporaria(10); // Gera uma senha de 10 caracteres
simularEnvioEmail($emailUsuario, $novaSenha);

echo "Senha temporária '$novaSenha' gerada para $emailUsuario e registrada em emails_simulados.txt";
*/

?>