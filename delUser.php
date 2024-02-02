<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Exclusão do Usuário</title>
  </head>
      <body>
      <?php require "conexao.php" ?>
        <div class="container">
                  <?php
                      $id=$_GET["id"];
                      $id_loja = $_GET['id_loja'];
                      $id_usuario = $_GET["id_usuario"];
                      $nome_usuario = $_GET["nome_usuario"];
                  ?>
                  <script>
                      var resultado = window.confirm("Deseja desativar <?php echo $nome_usuario; ?>?");
                      
                      if (resultado == true) {
                        window.location.href = "excluiUser.php?id=<?php echo $id; ?>&id_loja=<?php echo $id_loja; ?>&id_usuario=<?php echo $id_usuario; ?>";
                      } else {
                        window.location.href = "telaUsuario.php?id=<?php echo $id; ?>&id_loja=<?php echo $id_loja; ?>&id_usuario=<?php echo $id_usuario; ?>";
                      }
                  </script>
        </div>
            <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      </body>
</html>