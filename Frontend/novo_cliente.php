<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adicionar Cliente</title>
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
          <h1 class="cadastro__h1">Cadastro de Clientes</h1>

          <!-- Cadastro de Cliente -->
          <form method="post" action="../backend/gravar_Cliente.php" class="cadastro__form">

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">Razão Social</label>
              <input type="text" name="razao_social" placeholder="Razão Social" id="razao_social" required
                maxlength="150" />
            </div>

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">Nome</label>
              <input type="text" name="nome_fantasia" placeholder="Nome" id="nome_fantasia" required maxlength="100" />
            </div>

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">Marca</label>
              <input type="text" name="marca" placeholder="Marca" id="marca" required maxlength="100" />
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