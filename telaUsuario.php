<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tela Usuário</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <style>
                #iframeContainer {
                height: 100vh;
                }

                #buscas{
                    display: flex;
                    flex-direction: column; 
                }

                .d-flex {
                    position: absolute;
                    transform: scale(2.4); 
                    font-style: normal;
                    letter-spacing: -0.4rem;
                    left: 33%;
                    max-width: 90vw;
                    margin-top: 17rem;
                    width: 35%;   
                } 

                #barra{
                    background-color: #AFCFDD;
                    border-radius: 15px 1px 1px 15px; 
                    box-shadow: none;    
                }

            
                #barra::placeholder {
                    color: #E6F2F8; 
                    font-size: 1.02rem;   
                }

                #btn{
                    background-color: #AFCFDD;
                    border-radius: 1px 15px 15px 1px; 
                    max-width: 90vw;
                    transform: scale(0.98); 
                }

                #icon{
                    width: 98%; 
                    height: 90%;
                    margin-top: -0.29rem;
                }

                .linhas {
                    width: 100%;
                    height: 4.4px;
                    max-width: 1024rem;
                    background: #075C85;
                    filter: blur(2.39px);  
                }

                .butn{
                    position: absolute;
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                    width: 8.55rem;
                    height: 2.925rem;
                    flex-shrink: 0;
                    background-color: white;
                    transform: scale(1.4); 
                } 

                .butn:active {
                    transform: translateY(3px); /* Efeito de deslocamento para baixo */
                    box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.25); /* Sombra sutil */
                }

                #btn1{
                    left: 59.8%;
                    border: 0.0625rem solid #075D87;
                    border-radius: 0.6875rem;
                    margin-top: -3.5rem;
                } 

                #btn2{
                    left: 81.1%;
                    border: 0.0625rem solid #FF000F;
                    border-radius: 0.6875rem;
                    margin-top: -3.5rem;
                } 

                #btn3{
                    position:fixed;
                    left: 65%;
                    border: 0.0625rem;
                    background: #075D87;
                    border-radius: 1.6875rem;
                    margin-top: 168%;
                    width: 17rem;
                    height: 4.3rem;
                } 

                .pa{
                    flex-shrink: 0;   
                    padding-top: 0.18rem; 
                }

                #p1{
                    color: #075D87; 
                    font-size: 1.5rem;  
                }

                #p2{
                    color: #FF000F; 
                    font-size: 1.5rem;  
                }

                #p3{
                    color: #FFFFFF;   
                    width: 13.725rem;
                    font-size: 1.75rem;
                    margin-left: 1rem;
                    margin-top: 0.3rem;
                }

                .btn-voltar{
                    position: absolute;
                    top: 11rem;
                    transform: scale(0.8);
                    left: 1%;
                    z-index: 1;
                }

                .lista{
                    left: 50%;
                    transform: translate(-50%);
                    width: 100%;
                    font-size: 30px;
                    position: absolute;
                    top: 450px;
                }

                #produto-info {
                    margin-top: -0.1rem;
                    margin-left: 0.26rem;
                    color: #043A54; /* Cor do texto dos produtos */
                    font-family: 'Inter'; /*Fonte do texto*/
                    font-style: light;
                    font-size: 3rem;
                }

                #info{
                    margin-top: -0.9rem;
                    margin-left: 0.3rem;
                    color: #043A54; /* Cor do texto dos produtos */
                    font-family: 'Inter'; /*Fonte do texto*/
                    font-style: light;
                    font-size: 2rem;
                }
            </style>
  </head>
        <body>

        <?php require "menu.php"?>

        <?php 
        $id_loja = $_GET['id_loja'];
        $id = $_GET['id'];

        ?> 

        <div>
            <div id="buscas">
            <div class="d-flex" role="search">
            <input class="form-control" id="barra" type="search" placeholder=" Digite um usuário" >
            <button onclick="searchData()" class="btn" id="btn"><img src="imagens/iconPesquisar.png" alt="pesquisar" id="icon"></button> 
            </div>
                <a href="#" class="btn-voltar" onclick="history.back()">
                    <img src="imagens/iconVoltar.png" alt="voltar">
                </a>

                <div class="lista">
                <?php 
                    $con=mysqli_connect("localhost","root","","bd_stocks");  
                    require "conexao.php";

                    if(!empty($_GET['search'])){
                        $data = $_GET['search'];
                        $comandoSql = "SELECT u.id_usuario, u.nome_usuario, u.telefone, u.email, u.tipo_usuario
                                        FROM tb_usuario u
                                        JOIN tb_usuario_loja ul ON u.id_usuario = ul.cod_usuario
                                        JOIN tb_loja l ON ul.cod_loja = l.id_loja
                                        WHERE l.id_loja = $id_loja AND u.status = 0 AND nome_usuario LIKE '%$data%'";
                    }else{
                        $comandoSql= "SELECT u.id_usuario, u.nome_usuario, u.telefone, u.email, u.tipo_usuario
                                      FROM tb_usuario u
                                      JOIN tb_usuario_loja ul ON u.id_usuario = ul.cod_usuario
                                      JOIN tb_loja l ON ul.cod_loja = l.id_loja
                                      WHERE l.id_loja = $id_loja AND u.status = 0";
                    }
                    $resultado=mysqli_query($con,$comandoSql);

                    //loop
                    while($dados = mysqli_fetch_assoc($resultado)){
                        $id_user = $dados["id_usuario"];
                        $nome = $dados["nome_usuario"];
                        $telefone = $dados["telefone"];
                        $email = $dados["email"];
                        $tipo_usuario = $dados["tipo_usuario"];

                        //exibindo dados
                        echo "<hr class='linhas'>";
                        echo "<p id='produto-info'> $nome <br></p>";
                        echo "<p id='info'>$telefone <br>";
                        echo "$email";
                        if ($tipo_usuario == 0) {
                            echo "<a href='frm_altera_user.php?id_usuario=$id_user&id_loja=$id_loja&id=$id' ><button type='button' class='butn' id='btn1';><p class='pa' id='p1'><b>Alterar</b></p></button></a>";
                            echo "<a href='delUser.php?id_usuario=$id_user&id_loja=$id_loja&id=$id&nome_usuario=$nome'><button type='button' class='butn' id='btn2'><p class='pa' id='p2'><b>Desativar</b></p></button></a>";
                        }
                    }
                ?>

                </div>
                <button type="button" class="butn" id="btn3" onclick="window.location.href='cadUser.php?id_loja=<?php echo $id_loja; ?>&id=<?php echo $id; ?>';"><p class='pa' id='p3'><b>Cadastro novo</b></p></button>
            </div>
        </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
        </body>
            <script>
                var search = document.getElementById('barra');

                search.addEventListener("keydown", function(event){
                    if (event.key === "Enter"){
                        searchData();
                    }
                });

                function searchData(){
                    window.location = 'telaUsuario.php?id_loja='+<?php echo $id_loja?>+'&id='+<?php echo $id?>+'&search='+search.value;
                }
            </script>
</html>
