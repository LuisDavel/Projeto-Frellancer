<?php 
    include('conexao.php');

    $id = $_GET['id'];
    $id_usuario = $_SESSION['id_usuario'];

    $sql = "UPDATE projetos
    SET id_freela = '$id_usuario'
    WHERE id_projetos = $id";
    
    $retorno = mysqli_query($con, $sql);
    if ($retorno) {
        header('location: bate-papo.php?id='.$id );
    }else{
        echo 'Erro ao atualizar cadastro! Erro: ' .mysqli_error($con);
    }
    

?>