<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../index.php');
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

              <h1 class="cadastro__h1">Cadastro de Produtos</h1>

              <!-- Cadastro de produtos -->
              <form method="post" action="../backend/gravar_Produto.php" class="cadastro__form_produto">

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Modelo</label>
                    <input type="text" name="modelo" placeholder="Modelo" id="modelo" required maxlength="200" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tipo de Tecido</label>
                    <input type="text" name="tipoTecido" placeholder="Tipo de Tecido" id="tipoTecido" required
                      maxlength="300" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tipo de Forro</label>
                    <input type="text" name="tipoForro" placeholder="Tipo de Forro" id="tipoForro" required
                      maxlength="300" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Observação</label>
                    <input type="text" name="obesrvacao" placeholder="Observação..." id="obesrvacao" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Descrição do Botão</label>
                    <input type="text" name="descricaoBotao" placeholder="Descrição do Botão.." id="descricaoBotao" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Descrição do Ribite</label>
                    <input type="text" name="descricaoRibite" placeholder="Descrição do Ribite..."
                      id="descricaoRibite" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Descrição da Placa</label>
                    <input type="text" name="placa" placeholder="Descrição da Placa..." id="placa" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Quantidade do Botão</label>
                    <input type="number" name="quantidadeBotao" placeholder="Quantidade do Botão"
                      id="quantidadeBotao" />
                  </div>
                </div>


                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Quantidade do Ribite</label>
                    <input type="number" name="quantidadeRibite" placeholder="Quantidade do Ribite"
                      id="quantidadeRibite" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Quantidade da Placa</label>
                    <input type="number" name="quantidadePlaca" placeholder="Quantidade do Placa"
                      id="quantidadePlaca" />
                  </div>
                </div>


                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho</label>
                    <input type="number" name="tamanho" placeholder="Tamanho (cm)" id="tamanho" />
                  </div>
                  <br><br>

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho da Cintura</label>
                    <input type="number" name="tamanhoCintura" placeholder="Tamanho da Cintura (cm)"
                      id="tamanhoCintura" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho do Quadril</label>
                    <input type="number" name="tamanhoQuadril" placeholder="Tamanho do Quadril (cm)"
                      id="tamanhoQuadril" />
                  </div>
                  <!-- <br><br> -->

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho do Grancho Traseiro</label>
                    <input type="number" name="tamanhoGanchoTraseiro" placeholder="Tamanho do Gancho Traseiro (cm)"
                      id="tamanhoGanchoTraseiro" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Comprimento da Perna Lateral</label>
                    <input type="number" name="tamanhoComprimentoPernaLateral"
                      placeholder="Comprimento da Perna Lateral (cm)" id="tamanhoComprimentoPernaLateral" />
                  </div>
                  <!-- <br><br> -->

                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Comprimento Frente da Perna</label>
                    <input type="number" name="tamanhoComprimentoFrentePerna"
                      placeholder="Comprimento Frente da Perna (cm)" id="tamanhoComprimentoFrentePerna" />
                  </div>
                </div>

                <div class="row">
                  <div class="input-cadastro_produto">
                    <label class="cadastro__form_item_label">Tamanho da Largura da Perna</label>
                    <input type="number" name="tamanhoLaguraPerna" placeholder="Tamanho da Largura da Perna (cm)"
                      id="tamanho_largura_pernatamanhoLaguraPerna" />
                  </div>
                </div>
                </br>

                <div class="container">
                  <div class="field button">
                    <input type="submit" value="Cadastrar">
                  </div>
                  <div class="field button_reset">
                    <input type="reset" value="Cancelar">
                  </div>
                </div>
            </div>
            </form>

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