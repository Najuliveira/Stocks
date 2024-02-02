<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tela Cadastro de Produto</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .pcd{
            font-family: Inter;
            font-size: 50px;
            font-style: normal;
            font-weight: 200;
            line-height: 90%;
            letter-spacing: -0.684px;
            margin-top: 6%;
        }

        #cat{
            margin-top:-4rem;
        }
        
        select{
            width: 800px;
            height: 80px;
            border-radius: 30px;
            border: 1px solid #075D87;
            background: #ffffff;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            appearance: none;
            background-image: url('imagens/setinha.png'); /* Imagem de fundo */
            background-position: right 1rem center; /* Ta colocando o ícone a direita com 1x de distancia se alinhando ao centro */
            background-repeat: no-repeat; /*Para não ficar repetindo o ícone, pq ele da problemas */
          }

        option:first{
            color: #999;
        }

        .opt{
            position:absolute;
            font-size: 15px;
            font-family: Inter;
            top: 50rem;
        }
    </style>
<?php
  function lista_pro_select(){
     $con=mysqli_connect("localhost","root","","bd_stocks");  
     require "conexao.php";
     
     /* Comando sql para consulta dos registros */
     $comandoSql= "select id_categoria,nome_categoria
                   from tb_categoria";
     $resultado=mysqli_query($con,$comandoSql);
     
     //Criando o objeto select
     echo "<p class='pcd' id='cat'>Categoria</p>";
     echo "<select id='categoria' name='categoria' style='font-size: 38px; color: #696969; font-family: Inter' required>";
     echo "<option class='opt' disabled selected name='categoria' value=''>&nbspEscolha a categoria</option>";
     
     /* Pegando os dados da consulta criada e exibindo */
     while($dados=mysqli_fetch_assoc($resultado)){
       $id= $dados["id_categoria"];
       $nome=$dados["nome_categoria"];
       echo "<option class='opt' value=$id> $nome </option>";
     }
      echo "</select>";
  } //fim do lista_pro_select()



  function lista_pro_select_id($id_produto){ 
     require "conexao.php";
    
     /* Comando sql para consulta dos registros */
     $comandoSql= "select id_categoria,nome_categoria
                   from tb_categoria";
     $resultado=mysqli_query($con,$comandoSql);
    
     //Criando o objeto select
     echo "<p class='pcd' id='cat'>Categoria</p>";
     echo "<select id='categoria' name='categoria' style='font-size: 38px; color: #696969; font-family: Inter' required>";

     /* Pegando os dados da consulta criada e exibindo */
     while($dados=mysqli_fetch_assoc($resultado)){
       $id= $dados["id_categoria"];
       $nome=$dados["nome_categoria"];

          if($id_produto==$id)
            echo "<option class='opt' value=$id selected> $nome </option>";
          else 
            echo "<option class='opt' value=$id> $nome </option>";  
        }
      echo "</select>";
    } 
?>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>