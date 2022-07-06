<?php

include "conexao.php";

$sql = "DELETE FROM usuarios WHERE id_usuario = $_GET[cod]";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
  header('location:../Frontend/listar_usuario.php');
} else {
  echo "Erro: " . mysqli_error($conexao);
}