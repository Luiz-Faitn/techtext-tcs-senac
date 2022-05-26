<?php
    include 'conexao.php';

    $sql = "SELECT c.idContato, c.email, c.telefone, cli.nome_fantasia 
            FROM contato c
            JOIN cliente cli
            ON cli.idCliente = c.idCliente
            ORDER BY idContato";

    $resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Lista de Contato</h2>

    <a href="formContato.php">Cadastro de Contato</a><br><br>

    <table border="1">
        <tr>
            <td>Código</td>
            <td>Email</td>
            <td>Telefone</td>
            <td>Cliente</td>
            <td></td>
        </tr>

    <?php
        while($linha = mysqli_fetch_array($resultado)){
              echo "<tr>";
              echo "<td>$linha[idContato]</td>";
              echo "<td>$linha[email]</td>";
              echo "<td>$linha[telefone]</td>";
              echo "<td>$linha[nome_fantasia]</td>";

              echo "<td>";
              echo "<a href='formContato.php?cod=$linha[idContato]'><img src='editar.png' width=20/>";
              echo "</td>";

              echo "<td>";
              echo "<a href='excluirContato.php?cod=$linha[idContato]'><img src='deletar.png' width=20/>";
              echo "</td>";

              echo "</tr>";
        }
    ?>
    </table>
</body>
</html>