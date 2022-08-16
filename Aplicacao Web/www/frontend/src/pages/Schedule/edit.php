<?php

    // Verifica se o usuário está logado.
    session_start();
    include('../../../../backend/CheckLogin.php');
    
    // Incluindo conexão com o banco de dados.
    include('../../../../backend/src/connection.php');
    
    // Recebe código.
    $docente = $_GET['codigo'];

    // Script de consulta.
    $consult = "SELECT * FROM `teachers` WHERE teacher_ID = $docente";
    $con = mysqli_query($conexao, $consult) or die ("#Erro ao acessar tb!");
    $linha = $con -> fetch_array();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../style/bootstrap.css">
    <link rel="shortcut icon" href="../../../assets/logo.png">
    <script src="../../../../js/mask.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Cadastro Horário | Chatbot</title>

</head>
<body class="bg-light">

    <br>

    <div class="container" style="margin-left:auto; margin-right:auto; width:1200px;">

        <h4>Horário</h4>

        <hr>

        <a title="Voltar a tela anterior." href="../DocenteRegistration/"><button class="btn btn-outline-dark">Voltar</button></a>
        <a title="Voltar para tela principal." href="../Dashboard/"><button class="btn btn-outline-dark">Menu</button></a>

        <hr>

        <div class="alert alert-secondary" role="alert">

            <h6 style="margin-bottom: 0px;">Docente: <span class="badge badge-primary"><?php echo $linha['fullName']; ?></span> | RA: <span class="badge badge-primary"><?php echo $linha['ra']; ?></span></h6>
            
        </div>

        <?php

            // Incluindo conexão com o banco de dados.
            include('../../../../backend/src/connection.php');

            $query = "SELECT * FROM `schedule` WHERE teacher_ID = '1' ";
            $qry = mysqli_query($conexao, $query) or die("# O sistema não foi capaz de executar a query");
            $row = $qry -> fetch_array();

            $tipo = $row['type'];
            $Arquivo = $row['content'];
            
            //EXIBE ARQUIVO  - se o navegador não oferecer suporte para a extensão sera solicita dowload do arquivo
            header("Content-type: ".$tipo."");
            echo $Arquivo;

        ?>

    </div>

</body>
</html>