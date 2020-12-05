<?php 
    include('conexao.php');
?>

<?php
    
    $id_freela = $_SESSION['id_usuario'];
    $id_cliente = 2;
    $id_projeto = $_POST['id'];
    $conversa = $_POST['msg'];
    $fim_projeto = null;
    $entrar_termo = null;

    $sql = "INSERT INTO bate_papo VALUES (null, '$id_freela', '$id_cliente', '$conversa', ' $id_projeto', '$fim_projeto','$entrar_termo')";
    $retorno = mysqli_query($con, $sql);
?>


    <?php 
	    $sql = "SELECT * FROM projetos where id_projetos = '$id_projeto'";
	    //echo $sql;
	    $retorno = mysqli_query($con, $sql);
	    if(!$retorno) {
	    	echo mysqli_error($con);
	    } else {
            
           $item = mysqli_fetch_array($retorno, MYSQLI_ASSOC);
           $projeto = $item['id_projetos'];

        if ($retorno) {
            header('location: bate-papo.php?id='.$projeto );
        }else{
            echo 'Guiche não foi cadastrado! Erro: ' .mysqli_error($con);
        };
    };
    ?>

