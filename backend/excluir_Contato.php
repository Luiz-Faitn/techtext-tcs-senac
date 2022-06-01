<?php

include 'conexao.php';

$sql = "DELETE FROM contato WHERE idContato = $_GET[cod]";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
   header('location:../Frontend/listar_contato.php');
} else {
   echo "Erro: " . mysqli_error($conexao);
}