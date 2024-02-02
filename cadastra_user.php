<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro usuário</title>
    </head>
        <body>
            <?php
                    $id_loja = $_GET['id_loja'];
                    $id = $_GET['id'];

                    $con = mysqli_connect("localhost", "root", "", "bd_stocks");

                    // Pegando os dados vindos do formulário e armazenando em variáveis
                    $nome = $_POST["nome"];
                    $telefone = $_POST["telefone"];
                    $email = $_POST["email"];
                    $senha = $_POST["senha"];

                    // Verifique se o e-mail já existe no banco de dados
                    $verificarSql = "SELECT * FROM tb_usuario WHERE email = '$email'";
                    $resultadoVerificacao = mysqli_query($con, $verificarSql);

                    if (mysqli_num_rows($resultadoVerificacao) > 0) {
                        // Se o e-mail já está cadastrado, exibir uma mensagem de erro
                        echo '<script>alert("Este e-mail existente. Por gentileza, insira outro e-mail."); window.location.href = "cadUser.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
                    } else {
                        // Se o e-mail não está cadastrado, inserir o usuário no banco de dados
                        $comandoSql = "INSERT INTO tb_usuario (nome_usuario, telefone, email, senha) VALUES ('$nome', '$telefone', '$email', '$senha')";
                        $resultado = mysqli_query($con, $comandoSql);

                            if ($resultado == true) {
                                // Inserindo o registro na tabela tb_usuario_loja associando o usuário à loja
                                $comandoSqlLoja = "INSERT INTO tb_usuario_loja (cod_usuario, cod_loja) VALUES (LAST_INSERT_ID(), $id_loja)";
                                $resultadoLoja = mysqli_query($con, $comandoSqlLoja);

                                if ($resultadoLoja == true) {
                                    echo '<script>alert("Cadastrado com sucesso!!"); window.location.href = "telaUsuario.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
                                } else {
                                    echo '<script>alert("Erro no cadastro da associação com a loja"); window.location.href = "cadUser.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
                                }
                            } else {
                                echo '<script>alert("Erro no cadastro do usuário"); window.location.href = "cadUsuario.php?id_loja=' . $id_loja . '&id=' . $id . '";</script>';
                            }
                    }
            ?>
        </body>
</html>