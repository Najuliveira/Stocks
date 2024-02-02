<?php
  $con=mysqli_connect("localhost","root","","bd_stocks");

    //definindo local, banco, usuario e senha usando PDO
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=bd_stocks', 'root', '');

        //definindo o atributo ao pdo onde todos os erros gerados devem ser tratados como exceção
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Conexao ok";
        
    } catch(PDOException $u) {
      // echo "Erro na conexao: " . $e->getMessage();
    }
?>

