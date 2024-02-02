<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tela Altera Usuário</title>
  <meta name="viewport" content="width=device-width, initial-scale=0.4">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="css/menu.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
                body::before {
                    content: "";
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.5); /* Cor de fundo semi-transparente */
                    z-index: -1; /* Coloca o elemento abaixo do conteúdo do corpo */
                 }

               #p1 {
                    position: absolute;
                    color: #164257;
                    font-family: Inter;
                    font-size: 4.6rem;
                    font-style: normal;
                    letter-spacing: 0.1rem;
                    max-width: 90vw;
                    top: 22%;
                    left: 50%; /*centralizar horizontalmente*/
                    transform: translateX(-50%); /*centralizar horizontalmente tbm*/
                }

                #p2{
                    position: absolute;
                    color: #164257;
                    font-family: Inter;
                    font-size: 3.5rem;
                    font-style: normal;
                    letter-spacing: 0.1rem;
                    max-width: 90vw;
                    top: 13.8%;
                    left: 19.8%; /*centralizar horizontalmente*/
                
                }

                 form{
                    position: absolute;
                    font-family: Inter;
                    font-size: 4.6rem;
                    font-style: normal;
                    left: 50%;
                    top: 50%;
                    transform: translate(-50);
                }

                #icon{
                    width: 98%; 
                    height: 90%;
                    margin-top: -0.29rem;
                }

                .btn-voltar{
                    position: fixed;
                    top: 12.6rem;
                    transform: scale(0.9);
                    left: 1%;
                }

                .linha {
                    position: absolute;
                    transform: translate(-50%, -50%);
                    width: 100%;
                    max-width: 90vw;
                    background: #075C85;
                    filter: blur(6px);  
                    left: 50%;
                }

                #linha1 {
                    top: 20%;
                    left: 50%;
                    height: 3px;
                }

                #linha2 {
                    top: 28%;
                    left: 50%;
                    height: 3px;
                }

                .form{
                    position: absolute;
                    transform: translate(-50%,-50%);
                    left: 12%;
                    top: 40%;
                }

                .caixa{
                    position: relative;
                    top: 2.8rem;
                    padding-right: 5rem;
                    outline-color: red;
                    font-size: 40px;
                    width: 800px;
                    height: 80px;
                    border-radius: 30px;
                    border: 1px solid #075D87;
                    background: #FFF;
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                }
                
                .caixa::placeholder{
                    font-family: Inter;
                    position: absolute;
                    top: 18%;
                    left: 1rem;
                }

                #btn{
                    position: absolute;
                    left: 29.5%;
                    background-color: #075c85;
                    color: #ffffff;
                    width: 400px;
                    border: none;
                    outline: none;
                    border-radius: 1.625rem;
                    height: 5.775rem;
                    margin-top: -2.5rem;
                    font-size: 3rem;
                }

                .form-box {
                    position: relative;
                    z-index: 1;
                    padding: 2.4rem;
                    width: 60rem;
                    border: 1px solid #ccc;
                    height: 40.8rem;
                    border-radius: 2rem;
                    background-color: #ffffff;
                    box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.3);
                }

                #mensagem{
                    display: none;
                    position: absolute;
                    font-size: 2rem;
                    font-family: Inter;
                    top: 28.5rem;
                    border-radius: 5px;
                    left: 53%; /*centralizar horizontalmente*/
                    transform: translateX(-50%); 
                    text-align: center;  
                }

                #mensagem1{
                    display: none;
                    position: absolute;
                    font-size: 2rem;
                    font-family: Inter;
                    top: 30rem;
                    border-radius: 5px;
                    left: 53%; /*centralizar horizontalmente*/
                    transform: translateX(-50%); 
                    text-align: center;  
                }

                select{
                    width: 300px;
                    height: 80px;
                    border-radius: 20px;
                    border: 1px solid #075D87;
                    background: #ffffff;
                    margin-left: 9rem;
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                    appearance: none;
                    background-image: url('imagens/setinha.png'); /* Imagem de fundo */
                    background-position: right 1rem center; /* Ta colocando o ícone a direita com 1x de distancia se alinhando ao centro */
                    background-repeat: no-repeat; /*Para não ficar repetindo o ícone, pq ele da problemas */
                }
                
                option:first{
                    color: #999;
                }
                
                #tipo{
                    margin-top:4.6rem;
                    font-size: 2.5rem;
                    font-family: Inter;
                }
                
                .opt{
                    position:absolute;
                    font-size: 15px;
                    font-family: Inter;
                    top: 50rem;
                }
            </style>
  </head>
        <body>

        <?php require "menu.php"?>

        <?php 
        $id_loja = $_GET['id_loja'];
        $id_pdt = $_GET['id_pdt'];
        $id = $_GET['id'];
        ?> 

        <?php
                require "conexao.php";

                /* Comando sql para listar os dados do cliente selecionado */
                $comandosql="select * from tb_produto where id_produto='$id_pdt'";
                $resultado=mysqli_query($con,$comandosql);

                /* Pegando os dados da consulta criada e armazenando em variaveis */
                $dados=mysqli_fetch_assoc($resultado);

                $descricao=$dados['descricao'];
                $medida=$dados['unidade_medida'];
                $qtd_minimo=$dados['qtd_minimo'];
                $quantidade=$dados['quantidade'];
                $quantidadeFormatada = number_format($quantidade, 1, ',', '.');
        ?>
        <div id="corpo"> 
            <a href="#" class="btn-voltar" onclick="history.back()"><img src="imagens/iconVoltar.png" alt="voltar" id="icon"></a>

            <hr id="linha1" class="linha">   
                <p id="p1"><?php echo $descricao; ?></p>
            <hr id="linha2" class="linha">   

            <div class="form">
            <form id="check" action="" method="POST">
                <input type="text" value="<?php echo $id_produto?>" name="id_produto" id="campoInvisivel" style="display: none;">
                <input type="text" value="<?php echo $quantidade?>" name="quantidade" id="campoInvisivel1" style="display: none;">
                <input type="text" value="<?php echo $qtd_minimo?>" name="qtd_minimo" id="campoInvisivel1" style="display: none;">
                <div class="form-box">
                    <p id="p2"> Quantidade em <?php echo $medida?></p>
                    <br>
                    <input type="text" class="caixa" name="digitado" placeholder="<?php echo $quantidadeFormatada . ' ' . $medida; ?> ">
                        <select id="tipo">
                        <option  class="opt" value="saida">&nbspSaída</option>
                            <option class="opt" value="entrada">&nbspEntrada</option>
                        </select><br><br>
                    <button id="btn" class="btn btn-primary" onclick="checagem()">Salvar</button>
                    <div id="mensagem" class="alert alert-danger" style="width: 70%" role="alert"></div>
                    <div id="mensagem1" class="alert alert-danger" style="width: 70%" role="alert"></div>
                </div>
            </form>
        </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
            <script>
                $('#btn').click(function(e) {
                    e.preventDefault(); // Impede o envio do formulário
                    var quantidade = $('.caixa').val();
            
            /*ABAIXO a expressão '!/^\d*\.?\d*$/' regular está procurando por uma 
            string que comece com zero ou mais dígitos, seguidos de um ponto 
            decimal (opcional), e depois seguidos por zero ou mais dígitos. 
            Isso é uma representação comum de um número decimal, como "123.45" ou "0.5". */
                    if (quantidade.trim() == "") {
                        $('#mensagem1').html("Insira um valor!");
                        $('#mensagem1').fadeIn(300).delay(2000).fadeOut(400);
                    } else if (!/^\d*\.?\d*$/.test(quantidade)) {
                        $('#mensagem').html('Insira apenas números! <br> Caso seja um valor decimal, substituir a " , " por " . "');
                        $('#mensagem').fadeIn(300).delay(2000).fadeOut(400);
                    } else {
                        // Caso contrário, envie o formulário
                        $('form').submit();
                    }
                });
            </script>
            <script>
                    function checagem() {
                        var formulario = document.getElementById("check");
                        var condicao = document.getElementById("tipo").value;
                        
                        if (condicao === "entrada") {
                            formulario.action = "edtQuant.php?id_loja=<?php echo $id_loja; ?>&id=<?php echo $id; ?>&id_pdt=<?php echo $id_pdt; ?>" ;
                        } else {
                            formulario.action = "saida.php?id_loja=<?php echo $id_loja; ?>&id=<?php echo $id; ?>&id_pdt=<?php echo $id_pdt; ?>" ;
                        }
                    }
            </script>
        </body>
</html>
