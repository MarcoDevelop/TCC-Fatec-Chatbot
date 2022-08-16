<?php

    // Incluindo conexão com o banco de dados
    include('../../../../backend/src/connection.php');

    // variaveis passada via post
    $estado = $_POST['status'];
    $codigo = $_POST['id'];
    
    if($estado == 0){

        // Scripts SQL
        $update = "UPDATE `teachers` SET status = '$estado'  WHERE teacher_ID = '$codigo'";
        $query = mysqli_query($conexao, $update) or die("Connection failed: " . mysqli_connect_error());
        
        // Alertas
        echo  "<script>alert('Status atualizado com sucesso!');</script>";
        echo '<script>location.href = "./";</script>';

    }else{
        
        // variaveis passada via post

        $ra = $_POST['ra'];
        $nome_docente = $_POST['nome_docente'];
        $data_nsc = $_POST['data_nsc'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $curso_docente = $_POST['curso_docente'];
        $formacao_docente = $_POST['formacao_docente'];
        $ano_conclusao = $_POST['ano_conclusao'];
        $instituicao = $_POST['instituicao'];

        // Scripts SQL
        $update = "UPDATE `teachers` SET ra ='$ra', fullName = '$nome_docente', birth = '$data_nsc', email = '$email', phone = '$celular', course = '$curso_docente', degree = '$formacao_docente', conclusion = '$ano_conclusao', inst = '$instituicao', status = '$estado'  WHERE teacher_ID = '$codigo'";
        $query = mysqli_query($conexao, $update) or die("Connection failed");
        
        // Alertas
        echo  "<script>alert('Dados do $nome_docente atualizados com sucesso!');</script>";
        echo '<script>location.href = "./";</script>';

    }

?>