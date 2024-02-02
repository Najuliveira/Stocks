<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Exclusão do do usário</title>
</head>
        <body>
        <?php
            require "conexao.php";
            $id_loja = $_GET['id_loja'];
            $id=$_GET["id"];

            // Pegar o ID do usuário da URL
            $id_usuario = $_GET["id_usuario"];

            // Atualizando o status do usuário
            $comandoSqlAtualizarStatus = "UPDATE tb_usuario SET status = 1 WHERE id_usuario = $id_usuario";
            $resultadoAtualizacaoStatus = mysqli_query($con, $comandoSqlAtualizarStatus);

            if ($resultadoAtualizacaoStatus) {
                echo '<script>alert("Usuário desativado!!"); window.location.href = "telaUsuario.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
            } else {
                echo '<script>alert("Erro na desativação do usuário."); window.location.href = "telaUsuario.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
            }
        ?>
        </body>
</html>
