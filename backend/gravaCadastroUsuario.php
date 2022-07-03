<?php
    include "conexao.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuario(email, senha) VALUES ('$email', '$senha')";

    if(!mysqli_query($conexao, $sql)){
        die("Erro: " . mysqli_error($conexao));
    }else{
        header("Location: formLoginUsuario.php");
    }