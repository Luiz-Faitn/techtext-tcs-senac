<?php
include 'conexao.php';

if ($_GET['cod']) {
    $sql = "SELECT iditens_pedido, idPedido, idProduto, quantidade
               FROM itens_pedido
               WHERE iditens_pedido = $_GET[cod]";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        die("Erro: " . mysqli_error($conexao));
    } else {
        $itens_pedido = mysqli_fetch_array($resultado);
    }
}

$sqlPedido = "SELECT idPedido, data_Cadastro, idCliente, dataEntrega
                  FROM pedido
                  ORDER BY idPedido";

$sqlProduto = "SELECT idProduto, modelo, tipoTecido, tipoForro, obesrvacao, descricaoBotao, 
                          descricaoRibite, placa, quantidadeBotao, quantidadeRibite, quantidadePlaca, 
                          tamanho, tamanhoCintura, tamanhoQuadril, tamanhoGanchoTraseiro,
                          tamanhoComprimentoPernaLateral, tamanhoComprimentoFrentePerna, 
                          tamanhoLaguraPerna 
                   FROM produto 
                   ORDER BY idProduto";

$resultadoPedido = mysqli_query($conexao, $sqlPedido);
$resultadoProduto = mysqli_query($conexao, $sqlProduto);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
</head>

<body>
  <form method="post" action="gravaItensPedido.php">
    <h2>Cadastro Itens Pedido</h2>

    <?php
        if ($_GET['cod']) {
            echo "Código: <br>";
            echo "<input readonly='readonly' type='text' name='cod' value='$_GET[cod]'/><br><br>";
        }
        ?>

    Pedido: <br>
    <select name="pedido">
      <option>Selecione</option>

      <?php
            while ($resultado = mysqli_fetch_array($resultadoPedido)) {

                if ($resultado['idPedido'] == $itens_pedido['idPedido']) {
                    echo "<option value='$resultado[idPedido]' selected='selected'>";
                } else {
                    echo "<option value='$resultado[idPedido]'>";
                }

                echo $resultado['idPedido'];
                echo "</option>";
            }
            ?>
    </select>
    <br><br>

    Produto: <br>
    <select name="produto">
      <option>Selecione</option>

      <?php
            while ($resultado = mysqli_fetch_array($resultadoProduto)) {

                if ($resultado['idProduto'] == $itens_pedido['idProduto']) {
                    echo "<option value='$resultado[idProduto]' selected='selected'>";
                } else {
                    echo "<option value='$resultado[idProduto]'>";
                }

                echo $resultado['idProduto'];
                echo "</option>";
            }
            ?>
    </select>
    <br><br>

    Quantidade: <br>
    <input type="number" name="quantidade" value="<?php echo $itens_pedido['quantidade'] ?>">
    <br><br>

    <input type="submit" value="Cadastrar">
  </form>
</body>

</html>