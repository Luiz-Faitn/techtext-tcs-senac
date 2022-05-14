<?php
    include "conexao.php";
    if ($_GET) {
        $sql = "SELECT idProduto, modelo, tipoTecido, tipoForro, obesrvacao, descricaoBotao, descricaoRibite, placa,
        quantidadeBotao, quantidadeRibite, quantidadePlaca, tamanho, tamanhoCintura, tamanhoQuadril, tamanhoGanchoTraseiro,
        tamanhoComprimentoPernaLateral, tamanhoComprimentoFrentePerna, tamanhoLaguraPerna from produto WHERE idProduto = $_GET[cod]";
        $resultado = mysqli_query($conexao, $sql);
        $produto = mysqli_fetch_array($resultado);
        if (!$resultado) {
            die("Error: ".mysqli_error($conexao));
        }
        $op = "Editar";
    } else {
        $op = "Cadastrar";
    }
?>
<!DOCTYPE  html>
<meta charset="utf-8">
<html lang="pt-br">
<body>

    <h2>Cadastrar de Produto </h2>
    <a href="listarProduto.php">Lista de Produto</a><br /><br />
    <form method="post" action="gravarProduto.php">

    <?php
        if ($_GET) {
            echo "Código: <br>";
            echo "<input type='text' name='cod' readonly='readonly' value='$_GET[cod]'/> <br>";
        }
    ?>
    Modelo: <br>
    <input type="text" name="modelo" value="<?php echo $produto['modelo'] ?>"/><br>
    Tipo do tecido: <br>
    <input type="text" name="tipoTecido" value="<?php echo $produto['tipoTecido'] ?>"/><br>
    Tipo do forro: <br>
    <input type="text" name="tipoForro" value="<?php echo $produto['tipoForro'] ?>"/><br>
    Observação: <br>
    <input type="text" name="obesrvacao" value="<?php echo $produto['obesrvacao'] ?>"/><br>
    Descrição do botão: <br>
    <input type="text" name="descricaoBotao" value="<?php echo $produto['descricaoBotao'] ?>"/><br>
    Descrição do ribite: <br>
    <input type="text" name="descricaoRibite" value="<?php echo $produto['descricaoRibite'] ?>"/><br>
    Descrição da placa: <br>
    <input type="text" name="placa" value="<?php echo $produto['placa'] ?>"/><br>
    Quantidade do botão: <br>
    <input type="int" name="quantidadeBotao" value="<?php echo $produto['quantidadeBotao'] ?>"/><br>
    Quantidade do ribite: <br>
    <input type="int" name="quantidadeRibite" value="<?php echo $produto['quantidadeRibite'] ?>"/><br>
    Quantidade da placa: <br>
    <input type="int" name="quantidadePlaca" value="<?php echo $produto['quantidadePlaca'] ?>"/><br>
    Tamanho: <br>
    <input type="double" name="tamanho" value="<?php echo $produto['tamanho'] ?>"/><br>
    Tamanho da cintura: <br>
    <input type="double" name="tamanhoCintura" value="<?php echo $produto['tamanhoCintura'] ?>"/><br>
    Tamanho do quadril: <br>
    <input type="double" name="tamanhoQuadril" value="<?php echo $produto['tamanhoQuadril'] ?>"/><br>
    Tamanho do gancho traseiro: <br>
    <input type="double" name="tamanhoGanchoTraseiro" value="<?php echo $produto['tamanhoGanchoTraseiro'] ?>"/><br>
    Comprimento da perna ateral: <br>
    <input type="double" name="tamanhoComprimentoPernaLateral" value="<?php echo $produto['tamanhoComprimentoPernaLateral'] ?>"/><br>
    Comprimento frente perna: <br>
    <input type="double" name="tamanhoComprimentoFrentePerna" value="<?php echo $produto['tamanhoComprimentoFrentePerna'] ?>"/><br>
    Tamanho da largura da perna: <br>
    <input type="double" name="tamanhoLaguraPerna" value="<?php echo $produto['tamanhoLaguraPerna'] ?>"/><br><br>

    <input type="submit" value="<?php echo $op ?>"/>
</form>
</body>
</html>