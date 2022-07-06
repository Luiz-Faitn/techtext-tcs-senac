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
  <title>Adicionar Relatório</title>
  <link rel="stylesheet" href="../CSS/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <main>
    <div>
        <?php
            include "../backend/verifica.php";
            include "../menu.php";
        ?>
    </div>
    <div class="background-image">
      <div class="background-image_gradient">

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
      </div>
    </div>
  </main>
</body>

</html>