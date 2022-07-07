<?php
    include "../backend/conexao.php";

    if(isset($_GET['cod'])){
       $sql = "SELECT idUsuario, email, senha, nivel
               FROM usuario
               WHERE idUsuario = $_GET[cod]";

        $resultado = mysqli_query($conexao, $sql);

        if(!$resultado){
            echo "Erro: " . mysqli_error($conexao);
        }else{
            $usador = mysqli_fetch_array($resultado);
        }
    }

    $sqlNivel = "SELECT idUsuario, nivel FROM usuario ORDER BY nivel ASC";
    $resultadoNivel = mysqli_query($conexao, $sqlNivel);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../CSS/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
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

        <!-- Edição de Usuário -->
        <div class="editar">
          <h1 class="editar__h1">Edição de Usuários</h1>
          <form method="post" action="../backend/gravarUsuario.php" class="editar__form">

            <div class="editar__form_item editar__form_item-large">
              <?php
              if ($_GET['cod']) {
                echo "<label class='editar__form_item_label'>Código</label>";
                echo "<input type='text' name='cod' readonly='readonly' value='$_GET[cod]' />";
              }
              ?>
            </div>
            <br>

            <div class="editar__form_item editar__form_item-large">
              <label class="editar__form_item_label">E-mail</label>
              <input type="email" name="email" placeholder="E-mail" id="email" required
                maxlength="100" value="<?php echo $usador['email'] ?>" />
            </div>
            <br>

            <div class="editar__form_item editar__form_item-large">
              <label class="editar__form_item_label">Senha</label>
              <input type="password" name="senha" placeholder="Senha" id="senha" required maxlength="15"
                value="<?php echo $usador['senha'] ?>" />
            </div>
            <br>
            <div class="editar__form_button_container">
              <button type="submit" name="submit_cliente" class="editar__form_button editar__form_button-submit">
                Editar
              </button>
              <button type="reset" class="editar__form_button editar__form_button-reset"
                onclick="window.location='listar_usuario.php';">
                Cancelar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </main>
</body>
</html>