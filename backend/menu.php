<?php
include_once "../backend/conexao.php";

$sqlMenu       = "SELECT tipo FROM usuarios WHERE id_unico = ($_SESSION[id_unico])";
$resultadoMenu = mysqli_query($conexao, $sqlMenu);
?>

<!-- Sidebar -->
<div class="sidebar">
  <div class="menu">
    <div class="item__logo"><a href="usuarios.php">TECHTEXT</a></div>

    <?php

    if ($resultadoMenu->num_rows > 0) {
      if ($row = $resultadoMenu->fetch_assoc()) {
        $tipo = $row['tipo'];

        echo "<div class='item'>";
        echo "<a href='usuarios.php' class='sub-item'><i class='fa-brands fa-rocketchat'></i>Lista de Usuários</a>";
        echo "</div>";

        if ($tipo == 'Administrador') {

          echo "<div class='item'>";
          echo "<a class='sub-btn'><i class='fa-solid fa-bag-shopping'></i>Produtos<i class='fas fa-angle-right dropdown'></i></a>";
          echo "<div class='sub-menu'>";
          echo "<a href='novo_produto.php' class='sub-item'>Novo Produto</a>";
          echo "<a href='listar_produto.php' class='sub-item'>Lista de Produtos</a>";
          echo "</div>";
          echo "</div>";

          echo "<div class='item'>";
          echo "<a class='sub-btn'><i class='fa-solid fa-people-group'></i>Clientes<i class='fas fa-angle-right dropdown'></i></a>";
          echo "<div class='sub-menu'>";
          echo "<a href='novo_cliente.php' class='sub-item'>Novo Cliente</a>";
          echo "<a href='listar_cliente.php' class='sub-item'>Lista de Clientes</a>";
          echo "</div>";
          echo "</div>";

          echo "<div class='item'>";
          echo "<a class='sub-btn'><i class='fa-solid fa-list'></i>Pedidos<i class='fas fa-angle-right dropdown'></i></a>";
          echo "<div class='sub-menu'>";
          echo "<a href='novo_pedido.php' class='sub-item'>Novo Pedido</a>";
          echo "<a href='listar_pedido.php' class='sub-item'>Lista de Pedidos</a>";
          echo "</div>";
          echo "</div>";

          echo "<div class='item'>";
          echo "<a class='sub-btn'><i class='fa-solid fa-address-book'></i>Contatos<i class='fas fa-angle-right dropdown'></i></a>";
          echo "<div class='sub-menu'>";
          echo "<a href='novo_contato.php' class='sub-item'>Novo Contato</a>";
          echo "<a href='listar_contato.php' class='sub-item'>Lista de Contatos</a>";
          echo "</div>";
          echo "</div>";

          echo "<div class='item'>";
          echo "<a class='sub-btn'><i class='fa-solid fa-user'></i>Usuários<i class='fas fa-angle-right dropdown'></i></a>";
          echo "<div class='sub-menu'>";
          echo "<a href='novo_usuario.php' class='sub-item'>Cadastrar Usuário</a>";
          echo "<a href='listar_usuario.php' class='sub-item'>Lista Usuários</a>";
          echo "</div>";
          echo "</div>";
        }
      }
    }
    ?>

    <div class="item_usuario">
      <a class="sub-btn"><i class="fa-solid fa-file-contract"></i>Relatórios<i
          class="fas fa-angle-right dropdown"></i></a>
      <div class="sub-menu">
        <a href="novo_relatorio.php" class="sub-item">Novo Relatórios</a>
        <a href="listar_relatorio.php" class="sub-item">Listar de Relatório</a>
      </div>
    </div>

  </div>
</div>