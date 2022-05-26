<?php

include "conexao.php";

$dataCadastro = $_POST['data_Cadastro'];
$cliente      = $_POST['cliente'];
$dataEntrega  = $_POST['dataEntrega'];

if ($_POST['cod']) {
    $sql = "UPDATE pedido
            SET data_Cadastro='$dataCadastro', idCliente=$cliente, dataEntrega='$dataEntrega'
            WHERE idPedido   = $_POST[cod]";
} else {
    $sql = "INSERT INTO pedido(data_Cadastro, idCliente, dataEntrega) 
            VALUES ('$dataCadastro', $cliente, '$dataEntrega')";
}   

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    header('location:../Frontend/listar_pedido.php');
}else{
    echo "Erro: " . mysqli_error($conexao);
}