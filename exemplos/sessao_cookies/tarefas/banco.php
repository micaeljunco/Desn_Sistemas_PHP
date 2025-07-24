<?php 
$bdServidor = '127.0.0.1'; //localhost:8080
$bdUsuario = 'root'; // usuario do banco
$bdSenha = '';  // senha, geralmente vazia
$BdBanco = 'micael_junco'; // nome do banco a se conectar 

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $BdBanco); //conexao
if (mysqli_connect_errno()) {
    echo "Problemas para conectar no banco verifique os dados!";
    die();
} 

function buscar_tarefas($conexao){
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);
    $tarefas = array();
    while ($tarefa = mysqli_fetch_assoc($resultado)){//função do php que, verifica se tem algo dentro da variável e joga para dentro de $tarefa
        $tarefas[] = $tarefa;
    }
return $tarefas;
}
?>