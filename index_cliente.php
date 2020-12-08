<?php
  include('conexao.php');
  
  if (@$_GET['acao'] == "sair") {
     session_destroy();
  }
  if (@$_SESSION['id_usuario'] == "") {
    header("Location: login.php");
  }
  echo( $_SESSION['nome_completo']);
  $id_usuario = $_SESSION['id_usuario'];
?>
   


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Otter Freela</title>

    <style type="text/css">
		.foto {
			max-width: 250px;
			max-height: 250px;
		}
	</style>


</head>
<body>
    <a href="login.php?acao=sair">Sair</a>
    
    <?php 
        $sql = "SELECT * FROM usuario where tipo_usuario = 'C' and id_usuario = $id_usuario";
        //echo $sql;
        $retorno = mysqli_query($con, $sql);
        if (mysqli_num_rows($retorno) == 1){
    

	        $sql = "SELECT * FROM projetos WHERE id_cliente = '$id_usuario' and id_freela =  0";
	        //echo $sql;
	        $retorno = mysqli_query($con, $sql);
	        if(!$retorno) {
	        	echo mysqli_error($con);
	        } else {
            

	?>
    <?php
            while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
    ?>
      
        <div class="row ">
          <div class="">
                <div class="card"  >
                    <img class="foto" src= "img_projeto/<?php echo $item ['foto']; ?>" alt="<?php echo $item ['foto'];?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item ['nome_projeto']; ?></h5>
                        <p class="card-text"><?php echo $item ['descricao_projeto']; ?></p>
                        <a href="mostra-projeto.php?id= <?php echo $item['id_projetos']; ?>" class="btn btn-primary">Editar Projeto</a>
                    </div>
                </div>
          </div>
        </div>

    <?php            
            }
        }

    ?>
    ------------------------------
    <?php 
        $sql = "SELECT * FROM bate_papo where id_cliente = $id_usuario";
        $retorno = mysqli_query($con, $sql);
        if (mysqli_num_rows($retorno) == 1){
    

	        $sql = "SELECT * FROM projetos WHERE id_cliente = '$id_usuario'";
	        //echo $sql;
	        $retorno = mysqli_query($con, $sql);
	        if(!$retorno) {
	        	echo mysqli_error($con);
	        } else {
            

	?>
    <?php
            while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
    ?>
      
        <div class="row ">
          <div class="">
                <div class="card"  >
                    <img class="foto" src= "img_projeto/<?php echo $item ['foto']; ?>" alt="<?php echo $item ['foto'];?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item ['nome_projeto']; ?></h5>
                        <?php 
                            $sql = "SELECT MAX(id_chat) as maxId FROM bate_papo WHERE id_cliente = '$id_usuario'";
	                        $retorno = mysqli_query($con, $sql);
                            if($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC) == 1){
                        ?>
                         <p class="card-text"><?php echo $item ['conversa']; ?></p>

                        <?php
                            }
                        ?>
                        <a href="bate-papo.php?id= <?php echo $item['id_projetos']; ?>" class="btn btn-primary">Responder</a>
                    </div>
                </div>
          </div>
        </div>

    <?php            
            }
        }    
?>
    <?php 
    }
// colocar algo
        
}
       
    
    ?>

    
    


</body>
</html>