<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tela Produto</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <style>
                #iframeContainer {
                    height: 100vh;
                }

                #buscas {
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

                #barra {
                    background-color: #AFCFDD;
                    border-radius: 15px 1px 1px 15px;
                    box-shadow: none;
                }

                #barra::placeholder {
                    color: #E6F2F8;
                    font-size: 1.02rem;
                }

                #btn {
                    background-color: #AFCFDD;
                    border-radius: 1px 15px 15px 1px;
                    max-width: 90vw;
                    transform: scale(0.98);
                }

                #icon {
                    width: 98%;
                    height: 90%;
                    margin-top: -0.29rem;
                }

                .linhas {
                    position: absolute;
                    width: 100%;
                    height: 4.4px;
                    max-width: 1024rem;
                    background: #075C85;
                    filter: blur(2.39px);
                }

                .butn {
                    position: absolute;
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                    width: 7.25rem;
                    height: 2.625rem;
                    flex-shrink: 0;
                    background-color: white;
                    transform: scale(1.4);
                }

                .butn:active {
                    transform: translateY(3px); /* Efeito de deslocamento para baixo */
                    box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.25); /* Sombra sutil */
                }

                #btn1 {
                    left: 63%;
                    border: 0.0625rem solid #075D87;
                    border-radius: 0.6875rem;
                }

                #btn2 {
                    left: 83%;
                    border: 0.0625rem solid #FF000F;
                    border-radius: 0.6875rem;
                }

                #btn3 {
                    position: fixed;
                    left: 65%;
                    border: 0.0625rem;
                    background: #075D87;
                    border-radius: 1.6875rem;
                    margin-top: 168%;
                    width: 17rem;
                    height: 4.3rem;
                }

                .pa {
                    flex-shrink: 0;
                    padding-left: 1rem;
                    padding-top: 0.19rem;
                }

                #p1 {
                    color: #075D87;
                    font-size: 1.3rem;
                }

                #p2 {
                    color: #FF000F;
                    font-size: 1.3rem;
                }

                #p3 {
                    color: #FFFFFF;
                    width: 13.725rem;
                    font-size: 1.75rem;
                    margin-left: 1rem;
                    margin-top: 0.3rem;
                }

                #produto-info {
                    position: absolute;
                    margin-top: -0.8rem;
                    margin-left: 1rem;
                    color: #043A54; 
                    font-family: 'Inter'; 
                    font-style: light;
                    font-size: 3rem;
                }

                .btn-voltar {
                    position: fixed;
                    top: 11rem;
                    transform: scale(0.8);
                    left: 1%;
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
            <input class="form-control" id="barra" type="search" placeholder=" Digite um produto" >
            <button onclick="searchData()" class="btn" id="btn"><img src="imagens/iconPesquisar.png" alt="pesquisar" id="icon"></button> 
            </div>
                
                <?php
                $con = mysqli_connect("localhost", "root", "", "bd_stocks");

                if (!$con) {
                    die("Erro na conexão: " . mysqli_connect_error());
                }

                if(!empty($_GET['search'])){
                    $data = $_GET['search'];
                    $comandoSql = "SELECT id_produto, descricao, quantidade, fornecedor, unidade_medida, qtd_minimo 
                                FROM tb_produto 
                                WHERE cod_loja = '$id_loja' AND descricao LIKE '%$data%' ORDER BY descricao";
                }else{
                    $comandoSql= "SELECT id_produto, descricao, quantidade, fornecedor, unidade_medida, qtd_minimo 
                                FROM tb_produto 
                                WHERE cod_loja = '$id_loja' ORDER BY descricao";
                }

                $resultado = mysqli_query($con, $comandoSql);

                $diferencaPorcentagem = 10;
                $i = 1;

                // Loop para exibir as informações dos produtos
                while ($dados = mysqli_fetch_assoc($resultado)) {
                    $id_produto = $dados["id_produto"];
                    $descricao = $dados["descricao"];
                    $quantidade = $dados["quantidade"];
                    $fornecedor = $dados["fornecedor"];
                    $unidade_medida = $dados["unidade_medida"];
                    $qtd_minimo = $dados["qtd_minimo"];

                    // Criação da linha no início das informações do produto
                    $posicaoLinhas = 25 + ($i - 1) * $diferencaPorcentagem;
                    echo '<hr class="linhas" id="linha' . $i . '" style="top: ' . $posicaoLinhas . '%;">';

                    // Criação da linha no final das informações do produto
                    $posicaoLinhas += $diferencaPorcentagem;
                    echo '<hr class="linhas" id="linha' . ($i + 1) . '" style="top: ' . $posicaoLinhas . '%;">';

                    $i++; // Incrementando o contador
                    $posicaoBtn = 19.7 + ($i - 1) * $diferencaPorcentagem;
                    $btnAlterar = "Alterar";
                    $btnExcluir = "Excluir";
                    echo "<p id='produto-info' style='top: $posicaoBtn%;'>";
                    echo "$descricao<br>";
                    echo "</p>";
                    echo "<a href='frm_altera_produto.php?id_produto=$id_produto&id_loja=$id_loja&id=$id'> <button type='button' class='butn' id='btn1' style='top: $posicaoBtn%;'><p class='pa' id='p1'><b>$btnAlterar</b></p></button></a>";
                    echo "<a href='delProduto.php?id_produto=$id_produto&id_loja=$id_loja&id=$id&descricao=$descricao'><button type='button' class='butn' id='btn2' style='top: $posicaoBtn%;'><p class='pa' id='p2'><b>$btnExcluir</b></p></button></a>";
                }
                ?>
                <a href="#" class="btn-voltar" onclick="history.back()">
                    <img src="imagens/iconVoltar.png" alt="voltar" id="icon">
                </a>

                <button type="button" class="butn" id="btn3" onclick="window.location.href='cadProduto.php?id_loja=<?php echo $id_loja; ?>&id=<?php echo $id; ?>';"><p class='pa' id='p3'><b>Cadastro novo</b></p></button>
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
                    window.location = 'telaProduto.php?id_loja='+<?php echo $id_loja?>+'&id='+<?php echo $id?>+'&search='+search.value;
                }
            </script>
</html>
