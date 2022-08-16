<?php
  session_start();
  include('../../../../backend/CheckLogin.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../../style/bootstrap.css">
  <link rel="shortcut icon" href="../../../assets/logo.png">
  <title>Sobre | Chatbot</title>

</head>

<body class="bg-light">

<div onload class="container">

  <br>

    Informação da versão: 1.0
    <h4>Chatbot</h4>
       
  <hr>

    <a title="Voltar a tela anterior" href="../../../../frontend/src/pages/Dashboard/"><button class="btn btn-outline-dark">Voltar</button></a>

  <hr>    

  <p>Tecnológicas utilizadas no desenvolvimento do sistema</p>

  <div class="jumbotron">
    
      <a href="https://getbootstrap.com/" target="_blank">
        <img src="../../../../frontend/assets/bootstrap.png" alt="" width="32" height="32" title="Bootstrap">
        Bootstrap
      </a>
      <br>
       
      <br>
        <a href="https://www.w3schools.com/html/html5_intro.asp" target="_blank">
          <img src="../../../../frontend/assets/html5.png" alt="" width="32" height="32" title="HTML5">
          HTML5
        </a>
      <br>
      <br>
        <a href="https://www.php.net/" target="_blank">
          <img src="../../../../frontend/assets/php.png" alt="" width="32" height="32" title="PHP7">
          PHP <?php echo phpversion();?>
        </a>
      <br>
      <br>
        <a href="https://www.w3schools.com/js/" target="_blank">
          <img src="../../../../frontend/assets/javascript.png" alt="" width="32" height="32" title="JavaScript">
          JavaScript
        </a>
      <br>
      <br>
        <a href="https://www.phpmyadmin.net/" target="_blank">
          <img src="../../../../frontend/assets/postgreesql.png" alt="" width="32" height="32" title="Postgreesql">
          PhpMyAdmin
        </a>
      <br>
    <br>
      <a href="https://www.apache.org/" target="_blank">
        <img src="../../../../frontend/assets/apache.png" alt="" width="32" height="32" title="Apache">
        Apache
      </a>
    <br>

  </div>

  <!-- <iframe width="1110" height="630" src="https://www.youtube.com/embed/gJRuu4FY3wk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

  <hr>

  <a href="http://www.fateccarapicuiba.edu.br/" target="_blank">
    <img width="137" height="68" src="../../../../frontend/assets/fatec.png" width="32" height="32" title="Fatec Carapicuíba">
    FACULDADE DE TECNOLOGIA DE CARAPICUÍBA
  </a>

  <br>

</div>

</body>
</html>