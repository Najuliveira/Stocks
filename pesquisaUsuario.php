<?php
        include_once "conexao.php";

        // Recebendo os dados que foram digitados no formulário
        $usuario = filter_input(INPUT_POST, 'u', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 's', FILTER_SANITIZE_SPECIAL_CHARS);

        // Consulta SQL com a verificação de status
        $comandoSql = "SELECT * FROM tb_usuario WHERE email='$usuario' AND senha='$senha' AND status = 0";

        $resultado = $pdo->query($comandoSql);
        if ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
            // Verificando o status do usuário
            if ($linha['status'] == 0) {
                // Permitindo o acesso
                echo $linha['id_usuario'];
            } else {
                // Não permitindo o acesso
                echo "Usuário inativo. Entre em contato com o suporte.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
?>