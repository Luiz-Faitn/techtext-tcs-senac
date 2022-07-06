<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../index.php');
}
?>

<?php
include "../backend/conexao.php";

//Conexão com o banco para pegar o cliente que será editado.
if (isset($_GET)) {
  $sql = "SELECT razao_social, nome_fantasia, marca FROM cliente WHERE idCliente = $_GET[cod]";

  $resultado = mysqli_query($conexao, $sql);

  $cliente = mysqli_fetch_array($resultado);

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
            <div class="cliente">
              <?php include_once "../backend/logado.php"; ?>
              <h1 class="cadastro__h1">Edição de Clientes</h1>
              <form method="post" action="../backend/gravar_Cliente.php" class="editar__form">

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
                  <label class="editar__form_item_label">Razão Social</label>
                  <input type="text" name="razao_social" placeholder="Razão Social" id="razao_social" required
                    maxlength="150" value="<?php echo $cliente['razao_social'] ?>" />
                </div>
                <br>

                <div class="editar__form_item editar__form_item-large">
                  <label class="editar__form_item_label">Nome</label>
                  <input type="text" name="nome_fantasia" placeholder="Nome" id="nome_fantasia" required maxlength="100"
                    value="<?php echo $cliente['nome_fantasia'] ?>" />
                </div>
                <br>

                <div class="editar__form_item editar__form_item-large">
                  <label class="editar__form_item_label">Marca</label>
                  <input type="text" name="marca" placeholder="Marca" id="marca" required maxlength="100"
                    value="<?php echo $cliente['marca'] ?>" />
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