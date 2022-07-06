<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
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
          <h1 class="cadastro__h1">Cadastro de Usuários</h1>

          <!-- Cadastro de Usuários -->
          <form method="post" action="../backend/gravarUsuario.php" class="cadastro__form">

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">E-mail</label>
              <input type="email" name="email" placeholder="E-mail" id="email" required
                maxlength="100" />
            </div>
            <br>

            <div class="input-cadastro">
              <label class="cadastro__form_item_label">Senha</label>
              <input type="password" name="senha" placeholder="Senha" id="senha" required 
                maxlength="15" />
            </div>
            <br>

            <div class="cadastro__form_select">
              <label class="cadastro__form_item_label">Acesso</label>
              <select name="acesso" class="select" id="select">
                <option selected disabled>Selecione</option>
                <option>Administrador</option>
                <option>Produção</option>
              </select>
            </div>
            <br>

            <div class="cadastro__form_button_container">
              <button type="submit" name="submit_usuario" 
                      class="cadastro__form_button cadastro__form_button-submit">
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