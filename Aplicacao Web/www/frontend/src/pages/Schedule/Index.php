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
    <title>Upload Horário | Chatbot</title>
</head>
<body class="bg-light">

    <br>

    <div class="container" style="margin-left:auto; margin-right:auto; width:1200px;">

        <h4>Horário</h4>

        <hr>

        <div class="alert alert-secondary" role="alert">

            <h6 style="margin-bottom: 0px;">Docente: <span class="badge badge-primary"><?php echo $linha['fullName']; ?></span> | Matrícula: <span class="badge badge-primary"><?php echo $linha['ra']; ?></span></h6>
            
        </div>
            
        <div class="jumbotron">

            <div class="form-row input_fields_wrap">

                <form enctype="multipart/form-data" action="register.php" method="post">

                    <input value="<?php echo $linha['teacher_ID']; ?>" name="teacher" style="display:none">

                    <div class="form-row">

                        <div class="form-group col-md-9">
                            <label for="exampleFormControlFile1">Arquivo</label>
                            <input name="arquivo" type="file" class="form-control-file" id="exampleFormControlFile1" required>
                        </div>

                    </div>
                    
                    <input type="submit" value="Enviar arquivo" class="btn btn-outline-success">

                </form>

            </div>

        </div>

    </div>

</body>
</html>