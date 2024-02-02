<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Altera Usuário</title>
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
            $id_user=$_POST["id_user"];
            $nome = $_POST["nome"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            // Comando SQL para atualização do registro
            $comandoSql = "UPDATE tb_usuario
                          SET nome_usuario = '$nome', telefone = '$telefone', email = '$email', senha = '$senha'
                          WHERE id_usuario = $id_user";
            $resultado = mysqli_query($con, $comandoSql);

            if ($resultado) {
                echo '<script>alert("Usuário alterado!!"); window.location.href = "telaUsuario.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
            } else {
                echo '<script>alert("Erro na alteração!!"); window.location.href = "frm_altera_user.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
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