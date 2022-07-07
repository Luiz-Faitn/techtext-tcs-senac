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
            <div class="chat">
              <header>
                <?php
                include_once "../backend/conexao.php";
                $user_id = mysqli_real_escape_string($conexao, $_GET['id_usuario']);
                $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_unico = {$_SESSION['id_unico']}");
                if (mysqli_num_rows($sql) > 0) {
                  $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="../Frontend/usuarios.php " class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <div class="content">
                  <?php include_once "../backend/logado.php"; ?>
                </div>
              </header>

              <div class="chat-box">
              </div>

              <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['id_unico']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Digite sua mensagem aqui..."
                  autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
              </form>

            </div>
          </section>
        </div>
      </div>

      <script src="../javascript/signup.js"></script>
      <script src="../javascript/senha-register.js"></script>
      <script src="../javascript/chat.js"></script>

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