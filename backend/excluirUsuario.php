<?php
    include "conexao.php";

    $id = $_GET['cod'];

    $sql = "DELETE FROM usuario WHERE idUsuario = $id";

    if(!mysqli_query($conexao, $sql)){
        die("Erro: " . mysqli_error($conexao));
    }else{
        header("Location: ../Frontend/listar_usuario.php");
    }