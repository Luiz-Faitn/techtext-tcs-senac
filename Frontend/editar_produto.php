<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../Frontend/index.php');
}
?>

<?php
include "../backend/conexao.php";

//Conexão com o banco para pegar o produto que será editado.
if (isset($_GET)) {
  $sql = "SELECT modelo, tipoTecido, tipoForro, obesrvacao, descricaoBotao, descricaoRibite, placa, quantidadeBotao, quantidadeRibite,
    quantidadePlaca, tamanho, tamanhoCintura, tamanhoQuadril, tamanhoGanchoTraseiro, tamanhoComprimentoPernaLateral, tamanhoComprimentoFrentePerna,
    tamanhoLaguraPerna
    FROM produto WHERE idProduto = $_GET[cod]";

  $resultado = mysqli_query($conexao, $sql);

  $produto = mysqli_fetch_array($resultado);

  if (!$resultado) {
    echo "Erro: " . mysqli_error($conexao);
  }
}
?>

<?php include_once "../backend/header.php"; ?>

<body>
  <main>
    <div class="background-image">
      <div class="background-image_gradient">

        <?php include_once "../backend/menu.php"; ?>
        <div class="wrapper_usuario">
          <section class="former signup">
            <div class="produto">
              <?php include_once "../backend/logado.php"; ?>
              <h1 class="cadastro__h1">Edição de Produtos</h1>
              <form method="post" action="../backend/gravar_Produto.php" class="cadastro__form_produto">

                <div class="row">
                  <div class="input-cadastro_produto">
                    <?php
                    if ($_GET) {
                      echo "<label class='editar__form_item_label'>Código</label>";
                      echo "<input type='text' name='cod' readonly='readonly' value='$_GET[cod]' />";
                    }
                    ?>
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Modelo</label>
                    <input type="text" name="modelo" placeholder="Modelo" id="modelo" required maxlength="200"
                      value="<?php echo $produto['modelo'] ?>" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tipo de Tecido</label>
                    <input type="text" name="tipoTecido" placeholder="Tipo de Tecido" id="tipoTecido" required
                      maxlength="300" value="<?php echo $produto['tipoTecido'] ?>" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tipo de Forro</label>
                    <input type="text" name="tipoForro" placeholder="Tipo de Forro" id="tipoForro" required
                      maxlength="300" value="<?php echo $produto['tipoForro'] ?>" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Observação</label>
                    <input type="text" name="obesrvacao" placeholder="Obervação..." id="obesrvacao"
                      value="<?php echo $produto['obesrvacao'] ?>" maxlength="25" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Descrição do Botão</label>
                    <input type="text" name="descricaoBotao" placeholder="Descrição do Botão..." id="descricaoBotao"
                      value="<?php echo $produto['descricaoBotao'] ?>" maxlength="25" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Descrição do Ribite</label>
                    <input type="text" name="descricaoRibite" placeholder="Descrição do Ribite..." id="descricaoRibite"
                      value="<?php echo $produto['descricaoRibite'] ?>" maxlength="25" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Descrição da Placa</label>
                    <input type="text" name="placa" placeholder="Descrição da Placa..." id="placa"
                      value="<?php echo $produto['placa'] ?>" maxlength="25" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Quantidade do Botão</label>
                    <input type="number" name="quantidadeBotao" placeholder="Quantidade do Botão" id="quantidadeBotao"
                      value="<?php echo $produto['quantidadeBotao'] ?>" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Quantidade do Ribite</label>
                    <input type="number" name="quantidadeRibite" placeholder="Quantidade do Ribite"
                      id="quantidadeRibite" value="<?php echo $produto['quantidadeRibite'] ?>" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Quantidade da Placa</label>
                    <input type="number" name="quantidadePlaca" placeholder="Quantidade do Placa" id="quantidadePlaca"
                      value="<?php echo $produto['quantidadePlaca'] ?>" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho</label>
                    <input type="number" name="tamanho" placeholder="Tamanho em cm" id="tamanho"
                      value="<?php echo $produto['tamanho'] ?>" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho da Cintura</label>
                    <input type="number" name="tamanhoCintura" placeholder="Tamanho da Cintura em cm"
                      id="tamanhoCintura" value="<?php echo $produto['tamanhoCintura'] ?>" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho do Quadril</label>
                    <input type="number" name="tamanhoQuadril" placeholder="Tamanho do Quadril" id="tamanhoQuadril"
                      value="<?php echo $produto['tamanhoQuadril'] ?>" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho do Grancho Traseiro</label>
                    <input type="number" name="tamanhoGanchoTraseiro" placeholder="Tamanho do Gancho Traseiro"
                      id="tamanhoGanchoTraseiro" value="<?php echo $produto['tamanhoGanchoTraseiro'] ?>" />
                  </div>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Comprimento da Perna Lateral</label>
                    <input type="number" name="tamanhoComprimentoPernaLateral"
                      placeholder="Comprimento da Perna Lateral" id="tamanhoComprimentoPernaLateral"
                      value="<?php echo $produto['tamanhoComprimentoPernaLateral'] ?>" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Comprimento Frente da Perna</label>
                    <input type="number" name="tamanhoComprimentoFrentePerna" placeholder="Comprimento Frente da Perna"
                      id="tamanhoComprimentoFrentePerna"
                      value="<?php echo $produto['tamanhoComprimentoFrentePerna'] ?>" />
                  </div>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho da Largura da Perna</label>
                    <input type="number" name="tamanhoLaguraPerna" placeholder="Tamanho da Largura da Perna"
                      id="tamanho_largura_pernatamanhoLaguraPerna"
                      value="<?php echo $produto['tamanhoLaguraPerna'] ?>" />
                  </div>
                </div>
                </br>

                <div class="container">
                  <div class="field button">
                    <input type="submit" value="Cadastrar">
                  </div>
                  <div class="field button_reset">
                    <a href=""><input type="submit" value="Cancelar"></a>
                  </div>
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