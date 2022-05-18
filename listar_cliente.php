<?php
include "backend/conexao.php";

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM cliente WHERE idCliente LIKE '%$data%' or razao_social LIKE '%$data%' or nome_fantasia LIKE '%$data%' or marca LIKE '%$data%' ORDER BY idCliente DESC";
} else {
    $sql = 'SELECT * FROM cliente ORDER BY idCliente DESC';
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
  <title>Lista de Clientes</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <main>
    <div class="background-image">
      <div class="background-image_gradient">
        <div class="sidebar">
          <div class="menu">
            <div class="item"><a href="index.html">TecText</a></div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-bag-shopping"></i>Produtos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="#" class="sub-item">Novo Produto</a>
                <a href="#" class="sub-item">Lista de Produtos</a>
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
                <a href="#" class="sub-item">Novo Pedido</a>
                <a href="#" class="sub-item">Lista de Pedidos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-address-book"></i>Contatos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="#" class="sub-item">Novo Contato</a>
              </div>
            </div>
          </div>
        </div>

        <head>

        <body>
          <div class="lista">
            <h1 class="lista__h1">Lista de Clientes</h1>
            <div class="filtro">
              <!-- <div onclick="filtrar()">
                                <i class="fa-solid fa-filter fa-2x"></i>
                            </div> -->
              <div class="lista__buscar lista__buscar-large">
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
                  <th>Razão Social</th>
                  <th>Nome</th>
                  <th>Marca</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                <?php while (
                                    $linha = mysqli_fetch_array($resultado)
                                ) {
                                    echo "<table class='lista__conteudo'>";
                                    echo "<td>$linha[idCliente]</td>";
                                    echo "<td>$linha[razao_social]</td>";
                                    echo "<td>$linha[nome_fantasia]</td>";
                                    echo "<td>$linha[marca]</td>";

                                    echo '<td>';

                                    echo "<a href='editar_cliente.php?cod=$linha[idCliente]'>";

                                    echo "<i class='fa-solid fa-pen-to-square fa-2x'></i>";
                                    echo '</a>';

                                    echo '<td>';

                                    echo "<a href='backend/excluir_Cliente.php?cod=$linha[idCliente]'>";
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

        var search = document.getElementById('buscar');

        search.addEventListener("keydown", function(event) {
          if (event.key === "Enter") {
            searchData();
          }
        });

        function searchData() {
          window.location = 'listar_cliente.php?search=' + search.value;
        }
        </script>
      </div>
    </div>
  </main>
</body>

</html>