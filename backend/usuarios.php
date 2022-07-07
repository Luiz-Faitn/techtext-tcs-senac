<?php
session_start();
include_once "conexao.php";
$outgoing_id = $_SESSION['id_unico'];
$sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE NOT id_unico = {$outgoing_id}");
$output = "";

if (mysqli_num_rows($sql) == 1) {
  $output .= "Não existem usuários disponíveis para conversar";
} else if (mysqli_num_rows($sql) > 0) {
  include "data.php";
}
echo $output;