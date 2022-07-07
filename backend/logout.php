<?php
session_start();
if (isset($_SESSION['id_unico'])) {
  include_once "conexao.php";
  $logout_id = mysqli_real_escape_string($conexao, $_GET['logout_id']);

  if (isset($logout_id)) {
    $status = "Inativo";

    $sql = mysqli_query($conexao, "UPDATE usuarios SET status = '{$status}'");
    if ($sql) {
      session_unset();
      session_destroy();
      header("location: ../Frontend/index.php");
    }
  } else {
    header("location:../Frontend/novo_produto.php");
  }
} else {
  header("location: ../Frontend/index.php");
}