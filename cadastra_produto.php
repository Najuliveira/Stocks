<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Carregando apenas o Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Cadastro de produto</title>
  </head>
      <body>
        <div class="container">
            <?php
              $id_loja = $_GET['id_loja'];
              $id = $_GET['id'];

              $mensagem = "";
              $con = mysqli_connect("localhost", "root", "", "bd_stocks");
              require "conexao.php";

              // Pegando os dados vindos do formulário e armazenando em variáveis
              $descricao = $_POST["descricao"];
              $categoria = $_POST["categoria"];
              $fornecedor = $_POST["fornecedor"];
              $unidade = $_POST["unidade"];
              $quant_min = $_POST["quant_min"];

              // Inserindo novo produto na tabela tb_produto
              $quantidade_pdt = 0; // quantidade inicial
              $comandoSql = "INSERT INTO tb_produto (descricao, cod_categoria, cod_loja, fornecedor, unidade_medida, qtd_minimo, quantidade) VALUES ('$descricao', '$categoria', '$id_loja', '$fornecedor', '$unidade', '$quant_min', '$quantidade_pdt')";
              $resultado = mysqli_query($con, $comandoSql);

              if ($resultado == true) {
                  // Pegando o ID do produto recém-inserido
                  $id_produto = mysqli_insert_id($con);

                  // Insirindo um novo registro na tabela tb_estoque
                  $quantidade_est = 0; // quantidade inicial
                  $comandoSqlEstoque = "INSERT INTO tb_estoque (cod_produto, cod_loja, cod_usuario, quantidade, data_hora) VALUES ('$id_produto', '$id_loja', '1', '$quantidade_est', NOW())";
                  $resultadoEstoque = mysqli_query($con, $comandoSqlEstoque);

                  if ($resultadoEstoque == true) {
                      echo '<script>alert("Produto cadastrado com sucesso!"); window.location.href = "telaProduto.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
                  } else {
                      die("Erro no cadastro na tabela tb_estoque: " . mysqli_error($con));
                  }
              } else {
                  echo '<script>alert("Erro no cadastro do produto"); window.location.href = "cadProduto.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
              }
            ?>
        </div>
            <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>   
      </body>
</html>
