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
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adicionar Cliente</title>
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
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-file-contract"></i>Relatórios<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_relatorio.php" class="sub-item">Novo relatório</a>
              </div>
            </div>
          </div>
        </div>

        <div class="cadastro">
          <h1 class="cadastro__h1">Cadastro de Relatórios</h1>

          <!-- Cadastro de Relatórios -->
          <form method="post" action="../backend/gravar_Itens_Pedido.php" class="cadastro__form">

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

                  echo $resultado['idProduto'];
                  echo "</option>";
                }
                ?>
              </select>
            </div>

            <div class="cadastro__form_item cadastro__form_item-large">
              <label class="cadastro__form_item_label">Quantidade</label>
              <input type="number" name="quantidade" placeholder="Quantidade" id="quantidade" required
                maxlength="100" />
            </div>

            <div class="cadastro__form_button_container">
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
        </script>
      </div>
    </div>
  </main>
</body>

</html>