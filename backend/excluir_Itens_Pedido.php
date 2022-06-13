<?php

include 'conexao.php';

$sql = "DELETE FROM itens_pedido WHERE iditens_pedido = $_GET[cod]";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
   header('location:../Frontend/listar_relatorio.php');
} else {
   echo "Erro: " . mysqli_error($conexao);
}