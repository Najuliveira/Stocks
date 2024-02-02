<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
      <body>
      <?php 
        include "conexao.php";

          /* Id do usuario vindo pela url */
          if (isset($_GET["id"])) {
              $id = $_GET["id"];
                // Consulta SQL para obter os dados do usuário
                $comandoSql = "select email, tipo_usuario from tb_usuario where id_usuario='$id'";
                $resultado = $pdo->query($comandoSql);
                if ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $email = $linha["email"];
                    $tipo = $linha["tipo_usuario"];
            
                    // Iniciar a sessão e definir as variáveis de sessão
                    session_start();
                    $_SESSION["id_usuario"] = $id;
                    $_SESSION["email"] = $email;
                    $_SESSION["tipo"] = $tipo;
            
                    if ($_SESSION["tipo"] == 1) {
                        include "telaLoja.php";
                    } else {
                        // Verificando se o ID da loja é válido antes de redirecionar
                        $id_loja = obterIdLojaUsuario($pdo, $id);
                        if ($id_loja !== null) {
                            header("Location: telaChecagem.php?id_loja=$id_loja&id={$_SESSION['id_usuario']}");
                        } else {
                            echo "Erro: ID de loja não encontrado.";
                        }
                    }
                    } else {
                      echo '<script>alert("Usuário não encontrado!"); window.location.href = "index.php";</script>';
                    }
        } else {
            echo "Erro: ID não foi passado pela URL.";
        }
  
        // Função para obter o ID da loja do usuário
        function obterIdLojaUsuario($pdo, $id_usuario) {
            $comandoSql = "SELECT cod_loja FROM tb_usuario_loja WHERE cod_usuario = $id_usuario";
            $resultado = $pdo->query($comandoSql);
                if ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    return $linha["cod_loja"];
                }
          return null;
        }
    ?>
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      </body>
      </body>
</html>






