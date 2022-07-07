<?php
session_start();
include_once "conexao.php";
$outgoing_id = $_SESSION['id_unico'];
$sql = "SELECT * FROM usuarios WHERE NOT id_unico = {$outgoing_id} ORDER BY id_usuario DESC";
$query = mysqli_query($conexao, $sql);
$output = "";

if (mysqli_num_rows($query) == 0) {
  $output .= "Não existem usuários disponíveis para conversar";
} else if (mysqli_num_rows($query) > 0) {
  include "data.php";
}
echo $output;