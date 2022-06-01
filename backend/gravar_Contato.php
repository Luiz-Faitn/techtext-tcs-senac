<?php

include 'conexao.php';

$email    = $_POST['email'];
$telefone = $_POST['telefone'];
$cliente  = $_POST['cliente'];

if ($_POST['cod']) {
   $sql = "UPDATE contato 
           SET email='$email', telefone='$telefone', idCliente=$cliente
           WHERE idContato = $_POST[cod]";
} else {
   $sql = "INSERT INTO contato (email, telefone, idCliente)
           VALUES ('$email', '$telefone', $cliente)";
}

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
   header('location:../Frontend/listar_contato.php');
} else {
   echo "Erro: " . mysqli_error($conexao);
}