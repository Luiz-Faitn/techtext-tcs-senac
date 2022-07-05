<?php
include "conexao.php";

$sql = "SELECT nome, mensagem FROM chat";
$resultado = mysqli_query($conexao, $sql);
foreach($resultado as $Key) {
  
  echo "<h3>".$Key['nome']."</h3>";
  echo "<p>".$Key['mensagem']."</p>";
}
 


      if ($resultado) {   
          header('../chatForm.php'.$sql);
      } else {
          echo "Erro: " . mysqli_error($conexao);
      }

?>