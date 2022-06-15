<?php
include "../backend/conexao.php";

//Conexão com o banco para listar os contatos, juntamente com a barra de pesquisar.
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM contato WHERE idCliente LIKE '%$data%' ORDER BY idContato DESC";
} else {
  $sql = 'SELECT * FROM contato WHERE idContato = 999999999999 ORDER BY idContato DESC';
}

//Conexão com o banco para aparecer o idCliente no cadastro.  
$sqlCliente = "SELECT idCliente, nome_fantasia FROM cliente ORDER BY nome_fantasia";

$resultadoCliente = mysqli_query($conexao, $sqlCliente);

$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
  echo 'ERRO: ' . mysqli_error($conexao);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lista de Contatos</title>
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
            <div class="item"><a href="../index.php">TECTEXT</a></div>
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

        <body>
          <div class="lista">
            <h1 class="lista__h1">Lista de Contatos</h1>

            <!-- Barra de pesquisar -->
            <div class="filtro">
              <label class="cadastro__form_select_label">Código do Cliente</label>
              <select name="cliente" class="select_lista" id="buscar">
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
              <div class="i" onclick="searchData()">
                <i class="fa-solid fa-magnifying-glass fa-2x"></i>
              </div>
            </div>


            <table class="lista__labels">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Código do Cliente</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($linha = mysqli_fetch_array($resultado)) {
                  //PHP para mostrar os clientes listados.
                  echo "<table class='lista__conteudo'>";
                  echo "<td>$linha[idContato]</td>";
                  echo "<td>$linha[idCliente]</td>";
                  echo "<td>$linha[email]</td>";
                  echo "<td>$linha[telefone]</td>";

                  echo '<td>';

                  echo "<a href='editar_contato.php?cod=$linha[idContato]'>";

                  echo "<i class='fa-solid fa-pen-to-square fa-2x'></i>";
                  echo '</a>';

                  echo '<td>';

                  echo "<a href='../backend/excluir_Contato.php?cod=$linha[idContato]'>";
                  echo "<i class='fa-solid fa-trash fa-2x'></i>";
                  echo '</a>';

                  echo '</td>';
                  echo '</tr>';
                  echo '</table>';
                } ?>
              </tbody>
            </table>
          </div>
        </body>
        </head>

        <script type="text/javascript">
        $(document).ready(function() {
          //jquery para ativar sub-menus.
          $('.sub-btn').click(function() {
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
          });
        });

        //Variável para pegar a informação digitada para pesquisar.
        var search = document.getElementById('buscar');

        //Funcão para pegar a informação na barra de pesquisa.
        function searchData() {
          window.location = 'listar_contato.php?search=' + search.value;
        }
        </script>
      </div>
    </div>
  </main>
</body>

</html>