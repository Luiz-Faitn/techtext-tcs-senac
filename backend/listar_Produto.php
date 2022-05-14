<?php
    include 'conexao.php';
    $sql = "SELECT idProduto, modelo, tipoTecido, tipoForro, obesrvacao, descricaoBotao, descricaoRibite, placa,
    quantidadeBotao, quantidadeRibite, quantidadePlaca, tamanho, tamanhoCintura, tamanhoQuadril, tamanhoGanchoTraseiro,
    tamanhoComprimentoPernaLateral, tamanhoComprimentoFrentePerna, tamanhoLaguraPerna from produto ORDER BY idProduto DESC";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado == false) {
        die("Erro: ".mysqli_error($conexao));
    }
?>
<!DOCTYPE html>
<meta charset="utf-8" />
<html lang="pt-br">
<body>

    <h2>Lista Produto</h2>

    <a href="formProduto.php">Cadastrar Produto</a><br /><br />

    <table border="1">
        <tr>
            <td>Código</td>
            <td>Modelo</td>
            <td>tipo de Tecido</td>
            <td>Tipo de Forro</td>
            <td>Observacao</td>
            <td>Descrição do Botao</td>
            <td>Descricao do Ribite</td>
            <td>Descricao da Placa</td>
            <td>Quantidade de Botao</td>
            <td>Quantidade de Ribite</td>
            <td>quantida de Placa</td>
            <td>Tamanho</td>
            <td>Tamanho da Cintura</td>
            <td>Tamanho do Quadril</td>
            <td>Tamanho Gancho Traseiro</td>
            <td>Tamanho Comprimento Perna Lateral</td>
            <td>Tamanho Comprimento Frente Perna</td>
            <td>Tamanho Largura Perna</td>
        </tr>

    <?php
        while($item = mysqli_fetch_array($resultado)) {
            echo "<tr>";
            echo "<td>$item[idProduto]</td>";
            echo "<td>$item[modelo]</td>";
            echo "<td>$item[tipoTecido]</td>";
            echo "<td>$item[tipoForro]</td>";
            echo "<td>$item[obesrvacao]</td>";
            echo "<td>$item[descricaoBotao]</td>";
            echo "<td>$item[descricaoRibite]</td>";
            echo "<td>$item[placa]</td>";
            echo "<td>$item[quantidadeBotao]</td>";
            echo "<td>$item[quantidadeRibite]</td>";
            echo "<td>$item[quantidadePlaca]</td>";
            echo "<td>$item[tamanho]</td>";
            echo "<td>$item[tamanhoCintura]</td>";
            echo "<td>$item[tamanhoQuadril]</td>";
            echo "<td>$item[tamanhoGanchoTraseiro]</td>";
            echo "<td>$item[tamanhoComprimentoPernaLateral]</td>";
            echo "<td>$item[tamanhoComprimentoFrentePerna]</td>";
            echo "<td>$item[tamanhoLaguraPerna]</td>";
            echo "<td> <a href='formProduto.php?cod=$item[idProduto]'><img src='edit.png' width='20' />";
            echo "<td> <a href='excluirProduto.php?cod=$item[idProduto]'><img src='deletar.png' width='20' />";
            echo "</tr>";
        }
    ?>
</table>
</body>
</html>