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
            <div class="cliente">
              <?php include_once "../backend/logado.php"; ?>
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
                  <input type="text" name="nome_fantasia" placeholder="Nome" id="nome_fantasia" required
                    maxlength="100" />
                </div>

                <div class="input-cadastro">
                  <label class="cadastro__form_item_label">Marca</label>
                  <input type="text" name="marca" placeholder="Marca" id="marca" required maxlength="100" />
                </div>

                <div class="container">
                  <div class="field button">
                    <input type="submit" value="Cadastrar">
                  </div>
                  <div class="field button_reset">
                    <input type="reset" value="Cancelar">
                  </div>
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