<?php

    // Incluindo conexão com o banco de dados.
    include('../../../../backend/src/connection.php');

    // Variáveis recebidas via post do formulário.
    $docente = $_POST['teacher'];
    $arquivo = $_FILES["arquivo"]["tmp_name"];
    $tipo = $_FILES["arquivo"]["type"];
    $nome = $_FILES["arquivo"]["name"];

    // ------------------------------------ upload ---------------------------

    if($arquivo != NULL) {
        $nomeFinal = time().'.jpg';
        if (move_uploaded_file($arquivo, $nomeFinal)) {
            $tamanhoImg = filesize($nomeFinal);

            $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

            $query = "UPDATE `schedule` SET name = '$nome', content = '$mysqlImg', type = '$tipo' WHERE teacher_ID = '$docente'";
            mysqli_query($conexao, $query) or die("# O sistema não foi capaz de executar a query");

            unlink($nomeFinal);

        }
    }
    else {
        echo"Você não realizou o upload de forma satisfatória.";
    }

    // Alerta de cadastro.
    echo "<script>alert('Upload realizado com sucesso!');</script>";

    echo "<script>window.close();</script>"

?>