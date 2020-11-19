<?php 
    include('conexao.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Projeto</title>

    
    
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
    <section>
        <form class="" action="cadastro-projetos-db.php" enctype="multipart/form-data" method="post">
            <br>
            <div>
                <label for="nome-projeto">Nome do projeto</label><br>
                <input class='' type="text" name="nome-projeto" id="nome-projeto" maxlength="100" required>
            </div><br>

            <div>
                <label for="descricao-projeto">Descrição do Projeto</label><br>
                <textarea id="story" name="descricao-projeto" rows="5" cols="33" required></textarea>
            </div><br>

            <div class="form-group">
                <label for="exampleFormControlFile1">Foto demonstrativa(Opcional)</label><br>
                <input type="file" class="form-control-file" id="foto" name="foto" required>
            </div>

            <div>
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tipo do serviço</label><br>
                <select name="servico-projeto" id="servico" required >
                    <option selected> Escolha </option>
                    <?php 
			    		while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
			    	?>
			    		<option value="<?php echo $item['nome_servico']; ?>"><?php echo $item['nome_servico']; ?></option>
			    	<?php 
			    		}
			    	?>
                </select>    
            </div> <br>

    <?php 
		}
	?>
    <!-- Fechamento do SQl de preenchimento do tipo de serviço -->

            <label for="prazo">Prazo</label><br>
            <input type=date step="1" name="prazo-projeto" required>
            <input type="time" id="appt" name="prazo-tempo" min="09:00" max="18:00" required><br><br>
            <label for="orcamento">Orçamento</label><br>
            <input class="" type="number" name="orcamento-projeto" id="nome-projeto" maxlength="100" required><br><br>

            <label for="valor-projeto">Valor do projeto</label><br>
            <input type="text" id="valor" name="valor-projeto" required> <br><br>

            <label for="nivel-tecnico">Nivel de Experiência</label><br>
            <input class="" type="text" name="nivel-experiencia" id="nivel-experiencia" required>
            <br>

            <button type="submit" class="btn btn-primary my-1">Enviar</button>

        </form>
    
    </section>
</body>


</html>


