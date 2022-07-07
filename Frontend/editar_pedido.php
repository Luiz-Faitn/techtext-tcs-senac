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
                  <input type="date" name="data_Cadastro" id="data_Cadastro"
                    value="<?php echo $pedido['data_Cadastro'] ?>" required />
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