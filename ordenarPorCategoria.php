<?php
$id_loja = $_GET['id_loja'];
$con = mysqli_connect("localhost", "root", "", "bd_stocks");

if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
}

$comandoSql = "SELECT p.id_produto, p.descricao, p.quantidade, p.fornecedor, p.unidade_medida, p.qtd_minimo, c.nome_categoria, l.nome_loja
FROM tb_produto p
INNER JOIN tb_categoria c ON p.cod_categoria = c.id_categoria
INNER JOIN tb_loja l ON p.cod_loja = l.id_loja
WHERE p.cod_loja = $id_loja
ORDER BY c.nome_categoria ASC;";

$resultado = mysqli_query($con, $comandoSql);

$produtos = array();

while ($dados = mysqli_fetch_assoc($resultado)) {
    $produtos[] = $dados;
}

echo json_encode($produtos);
?>
