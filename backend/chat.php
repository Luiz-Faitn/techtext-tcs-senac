<?php

include "conexao.php";

$sql = "SELECT nome, mensagem FROM chat";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
  echo 'ERRO: ' . mysqli_error($conexao);
}