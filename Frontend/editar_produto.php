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

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Produto</title>
  <link rel="stylesheet" href="../CSS/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <main>
    <div class="background-image">
      <div class="background-image_gradient">

        <!-- Sidebar -->
        <div class="sidebar">
          <div class="menu">
            <div class="item"><a href="../index.php">TECTEXT</a></div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-bag-shopping"></i>Produtos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_produto.php" class="sub-item">Novo Produto</a>
                <a href="listar_produto.php" class="sub-item">Lista de Produtos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-people-group"></i>Clientes<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_cliente.php" class="sub-item">Novo Cliente</a>
                <a href="listar_cliente.php" class="sub-item">Lista de Clientes</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-list"></i>Pedidos<i class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_pedido.php" class="sub-item">Novo Pedido</a>
                <a href="listar_pedido.php" class="sub-item">Lista de Pedidos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-address-book"></i>Contatos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_contato.php" class="sub-item">Novo Contato</a>
                <a href="listar_contato.php" class="sub-item">Lista de Contatos</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Edição de produtos -->
        <div class="cadastro_produto">
          <h1 class="cadastro__h1">Edição de Produtos</h1>
          <form method="post" action="../backend/gravar_Produto.php" class="cadastro__form_produto">

            <div class="editar__form_item editar__form_item-large">
              <?php
                if ($_GET) {
                echo "<label class='editar__form_item_label'>Código</label>";
                echo "<input type='text' name='cod' readonly='readonly' value='$_GET[cod]' />";
                }
              ?>
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Modelo</label>
              <input type="text" name="modelo" placeholder="Modelo" id="modelo" required maxlength="200"
                value="<?php echo $produto['modelo'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Tipo de Tecido</label>
              <input type="text" name="tipoTecido" placeholder="Tipo de Tecido" id="tipoTecido" required maxlength="300"
                value="<?php echo $produto['tipoTecido'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Tipo de Forro</label>
              <input type="text" name="tipoForro" placeholder="Tipo de Forro" id="tipoForro" required maxlength="300"
                value="<?php echo $produto['tipoForro'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Observação</label>
              <textarea class="field" name="obesrvacao" placeholder="Obervação..." id="obesrvacao"></textarea>
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Descrição do Botão</label>
              <textarea class="field" name="descricaoBotao" placeholder="Descrição do Botão..."
                id="descricaoBotao"> </textarea>
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Descrição do Ribite</label>
              <textarea class="field" name="descricaoRibite" placeholder="Descrição do Ribite..."
                id="descricaoRibite"></textarea>
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Descrição da Placa</label>
              <input type="text" name="placa" placeholder="Descrição da Placa..." id="placa"
                value="<?php echo $produto['placa'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Quantidade do Botão</label>
              <input type="number" name="quantidadeBotao" placeholder="Quantidade do Botão" id="quantidadeBotao"
                value="<?php echo $produto['quantidadeBotao'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Quantidade do Ribite</label>
              <input type="number" name="quantidadeRibite" placeholder="Quantidade do Ribite" id="quantidadeRibite"
                value="<?php echo $produto['quantidadeRibite'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Quantidade da Placa</label>
              <input type="number" name="quantidadePlaca" placeholder="Quantidade do Placa" id="quantidadePlaca"
                value="<?php echo $produto['quantidadePlaca'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Tamanho</label>
              <input type="number" name="tamanho" placeholder="Tamanho" id="tamanho"
                value="<?php echo $produto['tamanho'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Tamanho da Cintura</label>
              <input type="number" name="tamanhoCintura" placeholder="Tamanho da Cintura" id="tamanhoCintura"
                value="<?php echo $produto['tamanhoCintura'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Tamanho do Quadril</label>
              <input type="number" name="tamanhoQuadril" placeholder="Tamanho do Quadril" id="tamanhoQuadril"
                value="<?php echo $produto['tamanhoQuadril'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Tamanho do Grancho Traseiro</label>
              <input type="number" name="tamanhoGanchoTraseiro" placeholder="Tamanho do Gancho Traseiro"
                id="tamanhoGanchoTraseiro" value="<?php echo $produto['tamanhoGanchoTraseiro'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Comprimento da Perna Lateral</label>
              <input type="number" name="tamanhoComprimentoPernaLateral" placeholder="Comprimento da Perna Lateral"
                id="tamanhoComprimentoPernaLateral" value="<?php echo $produto['tamanhoComprimentoPernaLateral'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Comprimento Frente da Perna</label>
              <input type="number" name="tamanhoComprimentoFrentePerna" placeholder="Comprimento Frente da Perna"
                id="tamanhoComprimentoFrentePerna" value="<?php echo $produto['tamanhoComprimentoFrentePerna'] ?>" />
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Tamanho da Largura da Perna</label>
              <input type="number" name="tamanhoLaguraPerna" placeholder="Tamanho da Largura da Perna"
                id="tamanho_largura_pernatamanhoLaguraPerna" value="<?php echo $produto['tamanhoLaguraPerna'] ?>" />
            </div>

            <div class=" cadastro__form_button_container">
              <button type="submit" name="submit_cliente" class="cadastro__form_button cadastro__form_button-submit">
                Cadastrar
              </button>
              <button type="reset" class="cadastro__form_button cadastro__form_button-reset">
                Cancelar
              </button>
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

        //Populando os TextArea.
        document.getElementById(`obesrvacao`).innerHTML = "<?php echo $produto['obesrvacao'] ?>";
        document.getElementById(`descricaoBotao`).innerHTML = "<?php echo $produto['descricaoBotao'] ?>";
        document.getElementById(`descricaoRibite`).innerHTML = "<?php echo $produto['descricaoRibite'] ?>";
        document.getElementById(`descricaoRibite`).innerHTML = "<?php echo $produto['descricaoRibite'] ?>";
        </script>
      </div>
    </div>
  </main>
</body>

</html>