<?php
    include "../backend/conexao.php";

    $sql = "SELECT idUsuario, email, nivel
            FROM usuario
            ORDER BY nivel ASC";

    $resultado = mysqli_query($conexao, $sql);

    if(!$resultado){
        die("Erro: " . mysqli_error($conexao));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
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
            <h1 class="lista__h1">Lista de Usuários</h1>
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
                  <th>E-mail</th>
                  <th>Acesso</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($linha = mysqli_fetch_array($resultado)) {
                  //PHP para mostrar os clientes listados.
                  echo "<table class='lista__conteudo'>";

                  echo "<tr>";

                  echo "<td>$linha[idUsuario]</td>";
                  echo "<td>$linha[email]</td>";
                  echo "<td>$linha[nivel]</td>";

                  echo "<td>";
                  echo "<a href='editar_usuario.php?cod=$linha[idUsuario]'>";
                  echo "<i class='fa-solid fa-pen-to-square fa-2x'></i>";
                  echo "</a>";
                  echo "</td>";
                  
                  echo "</td>";                  
                  echo "<a href='../backend/excluirUsuario.php?cod=$linha[idUsuario]'>";
                  echo "<i class='fa-solid fa-trash fa-2x'></i>";
                  echo "</a>";
                  echo "</td>";

                  echo "</tr>";

                  echo "</table>";
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
          window.location = 'listar_cliente.php?search=' + search.value;
        }
        </script>
      </div>
    </div>
    </main>
</body>
</html>