<?php
    include 'conexao.php';

    $id = $_GET['cod'];

    $sql = "DELETE FROM itens_pedido WHERE iditens_pedido = $id";

    if(!mysqli_query($conexao, $sql)){
       die("Erro: " . mysqli_error($conexao));
    }else{
       header("location: listaItensPedido.php");
    }