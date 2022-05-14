<?php

include "conexao.php"; 

$sql = "DELETE FROM cliente WHERE idcliente = $_GET[cod]";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    header("location: listar_cliente.php");
} else {
    echo "Erro: " . mysqli_error($conexao);
}