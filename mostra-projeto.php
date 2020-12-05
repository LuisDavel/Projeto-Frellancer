<?php
  include('conexao.php');
  
  if (@$_GET['acao'] == "sair") {
     session_destroy();
  }
  if (@$_SESSION['id'] != "") {
    header("Location:index.php");
  }
  
?>
<?php 
	$sql = "SELECT nome_projeto FROM projetos";
	//echo $sql;
	$retorno = mysqli_query($con, $sql);
	if(!$retorno) {
		echo mysqli_error($con);
	} else {
        while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {  

?>

<html lang="en">
<head>

    <style type="text/css">
			.foto {
				max-width: 100px;
				max-height: 100px;
			}
	</style>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto: <?php echo $item ['nome_projeto']; ?>  </title>
    <?php
        }
    }
?>
</head>
<body>
    <table class="tabela_listar_cliente">
        <thead>
		    <tr>
		    	<th>Nome Do projeto </th>
		    	<th>Descrição: </th>
		    	<th>Anexo realcionado a projeto </th>
		    	<th>Tipo de serviço escolhido: </th>
                <th>Prazo: </th>
                <th></th>
		    </tr>
        </thead>
    
		<tbody>
		    <?php
                $sql = "SELECT id_projetos, nome_projeto, descricao_projeto, foto, tipo_servico, prazo FROM projetos";
                //echo $sql;
                $retorno = mysqli_query($con, $sql);
                if(!$retorno) {
                    echo mysqli_error($con);
                } else {
				    while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
		    ?>
					    <tr>
					    	<td><?php echo $item['nome_projeto']; ?></td>
					    	<td><?php echo $item['descricao_projeto']; ?></td>
					    	<td>
				<?php 
					if ($item['foto']) {
				?>
					    		    <img class="foto" src="img_projeto/<?php echo $item['foto']; ?>">	
			    <?php
			    	} else {
			    ?>	 
					    		    <img class="foto" src="img_projeto/sem-foto.png">
				<?php
					}
				?>
					    	</td>
                            <td><?php echo $item['tipo_servico']; ?></td>
                            <td><?php echo $item['prazo']; ?></td>
                            <td><a href="bate-papo.php?id= <?php echo $item['id_projetos']; ?>" class="btn btn-primary">Saiba Mais</a></td>
                        </tr>
                        
	        <?php
	        		}
            ?>
            
			</tbody>
    </table>
    
    <?php            
        } 
    ?>
</body>
</html>