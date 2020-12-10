<?php
 //processa_projeto.php?id= <?php echo $item['id_projetos']; 
    include('conexao.php');
    if (@$_SESSION['id_usuario'] != "") {
        $id = $_GET['id'];
?>        
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
        footer{
            padding-top: 30px ;

        }
</style>
        <title>Termo de compromisso</title>
    </head>


    <body>

        <header>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <div class="container navbar" id="corNavbar01">
                  <ul class="navbar-nav mr-auto">
                      
                      <li class="nav-item active">
                          <p class="nav-link">Aceitar o termo é de extrema importancia para ambos os usuários terem um trabalho legal :D</p>
                      </li>
                  </ul>
              </div>
          </nav>      
        </header>

        <div class="modal-body ">
            <div class="d-flex justify-content-center">
                <div>

                    <p>Da aceitação </p>
                    <p>O presente Termo estabelece obrigações contratadas de livre e espontânea vontade, por tempo indeterminado, entre a plataforma e as pessoas físicas ou jurídicas, usuárias do site. </p>
                    <p>Ao utilizar a plataforma o usuário aceita integralmente as presentes normas e compromete-se a observá-las, sob o risco de aplicação das penalidades cabíveis. </p>
                    <p> A aceitação do presente instrumento é imprescindível para o acesso e para a utilização de quaisquer serviços fornecidos pela empresa. Caso não concorde com as disposições deste instrumento, o usuário não deve utilizá-los.</p>
                    <a href="processa_projeto.php?id=<?php echo $id ?> " class="btn btn-primary">Aceitar</a>
                    <a href="index.php" class="btn btn-primary">Recusar</a>
                </div>
            </div>
        </div>

        <footer class="footer bg-dark fixed-bottom" style="height: 80px;">
            <div class="container ">
              <span class=" text-white d-flex justify-content-center"> Copyright © 2020 | Criado por João Paulo, Luis Davel e Osmar Junior</span>
            </div>
        </footer>   
    </body>
    </html>
<?php
    } else {
        header("Location:listar_projeto.php");
    }    
?>        