<?php
	include('conexao.php');
	$email = @$_SESSION['email'];
	$nome = @$_SESSION['nome_completo'];
    if (@$_SESSION['id_usuario'] != "") { 


	
		$sql = "SELECT * FROM tipo_servico";
		//echo $sql;
		$retorno = mysqli_query($con, $sql);
		if(!$retorno) {
			echo mysqli_error($con);
		} else {

 ?>
        <!DOCTYPE html>
		<html lang="pt-br">
			<head>
				<title>Cadastro Cliente</title>
				<link rel="stylesheet" type="text/css" href="css/styleCadastroCliente.css" />
			</head>
			<body>
			<header>
			</header>
				<a href="index.php">Início</a>
				<section id="Corpo">	
					<div class = "MoveLado">
						<form action="cadastro_freelancer_bd.php" method="post" enctype="multipart/form-data" class="">
							<label for="nome">Nome Completo:</label><br>
							<input class='input_modifica' type="text" placeholder="<?php echo $nome ?>"  name="nome" id="nome" maxlength="100" readonly><br><br>
			
							<label for="email">Email:</label><br>
							<input class='input_modifica' placeholder="<?php echo $email ?>" type="text" name="email" id="email" maxlength="100" readonly><br><br>
			
							<label for="telefone">Nome Fantasia:</label><br>
							<input class='input_modifica' type="text" name="apelido" maxlength="100"><br><br>

							<label for="telefone">Telefone:</label><br>
							<input class='input_modifica' type="text" name="telefone" id="telefone" maxlength="11"><br><br>

							<div>
               					<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Area de atuação:</label><br>
               					<select name="servico-projeto" id="servico" required >
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
							
							<label for="foto">Foto do titulo profissional: </label><br>
							<input type="file" name="foto2"><br><br>
							
							<label for="senha">Confirme sua senha:</label><br>
							<input class='input_modifica' type="password" name="senha" id="senha" minlength="8" maxlength="12"><br><br>
			
							<label for="foto">Foto</label><br>
							<input type="file" name="foto"><br><br>

							<label for="teleone">Descrição:</label><br>
							<textarea name="descricao" rows="5" cols="33" placeholder="Fale um pouco sobre você" maxlength="254"></textarea>
							<br>
							<input class='input_botao' type="submit" value="Salvar">

						</form>
					</div>
				</section>
			</body>
		</html>
    <?php    
    } else { 
    	header("Location:index.php");   
    }
    ?>

