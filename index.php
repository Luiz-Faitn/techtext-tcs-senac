<?php

include "../techtext-tcs-senac/backend/conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Techtext</title>
  <link rel="stylesheet" href="CSS/styles.css" />
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
            <div class="item__logo"><a href="index.php">TECHTEXT</a></div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-bag-shopping"></i>Produtos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="Frontend/novo_produto.php" class="sub-item">Novo Produto</a>
                <a href="Frontend/listar_produto.php" class="sub-item">Lista de Produtos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-people-group"></i>Clientes<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="Frontend/novo_cliente.php" class="sub-item">Novo Cliente</a>
                <a href="Frontend/listar_cliente.php" class="sub-item">Lista de Clientes</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-list"></i>Pedidos<i class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="Frontend/novo_pedido.php" class="sub-item">Novo Pedido</a>
                <a href="Frontend/listar_pedido.php" class="sub-item">Lista de Pedidos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-address-book"></i>Contatos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="Frontend/novo_contato.php" class="sub-item">Novo Contato</a>
                <a href="Frontend/listar_contato.php" class="sub-item">Lista de Contatos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-file-contract"></i>Relatórios<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="Frontend/novo_relatorio.php" class="sub-item">Novo relatório</a>
                <a href="Frontend/listar_relatorio.php" class="sub-item">Lista de Relatório</a>
              </div>
            </div>
          </div>
        </div>

        <div class="cadastro">

          <head>
            <title>Chat-Simples</title>

            <script type="text/javascript">
            function ajax() {
              var req = new XMLHttpRequest();
              req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                  document.getElementById('chat').innerHTML = req.responseText;
                }
              }
              req.open('GET', '..backend/chat.php', true);
              req.send();
            }
            setInterval(function() {
              ajax();
            }, 1000);
            </script>

          </head>

          <body onload="ajax();">
            <div id="chat"></div>
            <form method="post" action="../techtext-tcs-senac/backend/gravar_Chat.php">
              <input type="text" name="nome" placeholder="Nome">
              <input type="text" name="mensagem" placeholder="Mensagem">
              <input type="submit" value="Enviar">
            </form>
          </body>
        </div>

        <script type="text/javascript">
        $(document).ready(function() {
          //jquery para ativar sub-menus.
          $('.sub-btn').click(function() {
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
          });
        });
        </script>
      </div>
    </div>
  
  </main>	
</body>
</html>