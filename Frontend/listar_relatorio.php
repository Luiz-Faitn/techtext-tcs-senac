<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../index.php');
}
?>

<?php

include "../backend/conexao.php";

//Definir o horário padrão brasileiro.
date_default_timezone_set("America/Sao_Paulo");

//Conexão com o banco para listar os clientes, juntamente com a barra de pesquisar.
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT i.iditens_pedido, p.data_Cadastro, pr.modelo, i.quantidade
          FROM itens_pedido i
          LEFT JOIN pedido p ON p.idPedido = i.idPedido
          LEFT JOIN produto pr on pr.idProduto = i.idProduto
          WHERE i.iditens_pedido LIKE '%$data%' or pr.modelo LIKE '%$data%'";
} else {
  $sql = "SELECT i.iditens_pedido, p.data_Cadastro, pr.modelo, i.quantidade
          FROM itens_pedido i
          LEFT JOIN pedido p ON p.idPedido = i.idPedido
          LEFT JOIN produto pr on pr.idProduto = i.idProduto
          ORDER BY iditens_pedido DESC;";
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
              <h1 class="cadastro__h1">Relatório</h1>
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
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Imprimir</th>
                    <th>Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($linha = mysqli_fetch_array($resultado)) {
                    //PHP para mostrar os clientes listados.
                    echo "<table class='lista__conteudo'>";
                    echo "<td>$linha[iditens_pedido]</td>";

                    $data_Cadastro = $linha['data_Cadastro'];
                    $novaData_Cadastro = date("d/m/Y", strtotime($data_Cadastro));
                    echo "<td>$novaData_Cadastro</td>";

                    echo "<td>$linha[modelo]</td>";
                    echo "<td>$linha[quantidade]</td>";

                    echo '<td>';

                    echo "<a href='javascript:pdf(cod=$linha[iditens_pedido])'>";
                    echo "<i class='fa-solid fa-print fa-2x'>";
                    echo '</a>';

                    echo '<td>';

                    echo "<a href='../backend/excluir_Itens_Pedido.php?cod=$linha[iditens_pedido]'>";
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
  window.location = 'listar_relatorio.php?search=' + search.value;
}


var cod = document.getElementById('iditens_pedido').value;
//Função para imprimir relatório.
function pdf() {

  var janela = window.open("../backend/impressao_relatorio.php?cod=" + cod, "_blank ",
    "width=1100, height=1000");
  janela.print();
}
</script>
</div>
</div>
</main>
</body>

</html>