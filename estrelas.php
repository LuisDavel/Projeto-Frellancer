<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avalie esta p[agina</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/funcoes.js"></script>
    <style>
        .corpo{
            background-color: grey ;
        }
        .txt{
            color: white;
            padding-left: 910px;
        }

    </style>
</head>

<body class ="corpo">   
    <h1 class = "txt">Porfavor agora avalie o atendimento</h1>
    <div class="d-flex justify-content-center" >
        <div>
       
            <a href="javascript:void(0)" onclick="Avaliar(1)">
                <img src="img/star0.png" id="s1"></a>

            <a href="javascript:void(0)" onclick="Avaliar(2)">
                <img src="img/star0.png" id="s2"></a>

            <a href="javascript:void(0)" onclick="Avaliar(3)">
                <img src="img/star0.png" id="s3"></a>

            <a href="javascript:void(0)" onclick="Avaliar(4)">
                <img src="img/star0.png" id="s4"></a>
<?php
$id = $_GET['id'];
?>
            <a href="javascript:void(0)" onclick="Avaliar(5)">
                <img src="img/star0.png" id="s5"></a>
            <p id="rating">0</p>
            <a class="btn btn-info my-2 my-sm-0" href="deleta.php?id=<?php echo $id; ?>" type="submit" >retornar</a>
        </div>
    </div>
</body>
</html>