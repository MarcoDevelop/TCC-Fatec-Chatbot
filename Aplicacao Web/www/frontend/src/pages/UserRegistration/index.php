<?php

    session_start();

    include('../../../../backend/CheckLogin.php');
     
    include('../../../../backend/src/connection.php');

    $consulta = "SELECT * FROM `users` ORDER BY `users_ID` ASC";

    $con = mysqli_query($conexao, $consulta) or die("Connection failed: " . mysqli_connect_error());
    
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../../frontend/assets/logo.png">
    <link rel="stylesheet" href="../../../../style/bootstrap.css">
    <link rel="stylesheet" href="../../../../style/psw.css">
    <title>Cadastro Usuários | Chatbot</title>
    
</head>

<body class="bg-light">

    <br>

    <div class="container">

        <h4>Cadastro de usuário</h4>         

        <hr>

            <a title="Voltar a tela anterior" href="../../../../frontend/src/pages/Dashboard/"><button class="btn btn-outline-dark">Voltar</button></a>

        <hr>

        <!-- id="validationDefault01" -->

        <div class="jumbotron">  

            <form name="frm_cadastro" action="register.php" method="post">

                <div class="form-row">

                    <div class="col">
                        <label for="validationDefault01">Nome:</label>
                        <input tabindex="1" name="nome" type="text" class="form-control" id="validationDefault01" placeholder="Nome" autocomplete="off" required>
                    </div>
                    <div class="col">
                        <label for="validationDefault01">Usuário:</label>
                        <input tabindex="2" name="user" type="text" class="form-control" id="validationDefault01" placeholder="Usuário" autocomplete="off" required>
                    </div>
                    <div class="col">
                        <label for="validationDefault01 psw">Senha:</label>
                        <input tabindex="3" placeholder="Senha" class="campo" type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres." required>
                    </div>
                    <div class="col">
                        
                        <label>Nível de acesso</label>
                        <select tabindex="4" name="acesso" class="form-control" title="" autocomplete="off" required>

                            <option value=""></option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuário</option>

                        </select>

                    </div>
                    
                </div>

                <br>
                
                <button tabindex="5" name="cadastrar" type="submit" tabindex="9" class="btn btn-outline-success">Cadastrar</button>
                
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

        <div class="col-md-0 mb-3">
            <h4>Lista de usuários cadastrados</h4>
        </div>

        <br>

        <div class="row marketing">

            <div class="col-lg-12">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th># Código</th>
                            <th>Nome</th>
                            <th>Usuário</th>
                            <th>Tipo de acesso</th>
                            <th>Status</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>

                    <?php
                        while($dado = $con -> fetch_array()){
                    ?>

                    <tbody>

                        <tr>
                            <td><?php echo $dado ['users_ID']; ?></td>
                            <td><?php echo $dado ['fullName']; ?></td>
                            <td><?php echo $dado ['user']; ?></td>
                            <td>
                                <?php
                                    $dado ['accessTime'];   
                                    if($dado ['accessTime'] == 1){
                                        echo 'Administrador';
                                    }else{
                                        echo 'Usuário';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $dado ['status'];   
                                    if($dado ['status'] == 1){
                                        echo '<span class="badge badge-success">Ativo</span>';
                                    }else{
                                        echo '<span class="badge badge-danger">Inativo</span>';
                                    }
                                ?>
                            </td>
                            <td>

                                <a id="editar" title="Editar registro" href="edit.php?codigo=<?php echo $dado['users_ID'];?>"><button tabindex="5" class="btn btn-outline-warning">Editar</button></a>
                                <a id="Remover" title="Remover registro" href="delete.php?codigo=<?php echo $dado["users_ID"];?>"><button tabindex="6" class="btn btn-outline-danger">Remover</button></a>
                                
                                <?php
                                    $dado ['user'];   
                                    if($dado ['user'] == "admin"){
                                        echo '<span class="badge badge-warning">Usuário não alterável</span>';
                                        echo '<script>document.getElementById("editar").style.display = "none"; document.getElementById("Remover").style.display = "none";</script>';
                                    }else{

                                    }
                                ?>
                                
                            </td>
                        </tr>

                    </tbody>
                    
                    <?php
                        }
                    ?>

                </table>

                <br>

            </div>  

        </div>   
        
        <div class="row justify-content-md-center">
            <a href="#">↑ De volta ao topo</a>
        </div>

        <br>

    </div>

</body>

<script src="../../../../js/psw.js"></script>

</html>