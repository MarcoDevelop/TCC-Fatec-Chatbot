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
    <link rel="stylesheet" href="../../../../style/dashboard.css">
    <link rel="shortcut icon" href="../../../assets/logo.png">
    <title>Painel | Chatbot</title>

</head>

<body class="bg-light">

    <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="../DocenteRegistration/">Cadastro</a>
        <a class="py-2 d-none d-md-inline-block" href="../../../../frontend/src/pages/UserRegistration/">Administração de Usuários</a>
        <a class="py-2 d-none d-md-inline-block" target="_blank" href="https://t.me/Fetec_help_bot">Bot Telegram</a>
      </div>
    </nav>

    <div onload class="container">

        <br>

        <div class="py-5 text-center bg-light">
            <img class="d-block mx-auto mb-4" src="../../../assets/logo.png" alt="" width="72" height="72">
            <h2>Chatbot</h2>
            <p class="lead">Ferramenta conversacional de apoio docente.</p>
        </div>

        <hr>

        <div class="row justify-content-start" role="alert">

            <p style="text-transform:uppercase"># Olá, bem-vindo <span class="badge badge-primary"><?php echo $_SESSION['usuario'];?></span> <a style="text-decoration:none" title="Sair do sistema" href="../Logon/logout.php" class="alert-link">Sair</a></p>
                   
        </div>

        <hr>

        <br>
               
        <div class="jumbotron">
            <h1 class="display-4">Suporte aos professores das faculdades.</h1>

            <br>

            <p class="lead">Regulamentos</p>
            <hr class="my-4">
            <p>Regulamento da faculdade: <a target="_blank" href="http://www.fateccarapicuiba.edu.br/wp-content/uploads/2019/01/REGULAMENTO-GRADUACAO-FATECS-2009.pdf">link</a></p>
            <p>Regimento da faculdade: <a target="_blank" href="http://www.fateccarapicuiba.edu.br/wp-content/uploads/2019/01/REGIMENTO-GERAL_NOVO_2016.pdf">link</a></p>
            <p>Regime disciplinar discente da Faculdade: <a target="_blank" href="http://www.fateccarapicuiba.edu.br/wp-content/uploads/2019/02/DELIBERA%C3%87%C3%83O-CEETEPS-39_2017-REGIME-DISCIPLINAR-DISCENTE.pdf">link</a></p>
            <p>Tutorial de teletrabalho: <a target="_blank" href="https://www.cps.sp.gov.br/cartilhas-teletrabalho/">link</a></p>
            
            <br>

            <p class="lead">Acessos</p>
            <hr class="my-4">
            <p>Acesso ao SIGA: <a target="_blank" href="http://siga.cps.sp.gov.br/fatec/login.aspx">link</a></p>
            <p>Acesso ao TEAMS: <a target="_blank" href="https://teams.microsoft.com/go#">link</a></p>
            <p>Acesso a loja do CPS & Microsoft: <a target="_blank" href="http://www.fatec.sp.gov.br/view/Default.aspx#">link</a></p>
            <p>Acesso e-mail institucional: <a target="_blank" href="https://login.microsoftonline.com/">link</a></p>

            <br>

            <p class="lead">Informações</p>
            <hr class="my-4">
            <p>Calendário acadêmico <a target="_blank" href="http://www.fateccarapicuiba.edu.br/calendario-academico/">Link</a></p>
            <p>Horário de funcionamento da Secretaria Acadêmica <a target="_blank" href="https://www.google.com/search?q=Horario+de+funcionamento+da+fatec+de+carapicuiba&sxsrf=AOaemvK7TXehl1DhRlAH7-ZTwBKJ_IPVuw%3A1635280122770&ei=-mR4YdOyLojL1sQP_r-dqA0&ved=0ahUKEwjTl82W9ejzAhWIpZUCHf5fB9UQ4dUDCA4&uact=5&oq=Horario+de+funcionamento+da+fatec+de+carapicuiba&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECc6BwgjELADECc6BwgAEEcQsANKBAhBGABQjl1YtWBgqG5oAXACeACAAYIBiAGAApIBAzAuMpgBAKABAcgBCcABAQ&sclient=gws-wiz">Link</a></p>
            
            <br>
            
            <p class="lead">Contatos</p>
            <hr class="my-4">
            <p>Contato da diretoria: <a target="_blank" href="http://www.fateccarapicuiba.edu.br/setores-administrativos/">link</a></p>
            <p>Site da Faculdade: <a target="_blank" href="http://www.fateccarapicuiba.edu.br/">link</a></p>
            <p>Abertura de ordem de serviço de TI: <a target="_blank" href="https://forms.office.com/Pages/ResponsePage.aspx?id=veJyzyt6g0e96znVewf3b8v6JYBO2vlDkqadiJ2Kjl9UMjNTSk4wMkxJWEsyTUQ4UlMyVFowWEtDOC4u">link</a></p>
            <p>Telefones úteis da faculdade: <a href="tel:+(11) 4184-8404">(11) 4184-8404</a> / <a href="tel:+(11) 4183-6827">(11) 4183-6827</a></p>

            <p class="lead">
                <a class="btn btn-primary btn-lg" href="../../../../frontend/src/pages/About/" role="button">Sobre</a>
            </p>

        </div>
        
       <script>

            document.addEventListener("DOMContentLoaded", function(){ // verifica se o DOM foi carregado
            var links = document.body.querySelectorAll("a"); // seleciona todas as tags <a>
            var nums_links = links.length; // conta a quantidade
            var conta = 0; // contador

            function checaLinks(){
                var url_ = links[conta].href; // seta o href do link como a URL ser consultada
                var http = new XMLHttpRequest(); // cria o objeto XHR
                http.open("GET", url_, true); // consulta o link
                http.onreadystatechange = function(){ // retorno do Ajax
                    if(http.readyState == 4){ // retorno completado
                        if(http.status != 200){ // se for diferente de 200, é porque a URL não existe (cód. HTTP 404)
                        links[conta].style.color = "red"; // muda a cor do link
                        }

                        if(conta < nums_links-1){ // verifica se o contador ainda está dentro do range do número de links
                        setTimeout(checaLinks, 1000); // chama novamente a função após 1 segundo
                        }
                        conta++; // incrementa o contador
                    }
                }
                http.send(null);
            }

            checaLinks();  // chama a função
            });

            // const request = new XMLHttpRequest()

            // request.addEventListener('readystatecharge', () => {
            //     if (request.readyState === 4 && request.status === 404){
            //         alert('não encontrada');
            //         // console.log(request.responseText)
            //     }else{
            //         alert('');
            //     }
            // })

            // request.open('GET', 'http://localhost/www/frontend/src/pages/UserRegistratio')
            // request.send()



           
            // function urlExists(url, callback) {
            // fetch(url, { method: 'head' })
            // .then(function(status) {
            //     callback(status.ok)
            // });
            // }

            // let url = 'http://localhost/www/frontend/src/pages/UserRegistration/';

            // urlExists(url, function(exists) {
            //     if (exists) {
            //         alert('existe, faça alguma coisa');
            //     } else {
            //         alert('não existe, faça outra coisa');
            //     }
            // });

       </script>
    
    <p class="float-right">
        <a href="#">↑ De volta ao topo</a>
    </p>

    <div class="row justify-content-md-center">© 2021</div>

    <br>

</body>

</html>


