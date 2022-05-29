<?php
    include "conexao.php";

    $pedido = $_POST['pedido'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    if($_POST['cod']){
        $sql = "UPDATE itens_pedido
                SET idPedido=$pedido, idProduto=$produto, quantidade=$quantidade
                WHERE iditens_pedido = $_POST[cod]";
    }else{
        $sql = "INSERT INTO itens_pedido (idPedido, idProduto, quantidade) 
                VALUES ($pedido, $produto, $quantidade)";
    }

    if(!mysqli_query($conexao, $sql)){
       die("Erro: " . mysqli_error($conexao));
    }else{
       header("location: listaItensPedido.php");
    }