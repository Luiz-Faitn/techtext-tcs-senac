<?php

include 'conexao.php';

$sql = "DELETE FROM produto WHERE idProduto = $_GET[cod]";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    header('location:../Frontend/listar_produto.php');
} else {
    echo "Erro: " . mysqli_error($conexao);
}