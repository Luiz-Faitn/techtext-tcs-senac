<?php
session_start();
include_once "conexao.php";
$outgoing_id = $_SESSION['id_unico'];
$searchTerm = mysqli_real_escape_string($conexao, $_POST['searchTerm']);
$output = "";

$sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE NOT id_unico = {$outgoing_id} AND nome LIKE '%{$searchTerm}%'");
if (mysqli_num_rows($sql) > 0) {
  include "data.php";
} else {
  $output .= "Nenhum usuário encontrado referente a sua busca";
}
echo $output;