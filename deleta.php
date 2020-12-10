<?php 
    include('conexao.php');
?>

<?php
    $id = $_GET['id'];
ECHO $id;
    $sql = "UPDATE bate_papo
    SET id_projeto = 0, id_freela = 0, id_cliente = 0 
    WHERE id_projeto = $id";
    $retorno1 = mysqli_query($con, $sql);

    $sql = "UPDATE projetos
    SET id_freela = null
    WHERE id_projetos = $id";
    $retorno = mysqli_query($con, $sql);
    if ($retorno) {
        header('location: index.php');
    }else{
        echo 'Erro ao atualizar cadastro! Erro: ' .mysqli_error($con);
    }
?>