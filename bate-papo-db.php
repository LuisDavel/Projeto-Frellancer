<?php 
    include('conexao.php');
?>

<?php
    
    $id_freela = $_SESSION['id_usuario'];
    $id_projeto = $_POST['id'];

    $sql = "SELECT * FROM projetos where id_projetos = '$id_projeto'";
    //echo $sql;
    $retorno = mysqli_query($con, $sql);
    if(!$retorno) {
    	echo mysqli_error($con);
    } else {
        $item = mysqli_fetch_array($retorno, MYSQLI_ASSOC);
        $id_cliente = $item['id_projetos'];
            
    };
    
    $conversa = $_POST['msg'];
    $fim_projeto = null;
    $entrar_termo = null;
    $foto = 'null';
    $nome_fantasia = $_SESSION['nome_completo'];

// DAR UM JEITO NAS FOTOS;

    if ($arquivo) {
        $caminho = $arquivo['tmp_name'];
        $novo = date('YmdHis') . $arquivo['name'];
        if( move_uploaded_file($caminho, "img_chat/$novo")){
            if(empty($conversa))
             $foto = "'$novo'";
        }
        //echo $foto_projeto;
     }


    $sql = "INSERT INTO bate_papo VALUES (null, '$id_freela', '$id_cliente', '$conversa', ' $id_projeto', '$fim_projeto','$entrar_termo', '$nome_fantasia')";
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

