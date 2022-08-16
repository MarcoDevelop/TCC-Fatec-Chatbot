<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./style/bootstrap.css" rel="stylesheet">
    <link href="./frontend/src/pages/Logon/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="./frontend/assets/logo.png">
    <title>Login | Chatbot</title>

</head>

<body class="text-center"> 

    <form class="form-signin" action="./frontend/src/pages/Logon/" method="POST">   
            
        <div class="row justify-content-md-center">
        
            <img width="60" height="60" src="./frontend/assets/logo.png" class="img-fluid" alt="Bot">

        </div>

        <br>

        <h1 class="h3 mb-3 font-weight-normal">Login</h1>

        <?php
            if(isset($_SESSION['nao_autenticado'])):
        ?>
                                
        <div class="alert alert-danger" role="alert">
            ERRO: Usuário ou senha inválidos.
        </div>

        <?php
            endif;
            unset($_SESSION['nao_autenticado']);
        ?>
        
        <input id="inputEmail" placeholder="Nome" title="Preencha o nome do usuário" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; margin-bottom: -1px;" name="usuario" type="text" class="form-control" tabindex="1" autofocus required autocomplete="off">
            
        <input id="inputPassword" placeholder="Senha" title="Preencha a senha" name="senha" type="password" class="form-control" tabindex="2" required autocomplete="off">
            
        <br>
            
        <button title="Entrar no sistema" type="submit" class="btn btn-lg btn-dark btn-block" tabindex="3">Entrar</button>

        <p class="mt-5 mb-3 text-muted"><a style="text-decoration:none" target="_blank"><button">&copy; 2021</button></a></p>
                                    
    </form>

</body>

</html>