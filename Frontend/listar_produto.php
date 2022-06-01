<?php
include "../backend/conexao.php";

//Conexão com o banco para listar os produtos, juntamente com a barra de pesquisar.
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM produto WHERE idProduto LIKE '%$data%' or modelo LIKE '%$data%' or tipoTecido LIKE '%$data%' or tipoForro LIKE '%$data%'
    or obesrvacao LIKE '%$data%' or descricaoBotao LIKE '%$data%' or descricaoRibite LIKE '%$data%' or placa LIKE '%$data%' ORDER BY idProduto DESC";
} else {
  $sql = 'SELECT * FROM produto ORDER BY idProduto DESC';
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
  <title>Lista de Produtos</title>
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
              </div>
            </div>
          </div>
        </div>

        <body>
          <div class="lista">
            <h1 class="lista__h1">Lista de Produtos</h1>
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
                  <th>Modelo</th>
                  <th>tipo de Tecido</th>
                  <th>Tipo de Forro</th>
                  <th>Observação</th>
                  <th>Descrição do Botão</th>
                  <th>Descrição do Ribite</th>
                  <th>Descrição da Placa</th>
                  <th>Quantidade de Botão</th>
                  <th>Quantidade de Ribite</th>
                  <th>Quantidade de Placa</th>
                  <th>Tamanho</th>
                  <th>Tamanho da Cintura</th>
                  <th>Tamanho do Quadril</th>
                  <th>Comprimento do Gancho Traseiro</th>
                  <th>Tamanho Comprimento da Perna Lateral</th>
                  <th>Tamanho Comprimento da Frente da Perna</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($linha = mysqli_fetch_array($resultado)) {
                  //PHP para mostrar os clientes listados.
                  echo "<table class='lista__conteudo'>";
                  echo "<td>$linha[idProduto]</td>";
                  echo "<td>$linha[tipoTecido]</td>";
                  echo "<td>$linha[tipoForro]</td>";
                  echo "<td>$linha[obesrvacao]</td>";
                  echo "<td>$linha[descricaoBotao]</td>";
                  echo "<td>$linha[descricaoRibite]</td>";
                  echo "<td>$linha[placa]</td>";
                  echo "<td>$linha[quantidadeBotao]</td>";
                  echo "<td>$linha[quantidadeRibite]</td>";
                  echo "<td>$linha[quantidadePlaca]</td>";
                  echo "<td>$linha[tamanho]</td>";
                  echo "<td>$linha[tamanhoCintura]</td>";
                  echo "<td>$linha[tamanhoQuadril]</td>";
                  echo "<td>$linha[tamanhoGanchoTraseiro]</td>";
                  echo "<td>$linha[tamanhoComprimentoPernaLateral]</td>";
                  echo "<td>$linha[tamanhoComprimentoFrentePerna]</td>";
                  echo "<td>$linha[tamanhoLaguraPerna]</td>";

                  echo '<td>';

                  echo "<a href='editar_produto.php?cod=$linha[idProduto]'>";

                  echo "<i class='fa-solid fa-pen-to-square fa-2x'></i>";
                  echo '</a>';

                  echo '<td>';

                  echo "<a href='../backend/excluir_Produto.php?cod=$linha[idProduto]'>";
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