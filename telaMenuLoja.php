<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tela Loja</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <style>
                #iframeContainer {
                height: 100vh;
                }

                #cadastros, #visualizar {
                    display: flex;
                    flex-direction: column;
                    align-items: center;  
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
                    top: 20%;
                    left: 50%;
                }

                #linha2 {
                    top: 28.8%;
                    left: 50%;
                }

                p{
                    position: absolute;
                    color: #164257;
                    font-family: Inter;
                    font-size: 4.6rem;
                    font-style: normal;
                    letter-spacing: -0.4rem;
                    left: 34.8%;
                    max-width: 90vw;
                }

                #p1{
                    top: 22.6%;
                    text-align: center;
                }

                #p2{
                    top: 60.5%;
                    text-align: center;
                }

                #p3{
                    font-size: 2.1rem;
                    line-height: 61%;
                    letter-spacing: 0.1px;
                    left: 35%;
                }

                #p4{
                    font-size: 2.1rem;
                    line-height: 61%;
                    letter-spacing: 0.1px;
                    left: 32.5%;
                }
                
                #p5{
                    font-size: 2.1rem;
                    line-height: 61%;
                    letter-spacing: 0.1px;
                    left: 19%;
                }

                #p6{
                    font-size: 2.1rem;
                    line-height: 61%;
                    letter-spacing: 0.1px;
                    left: 30%;
                }

                #linha3 {
                    top: 58%;
                    left: 50%;
                }

                #linha4 {
                    top: 66.8%;
                    left: 50%;
                }

                .btn{
                    position: absolute;
                    box-shadow: 0px 6px 6px 0px rgba(0, 0, 0, 0.25);
                    width: 25.5rem;
                    height: 12rem;
                    background-color: white;
                } 

                .btn:active {
                    transform: translateY(3px); /* Efeito de deslocamento para baixo */
                    box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.25); /* Sombra sutil */
                }
            
                #icon{
                    width: 16%; 
                    height: 32%;
                    top: 16%;
                    position: absolute;
                    left: 43%;
                }

                #btn1{
                    top: 35%;
                    left: 6.2%;
                    padding-top: 5.6rem;
                    border: 0.13rem solid #075D87;
                    border-radius: 1.2rem;
                }

                #btn2{
                    top: 35%;
                    left: 52.8%;
                    padding-top: 5.6rem;
                    border: 0.13rem solid #075D87;
                    border-radius: 1.2rem;
                }

                #btn3{
                    top: 73%;
                    left: 6.2%;
                    padding-top: 5.6rem;
                    border: 0.13rem solid #075D87;
                    border-radius: 1.2rem;
                }

                #btn4{
                    top: 73%;
                    left: 52.8%;
                    padding-top: 5.6rem;
                    border: 0.13rem solid #075D87;
                    border-radius: 1.2rem;
                }    

                .btn-voltar{
                    transform: scale(0.8);
                    left: 1%;   
                }
                
                #voltar{
                    width: 6.5%; 
                    margin-top: 10.9rem;
                    margin-left: 0.5rem;
                }
            </style>
  </head>
        <body>

        <?php require "menu.php"?>

        <?php 
        $id_loja = $_GET['id_loja'];
        $id = $_GET['id'];
        ?>

        <a href="#" class="btn-voltar" onclick="history.back()"><img src="imagens/iconVoltar.png" alt="voltar" id="voltar" ></a>
            <div class="principal">
            <div id="cadastros">
                <hr id="linha1" class="linha">   
                <p id="p1">Cadastros</p>
                <button type="button" id="btn1" class="btn" onclick="window.location.href='telaUsuario.php?id_loja=<?php echo $id_loja; ?>&id=<?php echo $id; ?>';"><img src="imagens/iconUser.png" alt="usuário" id="icon"><p id="p3"> Usuário </p></button>
                <button type="button" id="btn2" class="btn" onclick="window.location.href='telaProduto.php?id_loja=<?php echo $id_loja; ?>&id=<?php echo $id; ?>';"><img src="imagens/iconProduto.png" alt="produtos" id="icon"><p id="p4"> Produtos </p></button>
                <hr id="linha2" class="linha">   
            </div>
            <div id="visualizar">  
                <hr id="linha3" class="linha">    
                <p id="p2">Visualizar</p>
                <button type="button" id="btn3" class="btn" onclick="window.location.href='telaChecagem.php?id_loja=<?php echo $id_loja; ?>&id=<?php echo $id; ?>';"><img src="imagens/iconCheck.png" alt="checagem estoque" id="icon"><p id="p5"> Checar estoque </p></button>
                <button type="button" id="btn4" class="btn" onclick="window.location.href='telaRelatorio.php?id_loja=<?php echo $id_loja; ?>&id=<?php echo $id; ?>';"><img src="imagens/iconRelatorio.png" alt="relatórios" id="icon"><p id="p6"> Relatórios </p></button>
                <hr id="linha4" class="linha">
            </div>
            </div>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
        </body>
</html>
