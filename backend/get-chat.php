<?php
session_start();
if (isset($_SESSION['id_unico'])) {
  include_once "conexao.php";
  $outgoing_id = $_SESSION['id_unico'];
  $incoming_id = mysqli_real_escape_string($conexao, $_POST['incoming_id']);
  $output = "";

  $sql = "SELECT * FROM mensagens
          LEFT JOIN usuarios ON usuarios.id_unico = mensagens.outgoing_msg_id
          WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
          OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY id_msg";

  $query = mysqli_query($conexao, $sql);

  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
      if ($row['outgoing_msg_id'] === $outgoing_id) {
        $output .= '<div class="chat outgoing">
                    <div class="detalhes">
                      <p>' . $row['msg'] . '</p>
                    </div>
                    </div>';
      } else {
        $output .= '<div class="chat incoming">
                    <img src="../imgs/icons/' . $row['img'] . '" alt="">
                    <div class="detalhes">
                      <p>' . $row['msg'] . '</p>
                    </div>
                    </div>';
      }
    }
  }
  echo $output;
} else {
  header("location: ../Frontend/index.php");
}