<?php

    // Conexão com o banco de dados.
    include('../../../../backend/src/connection.php');
    
    // Variáveis recebidas via post do formulário.
    $ra = $_POST['ra'];
    $nome_docente = $_POST['nome_docente'];
    $data_nsc = $_POST['data_nsc'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $curso_docente = $_POST['curso_docente'];
    $formacao_docente = $_POST['formacao_docente'];
    $ano_conclusao = $_POST['ano_conclusao'];
    $instituicao = $_POST['instituicao'];
    
    // Query de Insert no banco de dados.
    $query =  "INSERT INTO teachers (ra, fullName, birth, email, phone, course, degree, conclusion, inst, status) VALUES ('$ra','$nome_docente', '$data_nsc', '$email', '$celular', '$curso_docente', '$formacao_docente', '$ano_conclusao', '$instituicao', '1');";
    mysqli_query($conexao, $query) or die("# Error query");

    //===================================================================================

    $consulta = "SELECT * FROM `teachers` ORDER BY `teacher_ID` DESC LIMIT 1";
    $script = $conexao->query($consulta);
    $row = $script -> fetch_array();
    
    if (empty($row['teacher_ID'])){
        $linha = 0;
    } else {
        $linha = $row['teacher_ID'];
    }

    echo $linha;

    // Insert ID do teachers na tabela leactures.
    $query =  "INSERT INTO schedule (name, content, type, teacher_ID) VALUES ('', '', '', '$linha');";
    mysqli_query($conexao, $query) or die("# Error query tb schedule");
    
    //===================================================================================
    
    // Alerta de cadastro.
    echo "<script>alert('Cadastro realizado com sucesso!');</script>";

    // Volta para tela de cadastro.
    echo "<script>location.href = './';</script>";

?>