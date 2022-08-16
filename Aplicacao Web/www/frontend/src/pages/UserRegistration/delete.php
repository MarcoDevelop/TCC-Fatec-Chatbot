<?php

    include('../../../../backend/src/connection.php');

    $dcodigo = $_GET["codigo"];
   
    $deletar = "DELETE FROM usuario WHERE usuario_id = '$dcodigo'";
    mysqli_query($conexao, $deletar) or die("# Erro ao deletar item!");
    mysqli_close($conexao);
    
    echo  "<script>alert('Usuário apagado com sucesso!');</script>";
    echo '<script>location.href = "./";</script>';

?>

