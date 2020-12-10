<?php
  include('conexao.php');
  
  if (@$_GET['acao'] == "sair") {
     session_destroy();
  }
  if (@$_SESSION['id_usuario'] == "") {
    header("Location:index.php");
  }

 // echo($_SESSION['nome_completo'])
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Projeto</title>
  <style>
      .form{
        width: 1000px;
          
      }


  </style>
    
    
    <!-- Abertuda do SQL para pesquisa de tipos de serviços desejados para efetuar a abertura do projeto -->
    <?php 
		$sql = "SELECT * FROM tipo_servico";
		//echo $sql;
		$retorno = mysqli_query($con, $sql);
		if(!$retorno) {
			echo mysqli_error($con);
		} else {
	?>
    <!-- Fechamento do SQl de preenchimento do tipo -->
    
    
    <!-- Abertura BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Fechamento BootStrap -->        


</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container navbar" id="corNavbar01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"></li>
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php?acao=sair">Trocar de usuário</a>
                    </li>
                    
                </ul>
                <a class="btn btn-info my-2 my-sm-0 text-white" href="index_cliente.php" type="submit" value="">Listar Projetos</a>
            </div>
        </nav>      
    </header>
<br>
<br>
<br>

    <div class ="d-flex justify-content-center">
        <form class = "form "  action="cadastro-projetos-db.php" enctype="multipart/form-data" method="post">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nome do projeto</label>
              <input type="text" class="form-control" name="nome-projeto" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Tipo de serviço a ser prestado:</label>
              <select class="form-control" name="servico-projeto" id="exampleFormControlSelect1" required>
              <?php 
			    		while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
			    	?>
			    		<option value="<?php echo $item['nome_servico']; ?>"><?php echo $item['nome_servico']; ?></option>
			    	<?php 
			    		}
			    	?>
                </select>    
            <?php 
	        	}
	        ?>
              </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Foto demonstrativa</label><br>
                <input type="file" class="form-control-file" id="foto" name="foto" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Descrição do Projeto</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao-projeto" rows="3" required></textarea>
            </div>

            <label for="prazo">Prazo</label><br>
            <input type=date step="1" name="prazo-projeto" required>
            <input type="time" id="appt" name="prazo-tempo" min="09:00" max="18:00" required><br><br>

            <div class="form-group">
              <label for="exampleFormControlSelect1">ja possui orçamento</label>
              <select class="form-control" name="orcamento-projeto" id="exampleFormControlSelect1" required>
                <option>Sim</option>
                <option>Não</option>
              </select>
            </div>
            <div class="form-group">
                <label for="valor-projeto">Valor minimo do projeto</label><br>
                <input class="form-control" type="text" id="valor" name="valor-projeto" required>
            </div>
            <div class="form-group">
                <label for="nivel-tecnico">Nivel de Experiência</label><br>
                <select class="form-control" name="nivel-experiencia" id="exampleFormControlSelect1" required >
                    <option>Sim</option>
                    <option>Não</option>
              </select>
            </div>
            <div class ="d-flex justify-content-center"> 
              <button type="submit" class="btn btn-info my-2 my-sm-0 text-white">Publicar o projeto</button>
            </div>
        </form>
    </div>

</body>


</html>


