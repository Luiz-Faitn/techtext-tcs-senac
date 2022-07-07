<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../Frontend/index.php');
}
?>

<?php

include "../backend/conexao.php";

//Conexão com o banco para pegar o contato que será editado.
if (isset($_GET)) {
  $sql = "SELECT idCliente, email, telefone FROM contato WHERE idContato = $_GET[cod]";

  $resultado = mysqli_query($conexao, $sql);

  $contato = mysqli_fetch_array($resultado);

  if (!$resultado) {
    echo "Erro: " . mysqli_error($conexao);
  }
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
            <div class="pedido">
              <?php include_once "../backend/logado.php"; ?>
              <h1 class="cadastro__h1">Edição de Contatos</h1>
              <form method="post" action="../backend/gravar_Contato.php" class="editar__form">

                <div class="editar__form_item editar__form_item-large">
                  <?php
                  if ($_GET) {
                    echo "<label class='editar__form_item_label'>Código</label>";
                    echo "<input type='text' name='cod' readonly='readonly' value='$_GET[cod]' />";
                  }
                  ?>
                </div>
                <br>

                <div class="editar__form_item editar__form_item-large">
                  <label class="editar__form_item_label">Código Cliente</label>
                  <input type="text" name="cliente" id="cliente" readonly="readonly"
                    value="<?php echo $contato['idCliente'] ?>" />
                </div>
                <br>

                <div class="editar__form_item editar__form_item-large">
                  <label class="editar__form_item_label">E-mail</label>
                  <input type="text" name="email" placeholder="E-mail" id="email" required maxlength="150"
                    value="<?php echo $contato['email'] ?>" />
                </div>
                <br>

                <div class="editar__form_item editar__form_item-large">
                  <label class="editar__form_item_label">Telefone</label>
                  <input type="text" name="telefone" placeholder="Telefone" id="telefone" required maxlength="100"
                    value="<?php echo $contato['telefone'] ?>" />
                </div>

                <div class="container">
                  <div class="field button">
                    <input type="submit" value="Cadastrar">
                  </div>
                  <div class="field button_reset">
                    <a href=""><input type="submit" value="Cancelar"></a>
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