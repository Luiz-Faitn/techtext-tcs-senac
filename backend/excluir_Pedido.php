<?php

include 'conexao.php';
    
$sql = "DELETE FROM pedido WHERE idPedido = $_GET[cod]";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    header('location:../listar_pedido.php');
} else {
    echo "Erro: " . mysqli_error($conexao);
}