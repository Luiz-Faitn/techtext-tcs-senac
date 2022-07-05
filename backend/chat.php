<?php
include "conxao.php";

$sql = "SELECT nome, mensagem FROM chat";

foreach($sql->fetchAll() as $Key) {
  echo "<h3>".$Key['nome']."</h3>";
  echo "<p>".$Key['mensagem']."</p>";
}
 
$resultado = mysqli_query($conexao, $sql);

      if ($resultado) {   
          header('../chatForm.php'.$sql);
      } else {
          echo "Erro: " . mysqli_error($conexao);
      }

?>