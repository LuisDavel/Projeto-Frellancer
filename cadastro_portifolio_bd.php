<?php 
    include('conexao.php');
?>
<?php 
    $id_usuario = @$_SESSION['id_usuario'];
    $nome     = $_POST['nome'];
    $descricao   = $_POST['descricao'];
    $dataInicio  = $_POST['dataInicio'];
    $dataTermino     = $_POST['dataTermino'];
    $arquivo  = $_FILES['foto'];
    $foto     = 'null';


    if ($arquivo) {
    $caminho = $arquivo['tmp_name'];
    $novo = date('YmdHis') . $arquivo['name'];
    if( move_uploaded_file($caminho, "img_upload_portifolio/$novo")){
            $foto = "'$novo'";
    }
    }

    $sql = "INSERT INTO portifolio VALUES (null, '$nome', '$descricao', '$dataInicio', '$dataTermino' , '$novo', '$id_usuario')";
    
    $retorno = mysqli_query($con, $sql);
    if ($retorno) {
        header('location: cadastro_portifolio.php?retorno=CadastroSucess');
    }else{
        echo 'Erro ao atualizar cadastro! Erro: ' .mysqli_error($con);
    }

?>