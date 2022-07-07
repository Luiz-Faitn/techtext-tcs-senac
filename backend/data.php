<?php
while ($row = mysqli_fetch_assoc($sql)) {
  $sql2 = "SELECT *
           FROM mensagens
           WHERE (incoming_msg_id = {$row['id_unico']}
           OR outgoing_msg_id = {$row['id_unico']}) AND (outgoing_msg_id = {$outgoing_id}
           OR incoming_msg_id = {$outgoing_id}) 
           ORDER BY id_msg DESC LIMIT 1";
  $query2 = mysqli_query($conexao, $sql2);
  $row2 = mysqli_fetch_assoc($query2);

  (mysqli_num_rows($query2) > 0) ? $resultado = $row2['msg'] : $resultado = "Sem mensagens disponíveis";
  (strlen($resultado) > 28) ? $msg = substr($resultado, 0, 28) . '...' : $msg = $resultado;
  if (isset($row2['outgoing_msg_id'])) {
    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Você: " : $you = "";
  } else {
    $you = "";
  }
  ($row['status'] == "Inativo") ? $offline = "offline" : $offline = "";
  ($outgoing_id == $row['id_unico']) ? $hid_me = "hide" : $hid_me = "";

  $output .= '<a href="../Frontend/chat_area.php?id_usuario=' . $row['id_unico'] . '">
              <div class="content">
              <img src="..\imgs\icons/' . $row["img"] . '" alt="">
              <div class="detalhes">
                <span>' . $row['nome'] . '</span>
                <p>' . $you . $msg . '</p>
              </div>
              </div>
              <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
              </a>';
}