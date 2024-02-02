<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tela Checagem</title>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=0.4">
    <link rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }

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
                position: fixed;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
                width: 11.25rem;
                height: 2.625rem;
                flex-shrink: 0;
                background-color: white;
                transform: scale(1.4);
            }

            .butn:active {
                transform: translateY(3px);
                box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.25);
            }

            .btn1 {
                margin-top: -7.5rem;
                left: 72%;
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
                padding-left: -0.5rem;
                padding-top: -1rem;
            }

            #p1 {
                color: #075D87;
                font-size: 1.58rem;
            }

            .produto-info {
                position: absolute;
                margin-top: 3rem;
                margin-left: 0.6rem;
                color: #043A54; 
                font-family: 'Inter'; 
                font-style: light;
                font-size: 2.1rem;
            }

            .btn-voltar {
                position: fixed;
                top: 13rem;
                transform: scale(0.9);
                left: 1%;
            }

            #p2{
                position: absolute;
                color: #164257;
                font-family: Inter;
                font-size: 5.3rem;
                font-style: normal;
                left: 50%; 
                transform: translateX(-50%);
                max-width: 90vw;
                top: 16%;
            }

            #desc{
                font-size: 3rem;
            }

            #info{
                margin-top: -1.25rem;
                margin-left: 0.2rem;
                color: #043A54; /* Cor do texto dos produtos */
                font-family: 'Inter'; /*Fonte do texto*/
                font-size: 2rem;
            }

            #data{
                margin-top: -3%;
                color: #757575;
                margin-left: 39rem;
                font-size: 1.7rem;
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
                <!--<form class="d-flex" role="search">
                    <input class="form-control" id="barra" type="search" placeholder="Digite um produto" aria-label="Search">
                    <button class="btn" id="btn" type="submit"><img src="imagens/iconPesquisar.png" alt="pesquisar" id="icon"></button>

                    <select id="select" name="filtros">
                        <option value="default" disabled selected>Filtrar por:</option>
                        <option value="ordenarPorNome">Ordenar por Nome</option>
                    </select>
                    <button class="botao-imagem" id="btn" type="submit"><img src="imagens/iconSeta.png" alt="filtrar" id="icon_1"></button>
                </form>-->

                <p id="p2">Checagem</p>

                <?php
                date_default_timezone_set('America/Sao_Paulo');
                $con = mysqli_connect("localhost", "root", "", "bd_stocks");

                if (!$con) {
                    die("Erro na conexão: " . mysqli_connect_error());
                }

                // Executar consulta SQL para obter informações dos produtos
                $comandoSql = "SELECT p.id_produto, p.descricao, p.quantidade, p.fornecedor, p.unidade_medida, p.qtd_minimo, l.nome_loja, e.data_hora
                            FROM tb_produto p
                            JOIN tb_loja l ON p.cod_loja = l.id_loja
                            LEFT JOIN tb_estoque e ON p.id_produto = e.cod_produto AND e.cod_loja = $id_loja
                            WHERE p.cod_loja = $id_loja";
                $resultado = mysqli_query($con, $comandoSql);

                $diferencaPorcentagem = 11.3;
                $i = 1;

                // Loop para exibir as informações dos produtos
                while ($dados = mysqli_fetch_assoc($resultado)) {
                    $id_pdt = $dados["id_produto"];
                    $descricao = $dados["descricao"];
                    $quantidade = number_format($dados["quantidade"], 1, ',', '.');
                    $fornecedor = $dados["fornecedor"];
                    $unidade_medida = $dados["unidade_medida"];
                    $qtd_minimo = number_format($dados["qtd_minimo"], 1, ',', '.');
                    $nome_loja = $dados["nome_loja"];
                    $minima = $dados["qtd_minimo"];
                    $qtd = $minima + 5;
                    $data_hora = $dados["data_hora"];
                    $data_hora_formatada = date("d-m-Y H:i:s", strtotime($data_hora));

                    // Criação da linha no início das informações do produto
                    $posicaoLinhas = 26 + ($i - 1) * $diferencaPorcentagem;
                    // echo '<hr class="linhas" id="linha' . $i . '" style="top: ' . $posicaoLinhas . '%;">';

                    // Exibição das informações do produto
                    echo '<div class="produto-info" style="top: ' . $posicaoLinhas . '%;">';
                    echo "<p id='desc'> $descricao </p><p id='info'>";
                    echo "Loja: $nome_loja <br>";
                    if ($dados["quantidade"] < $minima) {
                        echo "Disponível: <b><span style='color: #FF0000;'>" . $quantidade . " " . $dados["unidade_medida"] . "</span></b>";
                        echo "&nbsp&nbsp&nbsp<img src='imagens/iconAtencao.png' alt='Ícone Atencao' style='margin-top: -0.2rem;'> <br>";
                    } else if ($dados["quantidade"] >= $qtd_minimo && $dados["quantidade"] <= $qtd) {
                        echo "Disponível: <span style='color: #FF4500;'>" . $quantidade . " " . $dados["unidade_medida"] . " , próximo ao mínimo!!" . "</span><br>";
                    } else {
                        echo "Disponível: " . $quantidade . " " . $dados["unidade_medida"] . "<br>";
                    }    
                    echo "-Mínimo: $qtd_minimo $unidade_medida<br>";
                    echo "<p id='data'><i>Checado em $data_hora_formatada</i></p>";
                    echo '</div>';
        
                    // Criação da linha no final das informações do produto
                    $posicaoLinhas += $diferencaPorcentagem;
                    echo '<hr class="linhas" id="linha' . ($i + 1) . '" style="top: ' . $posicaoLinhas . '%;">';

                    $i++; // Incrementando o contador
                    $posicaoBtn = 24.7 + ($i - 1) * $diferencaPorcentagem;

                    echo "<a href='frm_checagem.php?id_loja=$id_loja&id_pdt=$id_pdt&id=$id'><button type='button' class='butn btn1' style='top: $posicaoBtn%;'><p class='pa' id='p1'><b>Verificar</b></p></button></a>";
                }
                ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
</html>
