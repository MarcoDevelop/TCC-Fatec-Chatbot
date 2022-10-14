<?php

    // Dados de acesso ao banco de dados.   
    define('HOST', 'chatbot.mysql.dbaas.com.br');
    define('USUARIO', 'usuario');
    define('SENHA', 'senha');
    define('DB', 'chatbot');
    
    // Criando conexão com o banco de dados.
    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

?>
