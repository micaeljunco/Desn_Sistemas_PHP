function validarFuncionario() {
    let nome = document.getElementById("nome_funcionario").value;
    let telefone = document.getElementById("telefone").value;
    let email = document.getElementById("email").value;

    if (nome.length < 3) {
        alert("O nome do funcionário deve ter pelo menos 3 caracteres.");
        return false;
    }

    let regexTelefone = /^[0-9]{10,11}$/;
    if (!regexTelefone.test(telefone)) {
        alert("Digite um telefone válido (10 ou 11 dígitos).");
        return false;
    }

    let regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regexEmail.test(email)) {
        alert("Digite um e-mail válido.");
        return false;
    }

    return true;
}

function validarCamposUsuario() {
    let camposInvalidos = 0;
    let campoNome = document.getElementById('nome');
    let campoEmail = document.getElementById('email');
    let campoSenha = document.getElementById('senha');
    let campoNovaSenha = document.getElementById('nova_senha');

    if (campoNome.value.length <= 0 || campoNome.value.length > 100) {
        camposInvalidos += 1;
        alert ("Campo \"Nome\" inválido.")
    }

    if (campoEmail.value.length <= 5 || campoEmail.value.length > 100) {
        camposInvalidos += 1;
        alert ("Campo \"Email\" inválido.")
    }

    if (campoSenha) {
        if (campoSenha.value.length < 8 || campoSenha.value.length > 255) {
            camposInvalidos += 1;
            alert ("Campo \"Senha\" inválido.")
        }        
    }

    // Para funcionar para o arquivo de alteração também
    if (campoNovaSenha && campoNovaSenha.value.length > 0) {
        if (campoNovaSenha.value.length < 8 || campoNovaSenha.value.length > 255) {
            camposInvalidos += 1;
            alert ("Campo \"Nova Senha\" inválido.")
        }
    }

    return camposInvalidos === 0;
}