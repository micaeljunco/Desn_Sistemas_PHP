<?php
    $bdServidor = '127.0.0.1';
    $bdUsuario = 'root';
    $bdSenha = '';
    $bdBanco = 'micael_junco';
    
        // Conexão com o banco de dados
        // mysqli_connect(host, user, password, database)

    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
        if (mysqli_connect_errno()) {
            echo "Problemas para conectar no banco. Verifique os dados informados.";
            die();
        }



        function buscar_tarefas($conexao){
            $sqlBusca = 'SELECT * FROM tarefas';
            $resultado = mysqli_query($conexao, $sqlBusca);
            $tarefas = array();
            while ($tarefa = mysqli_fetch_assoc($resultado)){
                $tarefas[] = $tarefa;
            }
            return $tarefas;
        }


        function gravar_tarefa($conexao, $tarefa){
            $sqlGravar = "INSERT INTO tarefas(nome, descricao, prioridade, prazo, concluida)
            values
            (
                '{$tarefa['nome']}',
                '{$tarefa['descricao']}',
                '{$tarefa['prioridade']}',
                '{$tarefa['prazo']}',
                '{$tarefa['concluida']}'
            )  
            ";
            mysqli_query($conexao, $sqlGravar);
        }
?>