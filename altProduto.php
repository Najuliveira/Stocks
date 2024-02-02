<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Altera produto</title>
  </head>
      <body>
          <div class="container">
          <?php
              $id_loja = $_GET['id_loja'];
              $id = $_GET['id'];

              $con = mysqli_connect("localhost", "root", "", "bd_stocks");
              if (!$con) {
                  die("Erro na conexão: " . mysqli_connect_error());
              }
              require "conexao.php";

              // Pegando os dados vindos do formulário e armazenando em variáveis
              $id_produto=$_POST["id_produto"];
              $descricao = $_POST["descricao"];
              $cod_categoria = $_POST["categoria"];
              $fornecedor = $_POST["fornecedor"];
              $unidade = $_POST["unidade"];
              $quant_min = $_POST["quant_min"];

              // Comando SQL para atualização do registro
              $comandoSql = "UPDATE tb_produto
                            SET descricao = '$descricao', cod_categoria = '$cod_categoria', fornecedor = '$fornecedor', unidade_medida = '$unidade', qtd_minimo = '$quant_min'
                            WHERE id_produto = $id_produto";
              $resultado = mysqli_query($con, $comandoSql);

              if ($resultado) {
                echo '<script>alert("Alterado com sucesso!!"); window.location.href = "telaProduto.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
              } else {
                  echo '<script>alert("Erro na alteração!!"); window.location.href = "frm_altera_Produto.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
                  echo "$sql";
              }
        
        ?>
        </div>
          <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      </body>
</html>