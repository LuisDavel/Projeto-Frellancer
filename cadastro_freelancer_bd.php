<?php 
    include('conexao.php');
?>
<?php 
    $id_usuario = @$_SESSION['id_usuario'];
    $area_atuacao     = $_POST['servico-projeto'];
    $senha   = $_POST['senha'];
    $arquivo  = $_FILES['foto'];
    $arquivo2  = $_FILES['foto2'];
    $foto     = 'null';
    $descricao = $_POST['descricao'];
    $apelido = $_POST['apelido'];
    $data = date('Y-m-d');
    $foto_certificado = 'null';

    if ($arquivo) {
       $caminho = $arquivo['tmp_name'];
       $novo = date('YmdHis') . $arquivo['name'];
       if( move_uploaded_file($caminho, "img_upload_freelancer/$novo")){
            $foto = "'$novo'";
       }
    }

    if ($arquivo2) {
        $caminho2 = $arquivo2['tmp_nam2e'];
        $novo2 = date('YmdHis') . $arquivo2['name2'];
        if( move_uploaded_file($caminho2, "img_certificado/$novo2")){
             $foto_certificado = "'$novo2'";
        }
     }

    $sql = "UPDATE usuario
    SET titulo_profissional = '$novo2', nickname = '$apelido', experiencia = '$descricao', area_atuacao ='$area_atuacao', senha = '$senha', foto = '$novo', primeiro_login = 1
    WHERE id_usuario = $id_usuario";
    
    $retorno = mysqli_query($con, $sql);
    if ($retorno) {
        header('location: index.php');
    }else{
        echo 'Erro ao atualizar cadastro! Erro: ' .mysqli_error($con);
    }

?>