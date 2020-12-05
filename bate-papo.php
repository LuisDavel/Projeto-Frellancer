<?php
  include('conexao.php');
  
  if (@$_GET['acao'] == "sair") {
     session_destroy();
  }
  if (@$_SESSION['id'] != "") {
    header("Location:index.php");
  }
  
  $usuario = $_SESSION['id_usuario'];
  
?>


<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bate Papo</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
    ?>
    <label for="">aaa</label>   
        
   
    <div>
    <?php 
	    $sql = "SELECT id_freela, conversa FROM bate_papo Where id_projeto = $id && id_freela = $usuario";
	    //echo $sql;
	    $retorno = mysqli_query($con, $sql);
	    if(!$retorno) {
	    	echo mysqli_error($con);
	    } else {
            

	?>
    <?php
            while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
    ?>
        <p><?php echo $item ['id_freela']; ?>: <?php echo $item ['conversa']; ?></p>
    <?php 
            }
        }
    ?>
    
    </div>

    <div>
        <label for="chat"></label>
        <p>---------------------------------</p>
        <form class="" action="bate-papo-db.php" enctype="multipart/form-data" method="post">
           
            <input type="hidden" name="id" value= "<?php echo ($id)?>" >
            
            <input class="" type="text" name="msg" id="msg" maxlength="300" required>
            
            <label for="chat">Afirmar contrato</label>
            <input type="checkbox" id="afimar" name="afimar" value="1">

            <button type="submit" class="btn btn-primary my-1">Enviar</button>
        </form>
        

    </div>
</body>
</html>