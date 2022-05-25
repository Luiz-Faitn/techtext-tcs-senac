<?php
    include 'conexao.php';

    $sql = "SELECT p.idPedido, p.data_Cadastro, c.nome_fantasia, p.dataEntrega 
            FROM pedido p
            JOIN cliente c
            ON c.idCliente = p.idCliente
            ORDER BY nome_fantasia";

    $resultado = mysqli_query($conexao, $sql);

    if(!$resultado){
        die("Erro: " . mysqli_error($conexao));
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Lista de Pedidos</title>
</head>

<body>
  <h2>Lista de Pedidos</h2>

  <a href="formPedido.php">Cadastro</a><br><br>

  <table border="1">
    <tr>
      <td>Código</td>
      <td>Data de Cadastro</td>
      <td>Cliente</td>
      <td>Data de Entrega</td>
    </tr>

    <?php
        while($pedido = mysqli_fetch_array($resultado)){
              echo "<tr>";
              echo "<td>$pedido[idPedido]</td>";
              echo "<td>$pedido[data_Cadastro]</td>";
              echo "<td>$pedido[nome_fantasia]</td>";
              echo "<td>$pedido[dataEntrega]</td>";
              echo "<td>";
              echo "<a href='formPedido.php?cod=$pedido[idPedido]'><img src='editar.png' width=20/>";
              echo "</td>";
              echo "<td>";
              echo "<a href='excluirPedido.php?cod=$pedido[idPedido]'><img src='deletar.png' width=20/>";
              echo "</td>";
              echo "</tr>";
        }
    ?>
  </table>
</body>

</html>