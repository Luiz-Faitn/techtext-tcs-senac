<?php
    include 'conexao.php';

    $id = $_GET['cod'];

    $sql = "DELETE FROM contato WHERE idContato = $id";

    if(!mysqli_query($conexao, $sql)){
       die("Erro: " . mysqli_error($conexao));
    }else{
       header("location: listaContato.php");
    }