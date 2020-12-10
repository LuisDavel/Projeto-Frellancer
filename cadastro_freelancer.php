<?php
	include('conexao.php');
	$email = @$_SESSION['email'];
	$nome = @$_SESSION['nome_completo'];
	$experiencia = @$_SESSION['experiencia'];
	$nome_fantasia = @$_SESSION['nome_fantasia'];
    if (@$_SESSION['id_usuario'] != "") { 
		$id_usuario = @$_SESSION['id_usuario'];

	

 ?>
        <!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<title>Cadastro Cliente</title>
				<style>
      				.form{
      				  width: 1000px;
					
      				}
			  

  				</style>
			  <!-- Abertura BootStrap -->
    		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    			<!-- Fechamento BootStrap -->        

				<link rel="stylesheet" type="text/css" href="css/styleCadastroCliente.css" />
			</head>
			<?php	
				$queryTipoUsuario = "SELECT * FROM usuario where tipo_usuario = 'F' and id_usuario =  $id_usuario" ;
				$retornoTipoUsuario = mysqli_query($con, $queryTipoUsuario);

				if (mysqli_num_rows($retornoTipoUsuario) == 1) {
					if (@$_SESSION['id_usuario'] != "") { 	
			?>			
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
           			        </li>
           			    </ul>
           			    <a class="btn btn-info my-2 my-sm-0 text-white" href="index.php" type="submit" value="">Listar Projetos</a>
           			</div>
        		</nav>      
			</header>
<br><br><br>
				<section >	
					<div class ="d-flex justify-content-center">
            	
						<form class = "form"  action="cadastro_freelancer_bd.php" method="post" enctype="multipart/form-data" class="">
							
							<label for="nome">Nome Completo:</label><br>
							<input class="form-control"  type="text" value="<?php echo $nome ?>"  name="nome" id="nome" maxlength="100" required><br><br>
						
							<label for="email">Email:</label><br>
							<input class="form-control" placeholder="<?php echo $email ?>" type="text" name="email" id="email" maxlength="100" readonly><br><br>
						
							<label for="fotoPerfil">Foto de perfil</label><br>
							<input type="file" class="form-control" name="fotoPerfil"><br><br>

							<label for="fotoProfissional">Certificados: </label><br>
							<input type="file"  class="form-control" name="fotoProfissional"><br><br>

							<label for="experiencia">Descreva suas experiências:</label><br>
							<textarea name="experiencia" class="form-control"  rows="5" cols="33" placeholder="<?php echo $experiencia ?>" maxlength="254" required> </textarea>
							<br>
<?php
							$sql = "SELECT * FROM tipo_servico";
							//echo $sql;
							$retorno = mysqli_query($con, $sql);
							if(!$retorno) {
								echo mysqli_error($con);
							} else {
?>
							<div>
               					<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Area de atuação:</label><br>
               					<select name="area_atuacao" class="form-control" id="area_atuacao" required >
               					    <option selected> Escolha </option>
               					    <?php 
			   							while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
			   						?>
			   							<option value="<?php echo $item['nome_servico']; ?>"><?php echo $item['nome_servico']; ?></option>
			   						<?php 
			   							}
			   						?>
               					</select> <br><br> 
							</div>             			
<?php 
	}
?>			
							<label for="nome_fantasia">Nome Fantasia:</label><br>
							<input class="form-control" type="text" placeholder="<?php echo $nome_fantasia ?>" name="nome_fantasia" maxlength="100" required><br><br>

							<button type="submit" class="btn btn-info my-2 my-sm-0 text-white">Salvar</button>

						</form>
					</div>
				</div>
				
				</section>
			</body>
		</html>
    <?php    
       
		} else { 
			header("Location:index.php");   
		}


		}else{
			header('location:index.php?retorno=UsuarioNaoAutorizado');
		}    
	}
?>
