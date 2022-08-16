<?php

    session_start();
    include('../../../../backend/CheckLogin.php');
    include('../../../../backend/src/connection.php');
    $consulta = "SELECT * FROM `teachers` ORDER BY `teacher_id` ASC";
    $con = mysqli_query($conexao, $consulta) or die("#Erro ao acessar registros!");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../style/bootstrap.css">
    <link rel="shortcut icon" href="../../../assets/logo.png">
    <script src="../../../../js/jquery.js"></script>
    <script src="../../../../js/mask.js"></script>
    <script>

        function popup(url,w,h) {
            var newW = w + 400;
            var newH = h + 200;
            var left = (screen.width-newW)/2;
            var top = (screen.height-newH)/2;
            var newwindow = window.open(url, 'name', 'width='+newW+',height='+newH+',left='+left+',top='+top);
            newwindow.resizeTo(newW, newH);
            
            //posiciona o popup no centro da tela
            newwindow.moveTo(left, top);
            newwindow.focus();
            return false;
        }

    </script>
    <title>Cadastro do docente | Chatbot</title>
</head>
<body class="bg-light">

    <br>

    <div class="container">

        <h4>Cadastro do docente</h4>

        <hr>

        <a title="Voltar a tela anterior." href="../Dashboard/"><button class="btn btn-outline-dark">Voltar</button></a>

        <hr>

        <div class="jumbotron">
            
            <form action="register.php" method="POST">

                <div class="form-row">

                    <div class="form-group col-md-2">
                        <label>Matrícula:</label>
                        <input type="text" name="ra" class="form-control" title="Preencher com a matrícula." tabindex="1" autofocus="1" placeholder="00000" maxlength="5" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-5">
                        <label>Nome do docente:</label>
                        <input type="text" name="nome_docente" class="form-control" title="Preencher com o nome." tabindex="2" maxlength="60" placeholder="Preencher nome" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Data de nascimento:</label>
                        <input  type="date" name="data_nsc" class="form-control" title="Preencher data de nascimento." tabindex="3" maxlength="14" placeholder="01/01/2000" autocomplete="off" required>
                    </div>

                </div>

                <br>

                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label>E-mail Institucional:</label>
                        <input type="email" name="email" class="form-control" title="Preencher com o e-mail." tabindex="4" placeholder="exemplo@cps.sp.gov.br" maxlength="60" style='text-transform:lowercase' autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Número de celular:</label>
                        <input type="tel" name="celular" class="form-control" title="Preencher DD e o número." tabindex="5" maxlength="11" placeholder="11999990000" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Curso:</label>
                        <input type="text" name="curso_docente" class="form-control" title="Preencher curso." tabindex="6" placeholder="Preencher curso" maxlength="60" autocomplete="off" required>
                    </div>

                </div>

                <br>

                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label>Formação acadêmica:</label>
                        <input type="text" name="formacao_docente" class="form-control" title="Preencher formação acadêmica." placeholder="Preencher formação acadêmica" tabindex="7" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Ano de conclusão:</label>
                        <input  type="date" name="ano_conclusao" class="form-control" title="Preencher ano de conclusão." tabindex="8" maxlength="14" autocomplete="off" required>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label>Instituição:</label>
                        <input type="text" name="instituicao" class="form-control" title="Preencher instituição" placeholder="Preencher instituição" tabindex="9" autocomplete="off" required>
                    </div>

                </div>

                <br>

                <button tabindex="10" type="submit" class="btn btn-outline-success">Cadastrar</button>

            </form>
            

        </div>

        <div class="col-md-0 mb-3">
            <h4>Lista de Docentes cadastrados</h4>
        </div>

        <br>

        <div class="row marketing">

            <div class="col-lg-12">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th># Matrícula</th>
                            <th>Nome do docente</th>
                            <th>Status</th>
                            <th>Mod / Upload horário / horário PDF</th>
                            
                        </tr>
                    </thead>

                    <?php
                        while($dado = $con -> fetch_array()){
                    ?>

                    <tbody>

                        <tr>

                            <td><?php echo $dado ['ra']; ?></td>
                            <td><?php echo $dado ['fullName']; ?></td>
                            
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
                                
                                <a title="Editar docente." href="edit.php?codigo=<?php echo $dado['teacher_ID'];?>"><button class="btn btn-outline-warning">Editar</button></a>
                                <a title="Upload do horário." onclick="return popup('../Schedule/?codigo=<?php echo $dado['teacher_ID'];?>', 400, 300);"><button class="btn btn-outline-info">Upload</button></a>
                                <a title="PDF do horário." target="_blank" href="../Schedule/pdf.php?codigo=<?php echo $dado['teacher_ID'];?>"><button class="btn btn-outline-danger">PDF</button></a>
                           
                            </td>

                        </tr>

                    </tbody>
                    
                    <?php
                        }
                    ?>

                </table>
            
            </div>
            
        </div>

        <br>

        <div class="row justify-content-md-center">
            <a href="#">↑ De volta ao topo</a>
        </div>

        <br>

    </div>

</body>
</html>