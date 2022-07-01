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

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Contato</title>
  <link rel="stylesheet" href="../CSS/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <main>
    <div class="background-image">
      <div class="background-image_gradient">

        <!-- Sidebar -->
        <div class="sidebar">
          <div class="menu">
            <div class="item__logo"><a href="../index.php">TECHTEXT</a></div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-bag-shopping"></i>Produtos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_produto.php" class="sub-item">Novo Produto</a>
                <a href="listar_produto.php" class="sub-item">Lista de Produtos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-people-group"></i>Clientes<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_cliente.php" class="sub-item">Novo Cliente</a>
                <a href="listar_cliente.php" class="sub-item">Lista de Clientes</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-list"></i>Pedidos<i class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_pedido.php" class="sub-item">Novo Pedido</a>
                <a href="listar_pedido.php" class="sub-item">Lista de Pedidos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-address-book"></i>Contatos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_contato.php" class="sub-item">Novo Contato</a>
                <a href="listar_contato.php" class="sub-item">Lista de Contatos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-file-contract"></i>Relatórios<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_relatorio.php" class="sub-item">Novo relatório</a>
                <a href="listar_relatorio.php" class="sub-item">Lista de Relatório</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Edição de Contato -->
        <div class="editar">
          <h1 class="editar__h1">Edição de Contatos</h1>
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

            <div class="editar__form_button_container">
              <button type="submit" name="submit_cliente" class="editar__form_button editar__form_button-submit">
                Editar
              </button>
              <button type="submit" class="editar__form_button editar__form_button-reset"
                onclick="window.location='listar_contato.php';">
                Cancelar
              </button>
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