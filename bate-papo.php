<?php
  include('conexao.php');
  
  if (@$_GET['acao'] == "sair") {
     session_destroy();
  }
  if (@$_SESSION['id'] != "") {
    header("Location:index.php");
  }
  
  $usuario = $_SESSION['id_usuario'];
?>

<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bate Papo</title>
                                            
    
                                            <!--  TESTE PODE DAR MERDA-->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    .container{max-width:1170px; margin:auto;}
        img{ max-width:100%;}
        .inbox_people {
          background: #f8f8f8 none repeat scroll 0 0;
          float: left;
          overflow: hidden;
          width: 40%; border-right:1px solid #c4c4c4;
        }
        .inbox_msg {
          border: 1px solid #c4c4c4;
          clear: both;
          overflow: hidden;
        }
        .top_spac{ 
            margin: 20px 0 0;
        }


        .recent_heading {
            float: left; width:40%;
        }
        .srch_bar {
          display: inline-block;
          text-align: right;
          width: 60%; padding:
        }
        .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

        .recent_heading h4 {
          color: #05728f;
          font-size: 21px;
          margin: auto;
        }
        .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
        .srch_bar .input-group-addon button {
          background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
          border: medium none;
          padding: 0;
          color: #707070;
          font-size: 18px;
        }
        .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

        .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
        .chat_ib h5 span{ font-size:13px; float:right;}
        .chat_ib p{ font-size:14px; color:#989898; margin:auto}
        .chat_img {
          float: left;
          width: 11%;
        }
        .chat_ib {
          float: left;
          padding: 0 0 0 15px;
          width: 88%;
        }

        .chat_people{ overflow:hidden; clear:both;}
        .chat_list {
          border-bottom: 1px solid #c4c4c4;
          margin: 0;
          padding: 18px 16px 10px;
        }
        .inbox_chat { height: 550px; overflow-y: scroll;}

        .active_chat{ background:#ebebeb;}

        .incoming_msg_img {
          display: inline-block;
          width: 6%;
        }
        .received_msg {
          display: inline-block;
          padding: 0 0 0 10px;
          vertical-align: top;
          width: 92%;
         }
         .received_withd_msg p {
          background: #ebebeb none repeat scroll 0 0;
          border-radius: 3px;
          color: #646464;
          font-size: 14px;
          margin: 0;
          padding: 5px 10px 5px 12px;
          width: 100%;
        }
        .time_date {
          color: #747474;
          display: block;
          font-size: 12px;
          margin: 8px 0 0;
        }
        .received_withd_msg { width: 57%;}
        .mesgs {
          float: left;
          padding: 30px 15px 0 25px;
          width: 60%;
        }

         .sent_msg p {
          background: #05728f none repeat scroll 0 0;
          border-radius: 3px;
          font-size: 14px;
          margin: 0; color:#fff;
          padding: 5px 10px 5px 12px;
          width:100%;
        }
        .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
        .sent_msg {
          float: right;
          width: 46%;
        }
        .input_msg_write input {
          background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
          border: medium none;
          color: #4c4c4c;
          font-size: 15px;
          min-height: 48px;
          width: 100%;
        }

        .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
        .msg_send_btn {
          background: #05728f none repeat scroll 0 0;
          border: medium none;
          border-radius: 50%;
          color: #fff;
          cursor: pointer;
          font-size: 17px;
          height: 33px;
          position: absolute;
          right: 0;
          top: 11px;
          width: 33px;
        }
        .messaging { padding: 0 0 50px 0;}
        .msg_history {
          height: 516px;
          overflow-y: auto;
        }    
    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">


                             <!--  TESTE PODE DAR MERDA-->


</head>
<body>
    <?php
        $id = $_GET['id'];
    ?>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container navbar" id="corNavbar01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"></li>
                <li class="nav-item active">
                </li>
                <li class="nav-item active">
                </li>
            </ul>
            <a class="btn btn-info my-2 my-sm-0" href="index.php" type="submit" value="">Voltar para o inicio</a>
        </div>
    </nav>      

    </header>

    <?php
        $id = $_GET['id'];
    ?>
    <?php 
   
        $sql = "SELECT * FROM usuario WHERE id_usuario = $usuario";

        $retorno = mysqli_query($con, $sql);
        if(!$retorno) {
	    	echo mysqli_error($con);
	    } else {
            while($item  = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
                 $id_compara = $item['id_usuario'];
            }
        }
        //echo $id_compara;

         /// SELECT que mostra a listagem o chat entre freela e cliente
	    $sql = "SELECT id_cliente, id_freela, nome_usuario, conversa FROM bate_papo Where id_projeto = $id";
	    //echo $sql;
	    $retorno = mysqli_query($con, $sql);
	    if(!$retorno) {
	    	echo mysqli_error($con);
	    } else {
            

	?>
    <br>
    <br>
    <br>
    <br>
  <?php

    $sql_i = "SELECT nome_projeto, prazo, valor, orcamento, tipo_servico FROM  projetos Where id_projetos = $id";
	    //echo $sql;
	    $retorno_i = mysqli_query($con, $sql_i);
	    if(!$retorno_i) {
	    	echo mysqli_error($con);
	    } else {

	?>



                <!-- Pode dar merda -->
    <div  class="container">
        <div class="messaging">
      <div  class="inbox_msg">
        <div class="inbox_people">
          <div class="inbox_chat">
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_ib">
                  
  <?php
              while($item_i = mysqli_fetch_array($retorno_i, MYSQLI_ASSOC)) {
              
	?>
                  <h2><?php echo $item_i ['nome_projeto']; ?></h2>
                  <p>Valor minimo do projeto: <?php echo $item_i ['valor']; ?></p>
                  <p> Possui orçamento:  <?php echo $item_i ['orcamento']; ?></p>
                  <p> Tipo de Freela: <?php echo $item_i ['tipo_servico']; ?></p>
                  <p> Prazo de entrega: <?php echo $item_i ['prazo']; ?></p><br>
                  <a class="btn btn-info my-2 my-sm-0" href="estrelas.php?id=<?php echo $id ?>" >Terminar</a><br>
                </div>
                

 <?php
   }
 }
 ?>

                  
              </div>
            </div>
          </div>
        </div>

        <div  class="mesgs">
          <div  class="msg_history">

<?php
            while($item = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
   /*             <p><?php echo $item ['nome_usuario']; ?>: <?php echo $item ['conversa']; ?></p> */
    
?>  
            <div  class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <span class="time_date"> <?php echo $item ['nome_usuario']; ?></span>
                  <p><?php echo $item ['conversa']; ?></p>
                  
                </div>
              </div>
            </div>  

<?php 
              
       }
    }

?>
          </div> 
            <form class="" action="bate-papo-db.php" enctype="multipart/form-data" method="post">
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="hidden" name="id" value= "<?php echo ($id)?>" >
                        <input type="text" class="write_msg" name="msg" maxlength="300" placeholder="Escreva aqui ..." />
                        <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>    
        </div>
      </div>
</div>





</body>
</html>