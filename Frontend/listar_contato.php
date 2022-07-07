<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../Frontend/index.php');
}
?>

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
              <h1 class="cadastro__h1">Lista de Contatos</h1>

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