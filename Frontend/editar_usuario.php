<?php
session_start();
include_once "../backend/conexao.php";
if (!isset($_SESSION['id_unico'])) {
  header('location:../index.php');
}
?>

<?php
include "../backend/conexao.php";

//Conexão com o banco para pegar o cliente que será editado.
if (isset($_GET)) {
  $sql = "SELECT id_unico, nome, email, senha, img, tipo, status FROM usuarios WHERE id_usuario = $_GET[cod]";

  $resultado = mysqli_query($conexao, $sql);

  $usuario = mysqli_fetch_array($resultado);

  if (!$resultado) {
    echo "Erro: " . mysqli_error($conexao);
  }
}
?>

<?php include_once "../backend/header.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">

<body>
  <main>
    <div class="background-image">
      <div class="background-image_gradient">

        <?php include_once "../backend/menu.php"; ?>
        <div class="wrapper_usuario">
          <section class="former signup">
            <div class="usuario">
              <?php include_once "../backend/logado.php"; ?>
              <h1 class="cadastro__h1">Cadastro de Usuários</h1>

              <div class="wrapper_usuario_editar">
                <section class="former signup">


                  <!-- Cadastro de Cliente -->
                  <form method="post" action="../backend/gravar_Usuario.php" class="cadastro__form_usuario"
                    enctype="multipart/form-data">

                    <div class="cadastro__form_item_erro"></div>
                    <div class="input-cadastro">
                      <?php
                      if ($_GET) {
                        echo "<label class='editar__form_item_label'>Código</label>";
                        echo "<input type='text' name='cod' readonly='readonly' value='$_GET[cod]' />";
                      }
                      ?>
                    </div>
                    </br>

                    <div class="input-cadastro">
                      <label class="cadastro__form_item_label">Código Único</label>
                      <input type="text" name="id_unico" placeholder="Código Único" id="id_unico" required
                        maxlength="255" readonly='readonly' value="<?php echo $usuario['id_unico'] ?>" />
                    </div>
                    </br>

                    <div class="input-cadastro">
                      <label class="cadastro__form_item_label">Nome de Usuário</label>
                      <input type="text" name="nome" placeholder="Nome de Usuário" id="nome" required maxlength="255"
                        value="<?php echo $usuario['nome'] ?>" />
                    </div>
                    </br>

                    <div class="input-cadastro">
                      <label class="cadastro__form_item_label">Email do Usuário</label>
                      <input type="text" name="email" placeholder="Email do Usuário" id="email" required maxlength="255"
                        value="<?php echo $usuario['email'] ?>" />
                    </div>
                    </br>

                    <div class="input-cadastro">
                      <label class="cadastro__form_item_label">Senha</label>
                      <input type="password" name="senha" placeholder="Senha" id="senha" required maxlength="255" />
                      <i class="fas fa-eye"></i>
                    </div>
                    </br>

                    <div class="cadastro__form_select">
                      <label class="cadastro__form_item_label">Tipo de Usuário</label>
                      <select name="tipo" class="select" id="select" required>
                        <?php
                        if ($usuario['tipo' == "Administrador"]) {
                          echo "<option name='tipo' id='tipo' disabled>Selecione</option>";
                          echo "<option name='tipo' id='tipo' value='Administrador' selected>Administrador</option>";
                          echo "<option name='tipo' id='tipo' value='Funcionário'>Funcionário</option>";
                        } else if ($usuario['tipo' == "Funcionário"]) {
                          echo "<option name='tipo' id='tipo' disabled>Selecione</option>";
                          echo "<option name='tipo' id='tipo' value='Administrador'>Administrador</option>";
                          echo "<option name='tipo' id='tipo' value='Funcionário' selected>Funcionário</option>";
                        }
                        ?>
                      </select>
                    </div>
                    </br>

                    <div class="cadastro__form_select">
                      <label class="cadastro__form_item_label">Status</label>
                      <select name="status" class="select" id="select" required>
                        <?php
                        if ($usuario['status' == "Ativo"]) {
                          echo "<option name='tipo' id='tipo' value='Ativo' disabled>Selecione</option>";
                          echo "<option name='tipo' id='tipo' value='Ativo' selected>Ativo</option>";
                          echo "<option name='tipo' id='tipo' value='Inativo'>Inativo</option>";
                        } else if ($usuario['status' == "Inativo"]) {
                          echo "<option name='tipo' id='tipo' value='Ativo' disabled>Selecione</option>";
                          echo "<option name='tipo' id='tipo' value='Ativo'>Ativo</option>";
                          echo "<option name='tipo' id='tipo' value='Inativo' selected>Inativo</option>";
                        }
                        ?>
                      </select>
                    </div>
                    </br>

                    <div class="input-cadastro">
                      <label class="cadastro__form_item_label">Imagem de Usuário</label>
                      <input type="file" name="img" id="img" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                        required />
                    </div>


                    <div class="container">
                      <div class="field button">
                        <input type="submit" value="Cadastrar">
                      </div>
                      <div class="field button_reset">
                        <input type="reset" value="Cancelar">
                      </div>
                    </div>
              </div>
              </form>
          </section>
        </div>

        <script src="../javascript/signup.js"></script>
        <script src="../javascript/senha-register.js"></script>

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