<?php
session_start();
if (isset($_SESSION['id_unico'])) {
  include_once "conexao.php";
  $outgoing_id = $_SESSION['id_unico'];
  $incoming_id = mysqli_real_escape_string($conexao, $_POST['incoming_id']);
  $messsage = mysqli_real_escape_string($conexao, $_POST['message']);

  if (!empty($messsage)) {
    $sql = mysqli_query($conexao, "INSERT INTO mensagens (incoming_msg_id, outgoing_msg_id, msg)
                                   VALUES ({$incoming_id}, {$outgoing_id}, '{$messsage}')") or die();
  }
} else {
  header("location: ../Frontend/index.php");
}