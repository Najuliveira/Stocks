<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tela Cadastro de Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.4">
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <style>
            #p1{
                position: absolute;
                color: #164257;
                font-family: Inter;
                font-size: 4.6rem;
                font-style: normal;
                letter-spacing: -0.2rem;
                left: 30%;
                top: 17%;
                transform: translateX(-18%); 
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
                top: 11rem;
                transform: scale(0.8);
                left: 1%;
            }

            .linha {
                position: absolute;
                transform: translate(-50%, -50%);
                width: 100%;
                height: 4.4px;
                max-width: 90vw;
                background: #075C85;
                filter: blur(2.39px);  
                left: 50%;
            }

            #linha1 {
                top: 15%;
                left: 50%;
            }

            #linha2 {
                top: 23%;
                left: 50%;
            }

            .form{
                position: absolute;
                transform: translate(-50%,-50%);
                left: 6%;
                top: 25%;
            }

            .caixa{
                margin-top: -20rem;
                padding-top: 1rem;
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
                top: 15%;
            }
            
            .pcd{
                font-family: Inter;
                font-size: 50px;
                font-style: normal;
                font-weight: 200;
                line-height: 90%;
                letter-spacing: -0.684px;
                margin-top: 6%;
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
            margin-top: 3.3rem;
            font-size: 3rem;
            
            }
        </style>
  </head>
        <body>
        <?php require "menu.php"; 
            require "lista_produto_select.php"?>
            
        <?php 
        $id_loja = $_GET['id_loja'];
        $id = $_GET['id'];
        ?> 

            <a href="#" class="btn-voltar" onclick="history.back()"><img src="imagens/iconVoltar.png" alt="voltar" id="icon"></a>

            <hr id="linha1" class="linha">   
                <p id="p1">Cadastro Produto</p>
            <hr id="linha2" class="linha"> 

            <div class="alert" role="alert" id="mensagem" style="display: none;">Mensagem</div>
            <div class="form">
                <form action="cadastra_produto.php?id_loja=<?php echo $id_loja; ?>&id=<?php echo $id; ?>" method="POST">
                <p class="pcd">Descrição</p>
                <input type="text" name="descricao" class="caixa" placeholder="  Digite a descrição do produto" required>
                <br>
                
                <div class="form-group">
                <label for="categoria"> </label>
                <?php lista_pro_select(); ?>
                </div>

                <p class="pcd">Fornecedor</p>
                <input type="text" name="fornecedor" class="caixa" placeholder="  Digite o fornecedor" required>
                <br>

                <p class="pcd">Unidade de medida</p>
                <input type="text" name="unidade" class="caixa" placeholder="  Digite a unidade de medida" required>
                <br>

                <p class="pcd">Quantidade mínima</p>
                <input type="text" name="quant_min" class="caixa" placeholder="  Digite a quantidade mínima" required>
                <br>

                <button id="btn" class="btn btn-primary" >Cadastrar</button></div>
                </form> 
            </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
        </body>
</html>
