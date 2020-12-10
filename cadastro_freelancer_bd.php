<?php 
    include('conexao.php');
?>
<?php 
    $id_usuario           = @$_SESSION['id_usuario'];
    $nome                 = $_POST['nome'];
    $experiencia          = $_POST['experiencia'];
    $area_atuacao         = $_POST['area_atuacao'];
    $nome_fantasia        = $_POST['nome_fantasia'];
    $arquivoPerfil        = $_FILES['fotoPerfil'];
    $fotoPerfil           = 'null';
    $arquivoProfissional  = $_FILES['fotoProfissional'];
    $fotoProfissional     = 'null';
    $data                 = date('Y-m-d');


    if ($arquivoPerfil) {
       $caminho = $arquivoPerfil['tmp_name'];
       $novo = date('YmdHis') . $arquivoPerfil['name'];
       if( move_uploaded_file($caminho, "img_upload_freelancer/$novo")){
            $fotoPerfil = "'$novo'";
       }
    }

    if ($arquivoProfissional) {
        $caminho2 = $arquivoProfissional['tmp_name'];
        $novo2 = date('YmdHis') . $arquivoProfissional['name'];
        if( move_uploaded_file($caminho2, "img_certificado/$novo2")){
             $fotoProfissional = "'$novo2'";
        }
     }

    $sql = "UPDATE usuario
    SET nome_completo = '$nome' , foto = '$novo', titulo_profissional = '$novo2', experiencia = '$experiencia' , nickname = '$nome_fantasia', area_atuacao = '$area_atuacao', primeiro_login = 1  
    WHERE id_usuario = $id_usuario";
    
    $retorno = mysqli_query($con, $sql);
    if ($retorno) {
        header('location: index.php');
    }else{
        echo 'Erro ao atualizar cadastro! Erro: ' .mysqli_error($con);
    }

?>