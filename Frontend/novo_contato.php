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
  <title>Adicionar Contato</title>
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
          <h1 class="cadastro__h1">Cadastro de Contatos</h1>

          <!-- Cadastro de Contatos -->
          <form method="post" action="../backend/gravar_Contato.php" class="cadastro__form">

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
              <label class="cadastro__form_item_label">E-mail</label>
              <input type="email" name="email" placeholder="E-mail" id="email" required maxlength="150" />
            </div>

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">Telefone</label>
              <input type="text" name="telefone" placeholder="Telefone" id="telefone" required maxlength="100" />
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