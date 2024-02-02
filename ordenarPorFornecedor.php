<?php
$id_loja = $_GET['id_loja'];
$con = mysqli_connect("localhost", "root", "", "bd_stocks");

if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
}

$comandoSql = "SELECT tp.id_produto, tp.cod_loja, tp.descricao, tp.quantidade, tp.fornecedor, tp.unidade_medida, tp.qtd_minimo, tl.nome_loja, tc.nome_categoria
FROM tb_produto tp
JOIN tb_loja tl ON tp.cod_loja = tl.id_loja
JOIN tb_categoria tc ON tp.cod_categoria = tc.id_categoria
WHERE tp.cod_loja = $id_loja
ORDER BY tp.fornecedor ASC";

$resultado = mysqli_query($con, $comandoSql);

$produtos = array();

while ($dados = mysqli_fetch_assoc($resultado)) {
    $produtos[] = $dados;
}

echo json_encode($produtos);
?>