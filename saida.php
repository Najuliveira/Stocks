<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Saída</title>
  </head> 
      <body>
        <div class="container">
        <?php
        date_default_timezone_set('America/Sao_Paulo');
        $id_loja = $_GET['id_loja'];
        $id = $_GET['id'];
        $id_pdt = $_GET['id_pdt'];

            $con = mysqli_connect("localhost", "root", "", "bd_stocks");
            if (!$con) {
                die("Erro na conexão: " . mysqli_connect_error());
            }
            require "conexao.php";

            // Pegando os dados vindos do formulário e armazenando em variáveis
            $id_produto=$_POST["id_produto"];
            $quantidade=$_POST['quantidade'];
            $qtd_minimo=$_POST["qtd_minimo"];
            $digitado=$_POST["digitado"];
            $data_hora=date('Y-m-d H:i:s');
            $qtd_entrada=$quantidade - $digitado;

            // Criando o comando SQL para atualização do 1º registro
            $comandoSql = "UPDATE tb_produto
                          SET quantidade = $qtd_entrada
                          WHERE id_produto = $id_pdt";
            $resultado = mysqli_query($con, $comandoSql);

            // Comando SQL para atualização do 2° registro
            if ($resultado == true) {
              $comandoSqlEstoque = "UPDATE tb_estoque
                                    SET quantidade = $qtd_entrada, data_hora = '$data_hora'
                                    WHERE cod_produto = $id_pdt";
              $resultadoEstoque = mysqli_query($con, $comandoSqlEstoque);
              
              if ($resultadoEstoque == true) {
                echo '<script>alert("Checagem feita!!"); window.location.href = "telaChecagem.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
              } else {
                  die("Erro na checagem estoque." . mysqli_error($con));
              }
          } else {
              echo '<script>alert("Erro na checagem produto"); window.location.href = "frm_checagem.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
          }
    ?>
      </div>
        <!-- JavaScript (Opcional) -->
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      </body>
</html>