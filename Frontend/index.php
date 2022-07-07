<?php include_once "../backend/header.php"; ?>

<body class="chat_registro">
  <div class="wrapper">
    <section class="form login">
      <header>Techtext</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">

        <div class="texto-erro"></div>
        <div class="detalhes-nome">
          <div class="field input">
            <label>Nome de Usuário</label>
            <input type="text" name="nome" placeholder="Nome de Usuario" required>
          </div>
        </div>

        <div class="field input">
          <label>Senha</label>
          <input type="password" name="senha" placeholder="Coloque a sua senha" required>
          <i class="fas fa-eye"></i>
        </div>

        <div class="field button">
          <input type="submit" name="submit" value="Continue para a página">
        </div>

      </form>
    </section>
  </div>

  <script src="../javascript/senha-login.js"></script>
  <script src="../javascript/login.js"></script>

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



  </html>