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
	    	max-height: 200px;
	    }
        .algo{
          padding-left: 25px;
        }

        .cor{
          background-color: grey;
          padding-top: 50px;
        }
        footer{
          padding-top: 30px ;

        }
        .sim{
          padding-top: 50px;
        }

	</style>


</head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
          <div class="container navbar" id="corNavbar01">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active"></li>
                  <li class="nav-item active">
                      <a class="nav-link" href="index.php">Inicio</a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="cadastro-projetos.php">Publicar Projeto</a>
                  </li>
              </ul>
              <a class="btn btn-info my-2 my-sm-0" href="login.php?acao=sair" type="submit" value="cadastro_freelancer.php">Trocar de conta</a>
          </div>
      </nav>      
    </header>
<br><br><br>

    <?php 
        $sql = "SELECT * FROM usuario where tipo_usuario = 'c' and id_usuario = $id_usuario";
        $retorno = mysqli_query($con, $sql);
        if (mysqli_num_rows($retorno) == 1){
    

	        $sql = "SELECT * FROM projetos WHERE id_freela = 0 ";
	        $retorno = mysqli_query($con, $sql);
	        if(!$retorno) {
	        	echo mysqli_error($con);
	        } else {

  ?>
<h2 class="d-flex justify-content-center" > | Projetos catalogados | </h2>
<div class="sim d-flex justify-content-center">
  <div class="row ">
    <?php
          
              while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
    ?>
            
        
          <div class="algo">
                <div class="card"  >
                    <img class="card-img foto" src= "img_projeto/<?php echo $item ['foto']; ?>" alt="<?php echo $item ['foto'];?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item ['nome_projeto']; ?></h5>
                        <p class="card-text"><?php echo $item ['descricao_projeto']; ?></p>
                        <a href="mostra-projeto.php?id= <?php echo $item['id_projetos']; ?>" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
          </div>
       

    <?php  
             // }          
            }
          }
     ?>
  </div>

</div>


  <?php  
    }else{

        header('location: index_cliente.php');
    }
  ?>
  
<br><br>
<h2 class="d-flex justify-content-center" > | Projetos em andamento | </h2>
<br> <br>
    
  <?php 

    $sql = "SELECT * FROM bate_papo where id_cliente = $id_usuario";
    $retorno = mysqli_query($con, $sql);
    if(!$retorno) {
        echo mysqli_error($con);
    } else {

        $sql = "SELECT * FROM projetos WHERE id_cliente = '$id_usuario'";
        //echo $sql;
        $retorno = mysqli_query($con, $sql);
        if(!$retorno) {
            echo mysqli_error($con);
        } else {
    
  ?>
<div class="cor d-flex justify-content-center">
<br>
  <div class="row ">
    <?php
          
              while($item2 = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
    ?>
            
          <div class="algo">
                <div class="card"  >
                    <img class="card-img foto" src= "img_projeto/<?php echo $item2 ['foto']; ?>" alt="<?php echo $item ['foto'];?>">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $item2 ['nome_projeto']; ?></h2>
                        <a href="bate-papo.php?id= <?php echo $item2['id_projetos']; ?>" class="btn btn-primary">Abrir conversa</a>
                    </div>
                </div>
                <br>
                <br>
          </div>
       

    <?php  
            }
        }
     }
     
        ?>
  </div>
</div>  

    <footer class="footer bg-dark" style="height: 80px;">
            <div class="container ">
              <span class=" text-white d-flex justify-content-center"> Copyright © 2020 | Criado por João Paulo, Luis Davel e Osmar Junior</span>
            </div>
        </footer>
</body>
</html>