<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../Frontend/index.php');
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
            <div class="usuario">
              <?php include_once "../backend/logado.php"; ?>
              <h1 class="cadastro__h1">Cadastro de Usuários</h1>


              <!-- Cadastro de Cliente -->
              <form method="post" action="../backend/gravar_Usuario.php" class="cadastro__form_usuario"
                enctype="multipart/form-data">

                <div class="cadastro__form_item_erro"></div>

                <div class="input-cadastro">
                  <label class="cadastro__form_item_label">Nome de Usuário</label>
                  <input type="text" name="nome" placeholder="Nome de Usuário..." id="nome" required maxlength="255" />
                </div>

                <div class="input-cadastro">
                  <label class="cadastro__form_item_label">Email do Usuário</label>
                  <input type="text" name="email" placeholder="Email do Usuário..." id="email" required
                    maxlength="255" />
                </div>

                <div class="input-cadastro">
                  <label class="cadastro__form_item_label">Senha</label>
                  <input type="password" name="senha" placeholder="Senha..." id="senha" required maxlength="255" />
                  <i class="fas fa-eye"></i>
                </div>

                <div class="input-cadastro">
                  <label class="cadastro__form_item_label">Confirmar Senha</label>
                  <input type="password" name="senha_confirmar" placeholder="Confirmar Senha..." id="senha" required
                    maxlength="255" />
                  <i class="fas fa-eye"></i>
                </div>

                <div class="cadastro__form_select">
                  <label class="cadastro__form_item_label">Tipo de Usuário</label>
                  <select name="tipo" class="select" id="select" required>
                    <option name="tipo" id="tipo" value='Funcionário' selected>Selecione</option>
                    <option name="tipo" id="tipo" value='Administrador'>Administrador</option>
                    <option name="tipo" id="tipo" value='Funcionário'>Funcionário</option>
                  </select>
                </div>

                <div class="input-cadastro_img">
                  <label class="cadastro__form_item_label">Imagem de Usuário</label>
                  <input type="file" name="img" id="img" accept="image/x-png,image/gif,image/jpeg,image/jpg" required />
                </div>

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
        </div>
        </section>
      </div>

      <script src="../javascript/signup.js"></script>
      <script src="../javascript/senha-register.js"></script>

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