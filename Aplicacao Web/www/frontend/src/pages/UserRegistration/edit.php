<?php

    session_start();

    include('../../../../backend/CheckLogin.php');
    
    include('../../../../backend/src/connection.php');
    
    // Recebe o valor via post do formulário.
    $ecodigo = $_GET["codigo"];
    
    //Script SQL
    $consulta = "SELECT * FROM `users` WHERE users_ID = '$ecodigo'";
    $con = mysqli_query($conexao, $consulta) or die("Erro ao tentar trazer registro");
    $linha = $con -> fetch_array();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../../frontend/assets/logo.png">
    <link rel="stylesheet" href="../../../../style/bootstrap.css">
    <link rel="stylesheet" href="../../../../style/psw.css">
    <title>Editar cadastro <?php echo $linha['user']; ?> | Chatbot</title>

</head>

<body class="bg-light">

    <div class="container">

        <br>

        <h4>Editar cadastro</h4>

        <hr>

        <a href="./"><button class="btn btn-outline-dark">Voltar</button></a>

        <hr>

        <div class="jumbotron">

            <form name="frm_cadastro" action="update.php" method="post">            

                <p class="text-primary">Codigo: <?php echo $ecodigo; ?></p>

                <input value="<?php echo $ecodigo; ?>" name="e_id" type="hidden">

                <div class="form-row">

                    <div class="col">

                        <label for="validationDefault01">Nome:</label>
                        <input tabindex="1" value="<?php echo $linha['fullName']; ?>" name="e_nome" type="text" class="form-control" id="validationDefault01" placeholder="Nome" autocomplete="off" required>
                    </div>
                    <div class="col">
                        <label>Usuário</label>
                        <input value="<?php echo $linha['user']; ?>" name="e_usuario" type="text" class="form-control" placeholder="Usuário" autocomplete="off" required>   
                    </div>
                    <div class="col">
                        <label>Senha</label>
                        <input id="psw" value="" name="e_senha" type="password" class="campo" placeholder="Nova senha*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres." required>
                    </div>
                    <div class="col">
                        
                        <label>Nível de acesso</label>
                        <select name="acesso" class="form-control" autocomplete="off" required>

                        <option value=""></option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuário</option>

                        </select>

                    </div>

                </div>

                <br>

                <button title="Salvar" name="confirmar" type="submit" tabindex="9" class="btn btn-outline-success">Salvar</button>

            </form>

            <br>

            <div id="message">
                <h4>A senha deve conter o seguinte:</h4>
                <p id="letter" class="invalid">Letras <b>minúsculas</b></p>
                <p id="capital" class="invalid">Letras <b>maiúsculas</b></p>
                <p id="number" class="invalid">Com <b>numeros</b></p>
                <p id="length" class="invalid">Minímo<b> 8 caracteres</b></p>
            </div>

        </div>

    </div>

</body>

<script src="../../../../js/psw.js"></script>

</html>