<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Relatório</title>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
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
                    left: 31%;
                    max-width: 90vw;
                    margin-top: 23rem;
                    width: 29%;
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
                    transform: translateY(3px);
                    box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.25);
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

                .produto-info {
                    position: absolute;
                    margin-top: 2rem;
                    margin-left: 0.6rem;
                    color: #043A54; 
                    font-family: 'Inter'; 
                    font-style: light;
                    font-size: 2.1rem;
                }

                .produto-info-select {
                    position: relative; /* Alterando para relative para que o margin-bottom funcione corretamente */
                    margin-top: 0.5rem;
                    margin-left: 0.1rem;
                    color: #043A54;
                    font-family: 'Inter';
                    font-style: light;
                    font-size: 2.1rem;
                    margin-bottom: 10px; /* Adicionando espaço embaixo dos elementos com esta classe */
                }

                #cat{
                    margin-top: 1.8rem;
                    font-size: 2.4rem;
                    margin-left: -0.1rem;
                }

                .btn-voltar {
                    position: fixed;
                    top: 11rem;
                    transform: scale(0.8);
                    left: 1%;
                }

                #select {
                    position: absolute;
                    width: 2.9rem;
                    height: 2.33rem;
                    left: 108.5%;
                    transform: translateX(-50%); /* alinhando a caixa de select toda ao centro */
                    top: -0.68rem;
                    border: none;
                    font-size: 1rem;
                    font-family: Inter;
                    background-color: #FFFFFF;
                    appearance: none; /*removendo qualquer estilo de aparência padrão*/
                    background-image: url('imagens/iconSeta.png'); /* Imagem de fundo */
                    background-position: right 1rem center; /* Ta colocando o ícone a direita com 1x de distancia se alinhando ao centro */
                    background-repeat: no-repeat; /* Para não ficar repetindo o ícone, pq ele dá problemas */
                }
            
                #p4{
                    margin-top: -0.1rem;
                    margin-left: 0.1rem;
                    color: #043A54; 
                    font-family: 'Inter'; 
                    font-style: light;
                    font-size: 3rem;
                }

                #info{
                    margin-top: -1.2rem;
                    margin-left: 0.2rem;
                    color: #043A54; 
                    font-family: 'Inter';
                    font-size: 2rem;
                }

                #data{
                    margin-top: -10%;
                    color: #757575;
                    margin-left: 39rem;
                    font-size: 1.7rem;
                }
            </style>
</head>
        <body>
        <?php require "menu.php"?>
        <div>
            <div id="buscas">
            <div class="d-flex" role="search">
            <input class="form-control" id="barra" type="search" placeholder=" Digite um produto" >
            <button onclick="searchData()" class="btn" id="btn"><img src="imagens/iconPesquisar.png" alt="pesquisar" id="icon"></button> 
            </div>
            <?php
                $id_loja = $_GET['id_loja'];
                $con = mysqli_connect("localhost", "root", "", "bd_stocks");

                if (!$con) {
                    die("Erro na conexão: " . mysqli_connect_error());
                }

                if(!empty($_GET['search'])){
                    $data = $_GET['search'];
                    $comandoSql = "SELECT p.id_produto, p.cod_categoria, p.cod_loja, p.descricao, p.quantidade, p.fornecedor, p.unidade_medida, p.qtd_minimo, c.nome_categoria, c.id_categoria, l.nome_loja, e.data_hora, u.nome_usuario
                                FROM tb_produto p
                                INNER JOIN tb_categoria c on p.cod_categoria = c.id_categoria
                                INNER JOIN tb_loja l on p.cod_loja = l.id_loja
                                LEFT JOIN tb_estoque e on p.id_produto = e.cod_produto
                                LEFT JOIN tb_usuario u on e.cod_usuario = u.id_usuario
                                WHERE p.cod_loja = '$id_loja' AND descricao LIKE '%$data%' ORDER BY descricao";
                }else{
                    // Executar consulta SQL para obter informações dos produtos
                    $comandoSql = "SELECT p.id_produto, p.cod_categoria, p.cod_loja, p.descricao, p.quantidade, p.fornecedor, p.unidade_medida, p.qtd_minimo, c.nome_categoria, c.id_categoria, l.nome_loja, e.data_hora, u.nome_usuario
                                FROM tb_produto p
                                INNER JOIN tb_categoria c on p.cod_categoria = c.id_categoria
                                INNER JOIN tb_loja l on p.cod_loja = l.id_loja
                                LEFT JOIN tb_estoque e on p.id_produto = e.cod_produto
                                LEFT JOIN tb_usuario u on e.cod_usuario = u.id_usuario
                                WHERE p.cod_loja = '$id_loja'";
                }
                
                $resultado = mysqli_query($con, $comandoSql);

                $diferencaPorcentagem = 17.5;
                $i = 1;

                // Loop para exibir as informações dos produtos
                while ($dados = mysqli_fetch_assoc($resultado)) {
                    $id = $dados["id_produto"];
                    $descricao = $dados["descricao"];
                    $quantidade = number_format($dados["quantidade"], 1, ',', '.');
                    $categoria = $dados["nome_categoria"];
                    $fornecedor = $dados["fornecedor"];
                    $unidade_medida = $dados["unidade_medida"];
                    $qtd_minimo = number_format($dados["qtd_minimo"], 1, ',', '.');
                    $nome_loja = $dados["nome_loja"];
                    $minima = $dados["qtd_minimo"];
                    $qtd = $minima + 5;
                    $data_hora = $dados["data_hora"];
                    $data_hora_formatada = date("d-m-Y H:i:s", strtotime($data_hora));
                    $nome_usuario = $dados["nome_usuario"];

                    // Criação da linha no início das informações do produto
                    $posicaoLinhas = 31 + ($i - 1) * $diferencaPorcentagem;
                    echo '<hr class="linhas linha-padrao" id="linha' . $i . '" style="top: ' . $posicaoLinhas . '%;">';

                    // Exibição das informações do produto
                    echo '<div class="produto-info" style="top: ' . $posicaoLinhas . '%;">';
                    echo "<p id='p4'> $descricao </p><p id='info'>";
                    echo "Categoria: $categoria <br>";
                    echo "Loja: $nome_loja <br>";
                    if ($dados["quantidade"] < $qtd_minimo) {
                        echo "Disponível: <b><span style='color: #FF0000;'>" . $quantidade . " " . $dados["unidade_medida"] . "</span></b>";
                        echo "&nbsp&nbsp&nbsp<img src='imagens/iconAtencao.png' alt='Ícone Atencao' style='margin-top: -0.5rem;'> <br>";
                    } else if ($dados["quantidade"] >= $qtd_minimo && $dados["quantidade"] <= $qtd) {
                        echo "Disponível: <span style='color: #FF4500;'>" . $quantidade . " " . $dados["unidade_medida"] . " , próximo ao mínimo!!!" . "</span><br>";
                    } else {
                        echo "Disponível: " . $quantidade . " " . $dados["unidade_medida"] . "<br>";
                    }    
                    echo "-Minímo: $qtd_minimo $unidade_medida <br>";    
                    echo "Fornecedor: $fornecedor <br>";
                    echo "Checado por: $nome_usuario <br>";
                    echo "<p id='data'><i>Checado em $data_hora_formatada</i></p>";
                    echo '</div>';

                    // Criação da linha no final das informações do produto
                    $posicaoLinhas += $diferencaPorcentagem;
                    echo '<hr class="linhas linha-padrao" id="linha' . ($i + 1) . '" style="top: ' . $posicaoLinhas . '%;">';

                    $i++; // Incrementando o contador
                }
                ?>
                
                <form class="d-flex" role="search">
                    <select id="select" name="filtros">
                        <option value="default" selected selected style="display:none;"></option>
                        <option value="ordenarPorFalta">Produtos em Falta</option>
                        <option value="ordenarPorNome">Ordenar por Nome</option>
                        <option value="ordenarPorFornecedor">Ordenar por Fornecedor</option>
                        <option value="ordenarPorCategoria">Ordenar por Categoria</option>
                    </select>
                </form>
                
                <a href="#" class="btn-voltar" onclick="history.back()"> <img src="imagens/iconVoltar.png" alt="voltar" id="icon"></a>
            
            </div>
        </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                let diferencaPorcentagem = 13;
                document.addEventListener("DOMContentLoaded", function () {
                    const selectFiltros = document.querySelector('select[name="filtros"]');
                    const produtosContainers = document.querySelectorAll('.produto-info');

                    selectFiltros.addEventListener('change', function () {
                        const selectedOption = selectFiltros.value;

                        // Oculta as linhas padrões
                        const linhasPadrao = document.querySelectorAll('.linha-padrao');
                                    linhasPadrao.forEach(function (linha) {
                                        linha.style.display = 'none';
                                    });

                        if (selectedOption == 'default') {

                        } else if (selectedOption == 'ordenarPorNome') {
                            // Código para ordenar por nome
                            $.ajax({
                                url: 'ordenarPorNome.php',
                                type: 'GET',
                                data: { id_loja: <?php echo $id_loja; ?> }, // Passa o id_loja como parâmetro
                                dataType: 'json',
                                success: function (data) {
                                    produtosContainers.forEach(function (element, index) {
                                        if (data[index]) {
                                            const descricao = data[index].descricao;
                                            const quantidade = parseFloat(data[index].quantidade).toFixed(1).replace(".", ",");
                                            const fornecedor = data[index].fornecedor;
                                            const unidade_medida = data[index].unidade_medida;
                                            const qtd_minimo = data[index].qtd_minimo;
                                            const nome_loja = data[index].nome_loja;

                                            const produtoInfo = document.createElement('div');
                                            produtoInfo.className = 'produto-info-select';

                                            // Verificando se a quantidade é menor que a quantidade mínima ou igual
                                            if (data[index].quantidade < data[index].qtd_minimo) {
                                                produtoInfo.innerHTML = `
                                                    ${descricao} <br>
                                                    Disponível: <b><span style="color: red;">${quantidade} ${unidade_medida}</span></b>
                                                    <img src="imagens/iconAtencao.png" alt="Ícone Atencao" style="margin-top: -0.5rem;"><br>
                                                    Loja: ${nome_loja} <br>
                                                    Fornecedor: ${fornecedor} <br>
                                                `;
                                            } else if (data[index].quantidade == data[index].qtd_minimo) {
                                                produtoInfo.innerHTML = `
                                                    ${descricao} <br>
                                                    Disponível: <span style="color: #FF4500;">${quantidade} ${unidade_medida} , no limite</span><br>
                                                    Loja: ${nome_loja} <br>
                                                    Fornecedor: ${fornecedor} <br>
                                                `;
                                            } else {
                                                produtoInfo.innerHTML = `
                                                    ${descricao} <br>
                                                    Disponível: ${quantidade} ${unidade_medida}<br>
                                                    Loja: ${nome_loja} <br>
                                                    Fornecedor: ${fornecedor} <br>
                                                `;
                                            }

                                            // Substituindo o conteúdo do container pelo produtoInfo
                                            element.innerHTML = '';
                                            element.appendChild(produtoInfo);
                                        }
                                        else {
                                            element.innerHTML = ''; // Limpando o container se não houver dados
                                        }
                                    });
                                },
                                error: function () {
                                    console.log('Erro ao ordenar por nome.');
                                }
                            });

                        } else if (selectedOption == 'ordenarPorFornecedor') {
                            // Código para ordenar por fornecedor
                            $.ajax({
                                url: 'ordenarPorFornecedor.php',
                                type: 'GET',
                                data: { id_loja: <?php echo $id_loja; ?> }, // Passa o id_loja como parâmetro
                                dataType: 'json',
                                success: function (data) {
                                    produtosContainers.forEach(function (element, index) {
                                        if (data[index]) {
                                            const descricao = data[index].descricao;
                                            const fornecedor = data[index].fornecedor;
                                            const nome_loja = data[index].nome_loja;
                                            const nome_categoria = data[index].nome_categoria;

                                            const produtoInfo = document.createElement('div');
                                            produtoInfo.className = 'produto-info-select';

                                            produtoInfo.innerHTML = `
                                                    ${descricao} <br> 
                                                    Fornecedor: ${fornecedor} <br>
                                                    Loja: ${nome_loja} <br> 
                                                    Categoria: ${nome_categoria} <br> 
                                                    `;

                                            // Substituindo o conteúdo do container pelo produtoInfo
                                            element.innerHTML = '';
                                            element.appendChild(produtoInfo);
                                        }
                                        else {
                                            element.innerHTML = ''; // Limpando o container se não houver dados
                                        }
                                    });
                                },
                                error: function () {
                                    console.log('Erro ao ordenar por fornecedor.');
                                }
                            });

                        } else if (selectedOption == 'ordenarPorFalta') {
                            // Código para ordenar por falta
                            $.ajax({
                                url: 'ordenarPorFalta.php',
                                type: 'GET',
                                data: { id_loja: <?php echo $id_loja; ?> }, // Passa o id_loja como parâmetro
                                dataType: 'json',
                                success: function (data) {
                                    produtosContainers.forEach(function (element, index) {
                                        if (data[index]) {
                                            const descricao = data[index].descricao;
                                            const quantidade = parseFloat(data[index].quantidade).toFixed(1).replace(".", ",");
                                            const fornecedor = data[index].fornecedor;
                                            const unidade_medida = data[index].unidade_medida;
                                            const qtd_minimo = parseFloat(data[index].qtd_minimo).toFixed(1).replace(".", ",");
                                            const nome_loja = data[index].nome_loja;

                                            const produtoInfo = document.createElement('div');
                                            produtoInfo.className = 'produto-info-select';
                                            produtoInfo.innerHTML = `
                                                Descrição: ${descricao} <br>
                                                Quantidade: <b><span style="color: #FF0000;">${quantidade} ${unidade_medida}</span></b>
                                                <img src="imagens/iconAtencao.png" alt="Ícone Atencao" style="margin-top: -0.5rem;"><br>
                                                Quantidade Mínima: ${qtd_minimo} ${unidade_medida}<br>
                                                Loja: ${nome_loja} <br>
                                            `;

                                            // Substituindo o conteúdo do container pelo produtoInfo
                                            element.innerHTML = '';
                                            element.appendChild(produtoInfo);
                                        } else {
                                            element.innerHTML = ''; // Limpando o container se não houver dados
                                        }
                                    });
                                },
                                error: function () {
                                    console.log('Erro ao ordenar por falta.');
                                }
                            });
                            
                        } else if (selectedOption == 'ordenarPorCategoria') {
                            // Código para ordenar por categoria
                            $.ajax({
                                url: 'ordenarPorCategoria.php',
                                type: 'GET',
                                data: { id_loja: <?php echo $id_loja; ?> }, // Passa o id_loja como parâmetro
                                dataType: 'json',
                                success: function (data) {
                                    produtosContainers.forEach(function (element, index) {
                                        if (data[index]) {
                                            const descricao = data[index].descricao;
                                            const quantidade = parseFloat(data[index].quantidade).toFixed(1).replace(".", ",");
                                            const unidade_medida = data[index].unidade_medida;
                                            const qtd_minimo = data[index].qtd_minimo;
                                            const nome_categoria = data[index].nome_categoria;
                                            const nome_loja = data[index].nome_loja;

                                            const produtoInfo = document.createElement('div');
                                            produtoInfo.className = 'produto-info-select';
                                            if (data[index].quantidade < data[index].qtd_minimo) {
                                                produtoInfo.innerHTML = `
                                                    ${descricao} <br>
                                                    Categoria: ${nome_categoria} <br>
                                                    <b><span style="color: red;">${quantidade} ${unidade_medida}</span></b>
                                                    <img src="imagens/iconAtencao.png" alt="Ícone Atencao" style="margin-top: -0.5rem;"><br>
                                                    Loja: ${nome_loja} <br>
                                                    `;
                                            } else if (data[index].quantidade == data[index].qtd_minimo) {
                                                produtoInfo.innerHTML = `
                                                    ${descricao} <br>
                                                    Categoria: ${nome_categoria} <br>
                                                    <span style="color: #FF4500;">${quantidade} ${unidade_medida} , no limite</span><br>
                                                    Loja: ${nome_loja} <br>
                                                    `;
                                            } else {
                                                produtoInfo.innerHTML = `
                                                    ${descricao} <br>
                                                    Categoria: ${nome_categoria} <br>
                                                    ${quantidade} ${unidade_medida} <br>
                                                    Loja: ${nome_loja} <br>
                                                    `;
                                            }

                                            // Substituindo o conteúdo do container pelo produtoInfo
                                            element.innerHTML = '';
                                            element.appendChild(produtoInfo);
                                        } else {
                                            element.innerHTML = ''; // Limpando o container se não houver dados
                                        }
                                    });
                                },
                                error: function () {
                                    console.log('Erro ao ordenar por categoria.');
                                }
                            });
                        }
                        positionProductsAndLines();
                        });
                        // Função para posicionar as linhas e produtos
                        function positionProductsAndLines() {
                            let i = 1;
                            produtosContainers.forEach(function (element) {
                                // Calculando a posição das linhas com base em diferencaPorcentagem
                                const posicaoLinhas = 31 + (i - 1) * diferencaPorcentagem;

                                // Definindo a posição das linhas
                                const linhaSuperior = document.createElement('hr');
                                linhaSuperior.className = 'linhas linha-padrao'; // Aplicar as classes necessárias
                                linhaSuperior.style.top = posicaoLinhas + '%';

                                // Adicionando a linha superior antes do elemento de informações do produto
                                element.parentElement.insertBefore(linhaSuperior, element);

                                // Calculando a posição das linhas no final
                                const posicaoLinhasFinal = posicaoLinhas + diferencaPorcentagem;
                                i++;

                                // Definindo a posição das linhas no final
                                const linhaInferior = document.createElement('hr');
                                linhaInferior.className = 'linhas linha-padrao'; // Aplicar as classes necessárias
                                linhaInferior.style.top = posicaoLinhasFinal + '%';

                                // Adicionando a linha inferior após o elemento de informações do produto
                                element.parentElement.insertBefore(linhaInferior, element.nextElementSibling);

                                // Ajustando a posição do elemento de informações do produto
                                element.style.top = posicaoLinhas + '%';
                            });
                        }
                });
                </script>
        </body>
                <script>
                    var search = document.getElementById('barra');

                    search.addEventListener("keydown", function(event){
                        if (event.key === "Enter"){
                            searchData();
                        }
                    });

                    function searchData(){
                        window.location = 'telaRelatorio.php?id_loja='+<?php echo $id_loja?>+'&id='+<?php echo $id?>+'&search='+search.value;
                    }
                </script>
</html>