<?php 
    include('conexao.php');
?>
<?php 

    $nome_projeto = $_POST['nome-projeto'];
    $descri_projeto = $_POST['descricao-projeto'];
    $tipo_servico = $_POST['servico-projeto'];
    $orcamento_projeto = $_POST['orcamento-projeto'];
    $prazo_data = $_POST['prazo-projeto'];
    $prazo_tempo = $_POST['prazo-tempo'];
    $valor_projeto = $_POST['valor-projeto'];
    $nivel_tecnico = $_POST['nivel-experiencia'];
    $usuario = $_SESSION ['id_usuario'];

    $arquivo  = $_FILES['foto'];
    $foto_projeto  = null;

    if ($arquivo) {
        $caminho = $arquivo['tmp_name'];
        $novo = date('YmdHis') . $arquivo['name'];
        if( move_uploaded_file($caminho, "img_projeto/$novo")){
             $foto_projeto = "'$novo'";
        }
        //echo $foto_projeto;
     }
 

    $prazo_projeto = $prazo_data . " ". $prazo_tempo;

    $sql = "SELECT nome_projeto FROM projetos WHERE nome_projeto = '$nome_projeto' ";
    $retorno = mysqli_query($con, $sql);

    if(mysqli_num_rows($retorno) > 0) {
        echo 'Cadastro não efetuado';


    }else{
        $sql = "INSERT INTO projetos VALUES (null, '$nome_projeto', '$descri_projeto', '$novo', '$tipo_servico', '$orcamento_projeto' , '$prazo_projeto', '$valor_projeto', '$nivel_tecnico', '$usuario', 0 )";

        $retorno = mysqli_query($con, $sql);
    
        if ($retorno) {
        header('location: listar_projetos_cliente.php?retorno=AtualizaSucess');
        }else{
            echo 'Cadastro não foi cadastrado! Erro: ' .mysqli_error($con);
        };
    };

    

?>