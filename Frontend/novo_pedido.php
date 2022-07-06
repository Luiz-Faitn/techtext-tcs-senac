<?php

//Conexão com o banco para aparecer o idCliente no cadastro. 
include "../backend/conexao.php";

$sqlCliente = "SELECT idCliente, nome_fantasia FROM cliente ORDER BY nome_fantasia";

$resultadoCliente = mysqli_query($conexao, $sqlCliente);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adicionar Pedido</title>
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
          <h1 class="cadastro__h1">Cadastro de Pedidos</h1>

          <!-- Cadastro de Pedidos -->
          <form method="post" action="../backend/gravar_Pedido.php" class="cadastro__form">

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">Data do Cadastro</label>
              <input type="date" name="data_Cadastro" id="data_Cadastro" required />
            </div>

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

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">Data de Entrega</label>
              <input type="date" name="dataEntrega" id="dataEntrega" required />
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