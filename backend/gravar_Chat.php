<?php

include 'conexao.php';

$nome     = $_POST['nome'];
$mensagem = $_POST['mensagem'];

if ($_POST) {
  $sql = "INSERT INTO chat (nome, mensagem) VALUES ('$nome', '$mensagem')";
}

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
  header('location:../index.php');
} else {
  echo "Erro: " . mysqli_error($conexao);
}