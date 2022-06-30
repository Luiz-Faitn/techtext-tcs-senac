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
              <button type="submit" class="editar__form_button editar__form_button-reset"
                onclick="window.location='listar_cliente.php';">
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