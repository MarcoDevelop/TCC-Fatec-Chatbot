<?php

    // Incluindo conexão com o banco de dados.
    include('../../../../backend/src/connection.php');

    $code = $_GET['codigo'];

    $query = "SELECT * FROM `schedule` WHERE teacher_ID = '$code' ";
    $qry = mysqli_query($conexao, $query) or die("# O sistema não foi capaz de executar a query");
    $row = $qry -> fetch_array();

    $tipo = $row['type'];
    $Arquivo = $row['content'];
            
    //EXIBE ARQUIVO  - se o navegador não oferecer suporte para a extensão sera solicita dowload do arquivo
    header("Content-type: ".$tipo."");
    echo $Arquivo;

?>