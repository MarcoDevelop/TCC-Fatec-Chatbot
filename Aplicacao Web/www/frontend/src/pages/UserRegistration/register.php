<?php

    include('../../../../backend/src/connection.php');

    $nome = $_POST['nome'];
    $user = $_POST['user'];
    $psw = $_POST['psw'];
    $acess = $_POST['acesso'];

    $query = "insert into users (fullName, user,  password, accessTime, status) values ('$nome', '$user', md5('$psw'), $acess, "1");";

    mysqli_query($conexao, $query) or die("Connection failed: " . mysqli_connect_error());
    mysqli_close($conexao);
    echo  "<script>alert('Usuário $user cadastrado com sucesso!');</script>";
    echo '<script>location.href = "./";</script>';

?>
