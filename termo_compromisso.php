<?php
    include('conexao.php');
    if (@$_SESSION['id_usuario'] != "") {
?>        
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Termo de compromisso</title>
    </head>
    <body>
        <div class="text-center">
            <p>Da aceitação 

        O presente Termo estabelece obrigações contratadas de livre e espontânea vontade, por tempo indeterminado, entre a plataforma e as pessoas físicas ou jurídicas, usuárias do site. 

        Ao utilizar a plataforma o usuário aceita integralmente as presentes normas e compromete-se a observá-las, sob o risco de aplicação das penalidades cabíveis. 

        A aceitação do presente instrumento é imprescindível para o acesso e para a utilização de quaisquer serviços fornecidos pela empresa. Caso não concorde com as disposições deste instrumento, o usuário não deve utilizá-los.</p>
        
        <td><a href="batepapo.php" class="btn btn-primary">Aceitar</a></td>
        <td><a href="index.php" class="btn btn-primary">Recusar</a></td>
        </div>
    </body>
    </html>
<?php
    } else {
        header("Location:listar_projeto.php");
    }    
?>        