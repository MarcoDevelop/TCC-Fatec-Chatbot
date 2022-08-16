<?php

    include('../../../../backend/src/connection.php');

    $e_id = $_POST['e_id'];
    $enome = $_POST['e_nome'];
    $euser = $_POST['e_usuario'];
    $epsw = $_POST['e_senha'];
    $eacesso = $_POST['acesso'];

    $query = "UPDATE users SET user = '$euser', fullName = '$enome', password = md5('$epsw'), accessTime = '$eacesso' WHERE users_ID = '$e_id'";

    mysqli_query($conexao, $query) or die("# Erro ao tentar atualizar cadastro!");
    mysqli_close($conexao);

    echo  "<script>alert('Usuário $euser foi alterado com sucesso!');</script>";
    echo '<script>location.href = "index.php";</script>';

?>
