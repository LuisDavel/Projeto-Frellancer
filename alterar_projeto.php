<?php
  include('conexao.php');
  
  if (@$_GET['acao'] == "sair") {
     session_destroy();
  }

  $id_usuario = @$_SESSION['id_usuario'];
  $experiencia = @$_SESSION['experiencia'];
  

  echo($_SESSION['nome_completo']);

    $queryTipoUsuario = "SELECT * FROM usuario where tipo_usuario = 'C' and id_usuario =  $id_usuario" ;
    $retornoTipoUsuario = mysqli_query($con, $queryTipoUsuario);

    if (mysqli_num_rows($retornoTipoUsuario) == 1) {
        if (@$_SESSION['id_usuario'] != "") {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cadastro do Projeto</title>

            
            
            <!-- Abertuda do SQL para pesquisa de tipos de serviços desejados para efetuar a abertura do projeto -->
            
            <?php
                $sqlProjeto = "SELECT id_projetos, nome_projeto, descricao_projeto, foto, tipo_servico, prazo, orcamento, valor FROM projetos where id_cliente = '$id_usuario'";
                //echo $sql;
                $retornoProjeto = mysqli_query($con, $sqlProjeto);
                if(!$retornoProjeto) {
                    echo mysqli_error($con);
                } else {
				    if($itemProjeto = mysqli_fetch_array($retornoProjeto, MYSQLI_ASSOC)) {
		    ?>

                <?php 
                    $sql = "SELECT * FROM tipo_servico";
                    //echo $sql;
                    $retorno = mysqli_query($con, $sql);
                    if(!$retorno) {
                        echo mysqli_error($con);
                    } else {
                ?>
            <!-- Fechamento do SQl de preenchimento do tipo -->
            
            
            <!-- Abertura BootStrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <!-- Fechamento BootStrap -->        


        </head>
        <body>
            <section>
                <form class="" action="alterar_projeto_bd.php" enctype="multipart/form-data" method="post">
                    <br>
                    <div>
                        <label for="nome-projeto">Nome do projeto</label><br>
                        <input class='' type="text" value="<?php echo $itemProjeto['nome_projeto']; ?>" name="nome-projeto" id="nome-projeto" maxlength="100" required>
                    </div><br>

                    <div>
                        <label for="descricao-projeto">Descrição do Projeto</label><br>
                        <textarea id="story" name="descricao-projeto" value="<?php echo $itemProjeto['descricao_projeto']; ?>" rows="5" cols="33" required></textarea>
                    </div><br>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto demonstrativa(Opcional)</label><br>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>

                    <div>
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tipo do serviço</label><br>
                        <select name="servico-projeto" id="servico" required >
                            <option selected> Escolha </option>
                            <?php 
                                while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
                            ?>
                                <option value="<?php echo $item['nome_servico']; ?>"><?php echo $item['nome_servico']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>    
                    </div> <br>

            <!-- Fechamento do SQl de preenchimento do tipo de serviço -->

                    <label for="prazo">Prazo</label><br>
                    <input type=date step="1" name="prazo-projeto" required>
                    <input type="time" id="appt" name="prazo-tempo" min="09:00" max="18:00" required><br><br>

                    <label for="orcamento">Orçamento</label><br>
                    <input class="" type="number" value="<?php echo $itemProjeto['orcamento']; ?>" name="orcamento-projeto" id="nome-projeto" maxlength="100" required><br><br>

                    <label for="valor-projeto">Valor do projeto</label><br>
                    <input type="text" id="valor" name="valor-projeto" value="<?php echo $itemProjeto['valor']; ?>" required> <br><br>

                    <label for="nivel-tecnico">Nivel de Experiência</label><br>
                    <input class="" type="text" name="nivel-experiencia" id="nivel-experiencia" required>
                    <br>

                    <button type="submit" class="btn btn-primary my-1">Enviar</button>

                </form>
                <?php					
                }
            } 
            ?>
            
            </section>
            <?php					
                } 
            ?>
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


