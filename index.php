<?php 
    include('conexao.php');
?>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Otter Freela</title>
</head>
<body>

    <?php 
	    $sql = "SELECT * FROM projetos";
	    //echo $sql;
	    $retorno = mysqli_query($con, $sql);
	    if(!$retorno) {
	    	echo mysqli_error($con);
	    } else {
            

	?>

    <?php
        while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
            /* if($item [''] == null){  IDENTIFICAÇÃO*/ 
    ?>
       
    <div class="row">
      <div class="col-sm-6">
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item ['nome_projeto']; ?></h5>
                    <p class="card-text"><?php echo $item ['descricao_projeto']; ?></p>
                    <a href="#" class="btn btn-primary">Saiba Mais</a>
                </div>
            </div>
      </div>
      
    </div>

    <?php            
        }
    }
    ?>

    


</body>
</html>