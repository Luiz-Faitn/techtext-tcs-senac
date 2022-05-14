<?php
    include "conexao.php";

    $sql = "SELECT idCliente, razao_social, nome_fantasia, marca FROM cliente ORDER BY idCliente DESC";
    $resultado = mysqli_query($conexao, $sql);
    if (!$resultado) {
        echo "ERRO: " . mysqli_error($conexao);
    }
?>

<!DOCTYPE html>
<html lang="pt_br">
<body>
    <h2>Lista de Clientes</h2>

    <a href="form_Cliente.php">Cadastrar Cliente</a><br /><br />

    <table border="1">
        <tr>
            <td>Código</td>
            <td>Razão Social</td>
            <td>Nome Fantasia</td>
            <td>Marca</td>
            <td></td>
            <td></td>
        </tr>

<?php
    while ($linha = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        echo "<td>$linha[idCliente]</td>";
        echo "<td>$linha[razao_social]</td>";
        echo "<td>$linha[nome_fantasia]</td>";
        echo "<td>$linha[marca]</td>";

        echo "<td>";
        
        echo "<a href='form_Cliente.php?cod=$linha[idCliente]'>";
        echo "<img src='edit.png' width='25' />";
        echo "</a>";

        echo "<td>";

        echo "<a href='excluir_Cliente.php?cod=$linha[idCliente]'>";
        echo "<img src='deletar.png' width='20' />";
        echo "</a>";

        echo "</td>";
        echo "</tr>";
    }

?>
    </table>
</body>
</html>