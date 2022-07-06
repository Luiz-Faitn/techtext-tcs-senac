<?php

//Conexão com o banco para aparecer o idCliente no cadastro. 
include "../backend/conexao.php";

$sqlCliente = "SELECT idCliente, nome_fantasia FROM cliente ORDER BY nome_fantasia";

$resultadoCliente = mysqli_query($conexao, $sqlCliente);

//Conexão com o banco para pegar o cliente que será editado.
if (isset($_GET)) {
  $sql = "SELECT idPedido, data_Cadastro, idCliente, dataEntrega 
          FROM pedido
          WHERE idPedido = $_GET[cod]";

  $resultado = mysqli_query($conexao, $sql);

  $pedido = mysqli_fetch_array($resultado);

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
  <title>Editar Pedido</title>
  <link rel="stylesheet" href="../CSS/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
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
          <h1 class="cadastro__h1">Edição de Pedidos</h1>

          <!-- Edição de Pedidos -->
          <form method="post" action="../backend/gravar_Pedido.php" class="cadastro__form">

            <div class="editar__form_item editar__form_item-large">
              <?php
              if ($_GET) {
                echo "<label class='editar__form_item_label'>Código</label>";
                echo "<input type='text' name='cod' readonly='readonly' value='$_GET[cod]' />";
              }
              ?>
            </div>
            <br>

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">Data do Cadastro</label>
              <input type="date" name="data_Cadastro" id="data_Cadastro" value="<?php echo $pedido['data_Cadastro'] ?>"
                required />
            </div>
            <br>

            <div class="cadastro__form_select">
              <label class="cadastro__form_item_label">Cliente</label>
              <select name="cliente" class="select" id="select">
                <option selected disabled>Selecione</option>
                <?php
                while ($cliente = mysqli_fetch_array($resultadoCliente)) {

                  if ($cliente['idCliente'] == $pedido['idCliente']) {
                    echo "<option value='$cliente[idCliente]' selected='selected'>";
                  } else {
                    echo "<option value='$cliente[idCliente]'>";
                  }

                  echo $cliente['nome_fantasia'];
                  echo "</option>";
                }
                ?>
              </select>
            </div>
            <br>

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">Data de Entrega</label>
              <input type="date" name="dataEntrega" id="dataEntrega" value="<?php echo $pedido['dataEntrega'] ?>"
                required />
            </div>

            <div class="cadastro__form_button_container">
              <button type="submit" name="submit_cliente" class="cadastro__form_button cadastro__form_button-submit">
                Cadastrar
              </button>
              <button type="reset" class="editar__form_button editar__form_button-reset"
                onclick="window.location='listar_pedido.php';">
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