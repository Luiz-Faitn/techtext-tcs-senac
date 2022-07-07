<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../Frontend/index.php');
}
?>

<?php

//Conexão com o banco para aparecer o idCliente no cadastro. 
include "../backend/conexao.php";

$sqlCliente = "SELECT idCliente, nome_fantasia FROM cliente ORDER BY nome_fantasia";

$resultadoCliente = mysqli_query($conexao, $sqlCliente);

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