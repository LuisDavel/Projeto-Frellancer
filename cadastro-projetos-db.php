<?php 
    include('conexao.php');
?>
<?php 

    $nome_projeto = $_POST['nome-projeto'];
    $descri_projeto = $_POST['descricao-projeto'];
    $foto_projeto = null;
    $tipo_servico = $_POST['servico-projeto'];
    $orcamento_projeto = $_POST['orcamento-projeto'];
    $prazo_data = $_POST['prazo-projeto'];
    $prazo_tempo = $_POST['prazo-tempo'];
    $valor_projeto = $_POST['valor-projeto'];
    $nivel_tecnico = $_POST['nivel-experiencia'];

    $prazo_projeto = $prazo_data . " ". $prazo_tempo;

    $sql = "SELECT nome_projeto FROM projetos WHERE nome_projeto = '$nome_projeto' ";
    $retorno = mysqli_query($con, $sql);

    if(mysqli_num_rows($retorno) > 0) {
        echo 'Cadastro não';


    }else{
        $sql = "INSERT INTO projetos VALUES (null, '$nome_projeto', '$descri_projeto', '$foto_projeto', '$tipo_servico', '$orcamento_projeto' , '$prazo_projeto', '$valor_projeto', '$nivel_tecnico' )";

        $retorno = mysqli_query($con, $sql);
    
        if ($retorno) {
        header('location: index.php');
        }else{
            echo 'Cadastro não foi cadastrado! Erro: ' .mysqli_error($con);
        };
    };

    

?>