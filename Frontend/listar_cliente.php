<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../Frontend/index.php');
}
?>

<?php
include "../backend/conexao.php";

//Conexão com o banco para listar os clientes, juntamente com a barra de pesquisar.
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT cl.*, co.idContato, p.idPedido
          FROM cliente cl
          LEFT JOIN contato co on cl.idCliente = co.idCliente
          LEFT JOIN pedido p on cl.idCliente = p.idCliente
          WHERE cl.idCliente LIKE '$data%' or cl.razao_social LIKE '%$data%' or cl.nome_fantasia LIKE '%$data%' or cl.marca LIKE '%$data%'
          ORDER BY idCliente DESC";
} else {
  $sql = "SELECT cl.*, co.idContato, p.idPedido
          FROM cliente cl 
          LEFT JOIN contato co on cl.idCliente = co.idCliente
          LEFT JOIN pedido p on cl.idCliente = p.idCliente
          ORDER BY idCliente DESC";
}

$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
  echo 'ERRO: ' . mysqli_error($conexao);
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
            <div class="usuario">
              <?php include_once "../backend/logado.php"; ?>
              <h1 class="cadastro__h1">Lista de Clientes</h1>
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
                    <th>Razão Social</th>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($linha = mysqli_fetch_array($resultado)) {
                    //PHP para mostrar os clientes listados.
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

                    if ($linha['idContato'] != NULL or $linha['idPedido'] != NULL) {
                      echo "<i class='fa-solid fa-lock fa-2x'></i>";
                      echo '</td>';
                    } else {
                      echo "<a href='../backend/excluir_Cliente.php?cod=$linha[idCliente]'>";
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