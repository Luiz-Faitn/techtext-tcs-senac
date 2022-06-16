<?php
include "../backend/conexao.php";

//Definir o horário padrão brasileiro.
date_default_timezone_set("America/Sao_Paulo");

//Conexão com o banco para listar os pedidos, juntamente com a barra de pesquisar.
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT p.*, i.iditens_pedido, c.nome_fantasia
          FROM pedido p
          LEFT JOIN itens_pedido i on p.idPedido = i.idPedido
          LEFT JOIN cliente c on p.idCliente = c.idCliente
          WHERE c.nome_fantasia LIKE '%$data%'
          ORDER BY nome_fantasia DESC";
} else {
  $sql = 'SELECT p.*, i.iditens_pedido, c.nome_fantasia
          FROM pedido p
          LEFT JOIN itens_pedido i on p.idPedido = i.idPedido
          LEFT JOIN cliente c on p.idCliente = c.idCliente
          ORDER BY idPedido DESC';
}

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
  <title>Lista de Pedidos</title>
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
            <h1 class="lista__h1">Lista de Pedidos</h1>
            <div class="filtro">
              <div class="lista__buscar lista__buscar-large">

                <!-- Barra de pesquisar -->
                <label class="lista__buscar_label"></label>
                <input name="lista_buscar" placeholder="Buscar..." id="buscar" />
                <div onclick="searchData()">
                  <i class="fa-solid fa-magnifying-glass fa-2x"></i>
                </div>

              </div>
            </div>
            <table class="lista__labels">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Data de Cadastro</th>
                  <th>Cliente</th>
                  <th>Data de Entrega</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($linha = mysqli_fetch_array($resultado)) {
                  //PHP para mostrar os pedidos listados.
                  echo "<table class='lista__conteudo'>";
                  echo "<td>$linha[idPedido]</td>";

                  $data_Cadastro = $linha['data_Cadastro'];
                  $novaData_Cadastro = date("d/m/Y", strtotime($data_Cadastro));
                  echo "<td>$novaData_Cadastro</td>";

                  echo "<td>$linha[nome_fantasia]</td>";

                  $data_Entrega = $linha['dataEntrega'];
                  $novaData_Entrega = date("d/m/Y", strtotime($data_Entrega));
                  echo "<td>$novaData_Entrega</td>";
                  echo '<td>';

                  echo "<a href='editar_pedido.php?cod=$linha[idPedido]'>";

                  echo "<i class='fa-solid fa-pen-to-square fa-2x'></i>";
                  echo '</a>';
                  echo '<td>';

                  if ($linha['iditens_pedido'] != NULL) {
                    echo "<i class='fa-solid fa-lock fa-2x'></i>";
                    echo '</td>';
                  } else {
                    echo "<a href='../backend/excluir_Pedido.php?cod=$linha[idPedido]'>";
                    echo "<i class='fa-solid fa-trash fa-2x'></i>";
                    echo '</a>';
                    echo '</td>';
                  }

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

        //Funcão para assim que apertar a tecla "Enter" do teclado, irá pesquisar.
        search.addEventListener("keydown", function(event) {
          if (event.key === "Enter") {
            searchData();
          }
        });

        //Funcão para pegar a informação na barra de pesquisa.
        function searchData() {
          window.location = 'listar_cliente.php?search=' + search.value;
        }
        </script>
      </div>
    </div>
  </main>
</body>

</html>