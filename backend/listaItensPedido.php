<?php
    include 'conexao.php';

    $sql = "SELECT i.iditens_pedido, i.idPedido, i.idProduto, i.quantidade
            FROM itens_pedido i
            LEFT JOIN pedido p
            ON p.idPedido = i.iditens_pedido
            LEFT JOIN produto pr
            ON pr.idProduto = i.iditens_pedido
            ORDER BY i.iditens_pedido";

    $resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Lista de Itens Pedido</h2>

    <a href="formItensPedido.php">Cadastro de Itens Pedido</a><br><br>

    <table border="1">
        <tr>
            <td>Código</td>
            <td>Pedido</td>
            <td>Produto</td>
            <td>Quantidade</td>
            <td></td>
        </tr>

    <?php
        while($linha = mysqli_fetch_array($resultado)){
              echo "<tr>";
              echo "<td>$linha[iditens_pedido]</td>";
              echo "<td>$linha[idPedido]</td>";
              echo "<td>$linha[idProduto]</td>";
              echo "<td>$linha[quantidade]</td>";

              echo "<td>";
              echo "<a href='formItensPedido.php?cod=$linha[iditens_pedido]'>
                        <img src='editar.png' width=20/>";
              echo "</td>";


              echo "<td>";
              echo "<a href='excluirItensPedido.php?cod=$linha[iditens_pedido]'>
                        <img src='deletar.png' width=20/>";
              echo "</td>";

              echo "</tr>";
        }
    ?>
    </table>
</body>
</html>