<?php
    include 'conexao.php';

    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cliente = $_POST['cliente'];

    if($_POST['cod']){
       $sql = "UPDATE contato 
               SET email='$email', telefone='$telefone', idCliente=$cliente
               WHERE idContato = $_POST[cod]";

    }else{
       $sql = "INSERT INTO contato (email, telefone, idCliente)
               VALUES ('$email', '$telefone', $cliente)";
    }

    if(!mysqli_query($conexao, $sql)){
       die("Erro: " . mysqli_error($conexao));
    }else{
       header("location: listaContato.php");
    }


    


