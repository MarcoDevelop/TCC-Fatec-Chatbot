<?php

    //Incluindo conexão com o banco de dados
    include('../../../../backend/src/connection.php');

    // Recebe o valor via post do formulário.
    $codigo = $_GET["codigo"];

    // Script SQL consulta docente
    $consulta = "SELECT * FROM `teachers` WHERE teacher_ID = '$codigo'";
    $query = mysqli_query($conexao, $consulta) or die("Connection failed: " . mysqli_connect_error());
    $linha = $query -> fetch_array();

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
    <title>Editar Registro <?php echo utf8_encode($linha['fullName']); ?> | Chatbot</title>
    
    <script>
    
        function estado(){

            if(document.getElementById("customControlAutosizing").checked){

                document.getElementById("ra").disabled = false;                
                document.getElementById("nome_docente").disabled = false;
                document.getElementById("data_nsc").disabled = false;
                document.getElementById("email").disabled = false;
                document.getElementById("celular").disabled = false;
                document.getElementById("curso_docente").disabled = false;
                document.getElementById("formacao_docente").disabled = false;
                document.getElementById("ano_conclusao").disabled = false;
                document.getElementById("instituicao").disabled = false;
                document.getElementById("status").value = 1;

            }else{
                
                document.getElementById("ra").disabled = true;
                document.getElementById("nome_docente").disabled = true;
                document.getElementById("data_nsc").disabled = true;
                document.getElementById("email").disabled = true;
                document.getElementById("celular").disabled = true;
                document.getElementById("curso_docente").disabled = true;
                document.getElementById("formacao_docente").disabled = true;
                document.getElementById("ano_conclusao").disabled = true;
                document.getElementById("instituicao").disabled = true;
                document.getElementById("status").value = 0;
            
            }

        }
    
    </script>
   
</head>

<body onload="estado()">

    <div class="container">

        <br>

        <h4>Editar cadastro do docente</h4>

        <hr>

            <a title="Voltar a tela anterior" href="./"><button class="btn btn-outline-dark">Voltar</button></a>
            <a title="Voltar para tela principal." href="../Dashboard/"><button class="btn btn-outline-dark">Menu</button></a>            

        <hr>

        <div class="alert alert-info" role="alert">

            <h6 style="margin-bottom: 0px;">Código: <?php echo $codigo; ?></h6>

        </div>


        <div class="jumbotron">

            <form name="frm_cadastro" action="update.php" method="post">

                <input id="status" name="status" value="" tabindex="1" type="text" style="display:none">

                <?php

                    if($linha['status'] == 1){

                        echo '<div class="custom-control custom-checkbox mr-sm-2"><input onClick="estado()" type="checkbox" class="custom-control-input" id="customControlAutosizing" checked><label class="custom-control-label" for="customControlAutosizing">Status</label></div>';

                    }else{

                        echo '<div class="custom-control custom-checkbox mr-sm-2"><input onClick="estado()" type="checkbox" class="custom-control-input" id="customControlAutosizing"><label class="custom-control-label" for="customControlAutosizing">Status</label></div>';

                    }

                ?>

                <br>

                <input value="<?php echo $codigo; ?>"name="id" type="hidden">

                <div class="form-row">

                    <div class="form-group col-md-2">
                        <label>Matrícula:</label>
                        <input id="ra" value="<?php echo $linha['ra']; ?>" type="text" name="ra" class="form-control" title="Preencher com a matrícula" tabindex="1" placeholder="00000" maxlength="5" autocomplete="off" required>
                    </div>
                
                    <div class="form-group col-md-5">
                        <label>Nome do docente:</label>
                        <input id="nome_docente" value="<?php echo $linha['fullName']; ?>" type="text" name="nome_docente" class="form-control" title="Preencher com o nome" tabindex="2" placeholder="Nome" maxlength="60" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Data de nascimento:</label>
                        <input id="data_nsc" type="date" name="data_nsc" value="<?php echo $linha['birth']; ?>" class="form-control" title="Preencher " tabindex="3" maxlength="14" placeholder="01/01/2022" autocomplete="off" required>
                    </div>
                    
                </div>

                <br>
                
                <div class="form-row" >

                    <div class="form-group col-md-3">
                        <label>E-mail Institucional:</label>
                        <input id="email" value="<?php echo $linha['email']; ?>" type="email" name="email" class="form-control" title="Preencher com o e-mail" placeholder="exemplo@dominio.com" tabindex="4" maxlength="60" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Número de celular:</label>
                        <input id="celular" value="<?php echo $linha['phone']; ?>" type="tel" name="celular" class="form-control" title="Preencher DD e o número." tabindex="5" maxlength=11" placeholder="11999990000" autocomplete="off" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Curso:</label>
                        <input id="curso_docente" value="<?php echo $linha['course']; ?>" type="text" name="curso_docente" class="form-control" title="Preencher formação acadêmica." tabindex="6" maxlength="60" autocomplete="off" required>
                    </div>

                </div>

                <br>

                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label>Formação acadêmica:</label>
                        <input id="formacao_docente" type="text" value="<?php echo $linha['degree']; ?>" name="formacao_docente" class="form-control" title="Preencher formação acadêmica." tabindex="7" maxlength="60" autocomplete="off" required>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label>Ano de conclusão:</label>
                        <input id="ano_conclusao" type="date" value="<?php echo $linha['conclusion']; ?>" name="ano_conclusao" class="form-control" title="Preencher ano de conclusão." tabindex="8" maxlength="14" placeholder="01/11/2025" utocomplete="off" required>
                    </div>
                   

                    <div class="form-group col-md-4">
                        <label>Instituição:</label>
                        <input id="instituicao" type="text" value="<?php echo $linha['inst']; ?>" name="instituicao" class="form-control" title="Preencher " tabindex="9" autocomplete="off" required>
                    </div>

                </div>
                    
                <br>

                <button id="botao" type="submit" title="Salvar" tabindex="10" class="btn btn-outline-success">Salvar</button>               
                
            </form>
        
        </div>

    </div>

</body>
</html>