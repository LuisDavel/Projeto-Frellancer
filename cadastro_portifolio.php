<?php
    include('conexao.php');
    
    $id_usuario = @$_SESSION['id_usuario'];
    
    $queryTipoUsuario = "SELECT * FROM usuario where tipo_usuario = 'F' and id_usuario =  $id_usuario" ;
    $retornoTipoUsuario = mysqli_query($con, $queryTipoUsuario);

    if (mysqli_num_rows($retornoTipoUsuario) == 1) {
        if (@$_SESSION['id_usuario'] != "") { 
            ?>
    <!DOCTYPE html>
    <html lang="pt-br">
            <head>
                    <title>Cadastro Portifólio</title>
                    <link rel="stylesheet" type="text/css" href="css/styleCadastroCliente.css" />
                <!-- Abertura BootStrap -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <!-- Fechamento BootStrap -->  
            </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container navbar" id="corNavbar01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"></li>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item active">
                        </li>
                    </ul>
                    <a class="btn btn-info my-2 my-sm-0 text-white" href="index.php" type="submit" value="">Listar Projetos</a>
                </div>
            </nav>      
        </header>

<br>
<br>
        <section class ="d-flex justify-content-center" >	
        
                <form action="cadastro_portifolio_bd.php" method="post" enctype="multipart/form-data" class="">
                      
                        <label for="nome">Nome Projeto:</label><br>
                        <input class="form-control" type="text" name="nome" id="nome" maxlength="20"><br>
                        <label for="descricao">Descrição do Projeto:</label><br>
                        <textarea class="form-control" type="text" name="descricao" id="descricao"></textarea><br>
            
                        <label for="dataInicio">Data início:</label><br>
                        <input class="form-control" type="date" name="dataInicio" id="dataInicio" maxlength="20"><br>
            
                        <label for="dataTermino">Data término:</label><br>
                        <input class="form-control" type="date" name="dataTermino" id="dataTermino" minlength="8" maxlength="12"><br>
            
                        <label for="foto">Foto Projeto</label><br>
                        <input class="form-control" type="file" name="foto"><br><br>
                    <div class ="d-flex justify-content-center"> 
                        <input type="submit" class="btn btn-info my-2 my-sm-0  text-white" value="Salvar">
                    </div>
                </form>
            
                </section>
        </body>
</html>
<?php    
    } else { 
        header("Location:index.php");   
    }

    }else{
        header('location:index.php?retorno=UsuarioNaoAutorizado');
    }    
?>

