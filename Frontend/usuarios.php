<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../Frontend/index.php');
}
?>

<?php include_once "../backend/header.php"; ?>

<body class="body_chat">
  <main>
    <div class="background-image">
      <div class="background-image_gradiente">
        <?php include_once "../backend/menu.php"; ?>
        <div class="wrapper_chat">
          <section class="former signup">
            <div class="usuarios">
              <header>
                <?php
                include_once "../backend/conexao.php";
                $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_unico = {$_SESSION['id_unico']}");
                if (mysqli_num_rows($sql) > 0) {
                  $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                  <?php include_once "../backend/logado.php"; ?>
                </div>
              </header>
              <div class="search">
                <span class="text">Selecione um usuário para iniciar uma conversa</span>
                <input type="text" placeholder="Coloque um nome para procurar...">
                <button><i class="fas fa-search"></i></button>
              </div>
              <div class="users-list">
              </div>
            </div>
          </section>
        </div>
      </div>

      <script src="../javascript/signup.js"></script>
      <script src="../javascript/senha-register.js"></script>
      <script src="../javascript/usuarios.js"></script>

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
  </main>
</body>