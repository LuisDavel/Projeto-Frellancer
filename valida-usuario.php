<?php
	
	include('conexao.php');

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$queryLogin = "SELECT * FROM usuario where email = '$email' and senha = '$senha'";
	$retornoLogin = mysqli_query($con, $queryLogin);

	if (mysqli_num_rows($retornoLogin) == 1){
		while ($row = mysqli_fetch_array($retornoLogin)){
	       $_SESSION['id_usuario'] = $row['id_usuario'];
		   $_SESSION['nome_completo'] = $row['nome_completo'];
	    }
		header("Location:index.php");
	} else {		
		header("Location:login.php?retorno=erro");
	}
?>