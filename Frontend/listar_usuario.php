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
  $sql = "SELECT *
          FROM usuarios
          WHERE id_usuario LIKE '$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or tipo LIKE '%$data%' or status LIKE '%$data%'
          ORDER BY id_usuario DESC";
} else {
  $sql = "SELECT *
          FROM usuarios 
          ORDER BY id_usuario DESC";
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
              <h1 class="cadastro__h1">Lista de Usuários</h1>

              <body>
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
                      <th>Código Único</th>
                      <th>Imagem de Usuário</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Tipo</th>
                      <th>Status</th>
                      <th>Editar</th>
                      <th>Excluir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($linha = mysqli_fetch_array($resultado)) {
                      //PHP para mostrar os clientes listados.
                      echo "<table class='lista__conteudo'>";
                      echo "<td>$linha[id_usuario]</td>";
                      echo "<td>$linha[id_unico]</td>";
                      echo "<td>$linha[img]</td>";
                      echo "<td>$linha[nome]</td>";
                      echo "<td>$linha[email]</td>";
                      echo "<td>$linha[tipo]</td>";
                      echo "<td>$linha[status]</td>";

                      echo '<td>';

                      echo "<a href='editar_usuario.php?cod=$linha[id_usuario]'>";

                      echo "<i class='fa-solid fa-pen-to-square fa-2x'></i>";
                      echo '</a>';
                      echo '<td>';

                      if ($linha['status'] == 'Ativo') {
                        echo "<i class='fa-solid fa-lock fa-2x'></i>";
                        echo '</td>';
                      } else {
                        echo "<a href='../backend/excluir_Usuario.php?cod=$linha[id_usuario]'>";
                        echo "<i class='fa-solid fa-trash fa-2x'></i>";
                        echo '</a>';
                        echo '</td>';
                      }

                      echo '</tr>';
                      echo '</table>';
                    } ?>
                  </tbody>
                </table>
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
                window.location = 'listar_usuario.php?search=' + search.value;
              }
              </script>
            </div>
        </div>
  </main>
</body>

</html>