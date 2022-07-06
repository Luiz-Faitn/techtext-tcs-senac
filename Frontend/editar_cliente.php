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

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Cliente</title>
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

        <!-- Edição de Cliente -->
        <div class="editar">
          <h1 class="editar__h1">Edição de Clientes</h1>
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

            <div class="editar__form_button_container">
              <button type="submit" name="submit_cliente" class="editar__form_button editar__form_button-submit">
                Editar
              </button>
              <button type="reset" class="editar__form_button editar__form_button-reset"
                onclick="window.location='listar_cliente.php';">
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