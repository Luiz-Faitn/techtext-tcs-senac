<?php
include "../backend/conexao.php";

//Conexão com o banco para listar os produtos, juntamente com a barra de pesquisar.
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT p.*, i.iditens_pedido
          FROM produto p
          LEFT JOIN itens_pedido i on p.idProduto = i.idProduto
          WHERE p.idProduto LIKE '%$data%' or p.modelo LIKE '%$data%' or p.tipoTecido LIKE '%$data%' or p.tipoForro LIKE '%$data%'
          or p.obesrvacao LIKE '%$data%' or p.descricaoBotao LIKE '%$data%' or p.descricaoRibite LIKE '%$data%' or p.placa LIKE '%$data%'
          ORDER BY idProduto DESC";
} else {
  $sql = 'SELECT p.*, i.iditens_pedido
          FROM produto p 
          LEFT JOIN itens_pedido i on p.idProduto = i.idProduto
          ORDER BY idProduto DESC';
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
                  <th>Tipo Tecido</th>
                  <th>Tipo Forro</th>
                  <th>Exibir / Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($linha = mysqli_fetch_array($resultado)) {
                  //PHP para mostrar os produtos listados.
                  echo "<table class='lista__conteudo'>";
                  echo "<td>$linha[idProduto]</td>";
                  echo "<td>$linha[modelo]</td>";
                  echo "<td>$linha[tipoTecido]</td>";
                  echo "<td>$linha[tipoForro]</td>";
                  echo '<td>';

                  echo "<a href='editar_produto.php?cod=$linha[idProduto]'>";
                  echo "<i class='fa-solid fa-pen-to-square fa-2x'></i>";
                  echo '</a>';
                  echo '<td>';

                  if ($linha['iditens_pedido'] != NULL) {
                    echo "<i class='fa-solid fa-lock fa-2x'></i>";
                    echo '</td>';
                  }
                  if ($linha['iditens_pedido'] == NULL) {
                    echo "<a href='../backend/excluir_Produto.php?cod=$linha[idProduto]'>";
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
          window.location = 'listar_produto.php?search=' + search.value;
        }
        </script>
      </div>
    </div>
  </main>
</body>

</html>