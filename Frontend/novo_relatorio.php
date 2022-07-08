<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../Frontend/index.php');
}
?>

<?php

//Conexão com o banco. 
include "../backend/conexao.php";

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

$resultadoPedido  = mysqli_query($conexao, $sqlPedido);
$resultadoProduto = mysqli_query($conexao, $sqlProduto);

?>

<?php include_once "../backend/header.php"; ?>

<body>
  <main>

    <div class="background-image">
      <div class="background-image_gradient">

        <?php include_once "../backend/menu.php"; ?>
        <div class="wrapper_usuario">
          <section class="former signup">
            <div class="usuario">
              <?php include_once "../backend/logado.php"; ?>
              <h1 class="cadastro__h1">Cadastro de Relatórios</h1>

              <!-- Cadastro de Relatórios -->
              <form method="post" action="../backend/gravar_Itens_Pedido.php" class="relatorio__form">

                <div class="cadastro__form_select">
                  <label class="cadastro__form_item_label">Pedido</label>
                  <select class="select" name="pedido">
                    <option selected disabled>Selecione</option>

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
                </div>

                <div class="cadastro__form_select">
                  <label class="cadastro__form_item_label">Produto</label>
                  <select class="select" name="produto">
                    <option selected disabled>Selecione</option>

                    <?php
                    while ($resultado = mysqli_fetch_array($resultadoProduto)) {

                      if ($resultado['idProduto'] == $itens_pedido['idProduto']) {
                        echo "<option value='$resultado[idProduto]' selected='selected'>";
                      } else {
                        echo "<option value='$resultado[idProduto]'>";
                      }

                      echo $resultado['modelo'];
                      echo "</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="input-cadastro">
                  <label class="cadastro__form_item_label">Quantidade</label>
                  <input type="number" name="quantidade" placeholder="Quantidade" id="quantidade" required
                    maxlength="100" />
                </div>

                <div class="container">
                  <div class="field button">
                    <input type="submit" value="Cadastrar">
                  </div>
                  <div class="field button_reset">
                    <input type="reset" value="Cancelar">
                  </div>
                </div>

              </form>
            </div>

            <script type="text/javascript">
            $(document).ready(function() {
              //jquery para ativar sub-menus.
              $('.sub-btn').click(function() {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
              });
            });
            </script>
        </div>
      </div>
  </main>
</body>

</html>