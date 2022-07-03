<?php
    include "conexao.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];

    if($_POST['cod']){
        $sql = "UPDATE usuario 
                SET email='$email', senha='$senha', nivel='$nivel'
                WHERE idUsuario = $_POST[cod]";
     }else{
        $sql = "INSERT INTO usuario(email, senha) VALUES ('$email', '$senha')";
     }    

    if(!mysqli_query($conexao, $sql)){
        die("Erro: " . mysqli_error($conexao));
    }else{
        header("Location: formLoginUsuario.php");
    }