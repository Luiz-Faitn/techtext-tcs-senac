<?php
session_start();

include_once "conexao.php";

$nome   = mysqli_real_escape_string($conexao, $_POST['nome']);
$email  = mysqli_real_escape_string($conexao, $_POST['email']);
$senha  = mysqli_real_escape_string($conexao, $_POST['senha']);
$tipo   = mysqli_real_escape_string($conexao, $_POST['tipo']);
$status = "Inativo";


if ($_POST['cod']) {
  $status = mysqli_real_escape_string($conexao, $_POST['status']);

  if (!empty($nome) && !empty($email) && !empty($senha) && !empty($tipo)) {
    $sqlNome = mysqli_query($conexao, "SELECT nome FROM usuarios WHERE nome = '{$nome}'");
    if (isset($_FILES['img'])) {
      $img_name = $_FILES['img']['name'];
      $img_type = $_FILES['img']['type'];
      $tmp_name = $_FILES['img']['tmp_name'];

      $img_explode = explode('.', $img_name);
      $img_ext = end($img_explode);

      $extension = ['png', 'jpeg', 'jpg'];
      if (in_array($img_ext, $extension) === true) {
        $time = time();
        $new_img_name = $time . $img_name;

        if (move_uploaded_file($tmp_name, "../imgs/icons/" . $new_img_name)) {
          $sql2 = mysqli_query($conexao, "UPDATE usuarios 
                                          SET nome='$nome', email='$email', senha='$senha', img='$new_img_name', tipo='$tipo', status='$status'
                                          WHERE id_usuario = $_POST[cod]");
          if ($sql2) {
            $sql3 = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '{$email}'");

            if (mysqli_num_rows($sql3) > 0) {
              $row = mysqli_fetch_assoc($sql3);
              echo "Sucesso!";
            }
          } else {
            echo "Alguma coisa deu errado, tente novamente!";
          }
        }
      } else {
        echo "Por favor, coloque uma imagem compatível - jpeg, jpg, png";
      }
    } else {
      echo "Por favor, coloque uma imagem compatível - jpeg, jpg, png";
    }
  } else {
    echo "Todos os campos são necessários!";
  }
} else {
  if (!empty($nome) && !empty($email) && !empty($senha) && !empty($tipo)) {
    $sqlNome = mysqli_query($conexao, "SELECT nome FROM usuarios WHERE nome = '{$nome}'");
    if (mysqli_num_rows($sqlNome) > 0) {
      echo "$nome - Esse nome já existe!";
    } else {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conexao, "SELECT email FROM usuarios WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
          echo "$email - Esse email já existe!";
        } else {
          if (isset($_FILES['img'])) {
            $img_name = $_FILES['img']['name'];
            $img_type = $_FILES['img']['type'];
            $tmp_name = $_FILES['img']['tmp_name'];

            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);

            $extension = ['png', 'jpeg', 'jpg'];
            if (in_array($img_ext, $extension) === true) {
              $time = time();
              $new_img_name = $time . $img_name;

              if (move_uploaded_file($tmp_name, "../imgs/icons/" . $new_img_name)) {
                $status = "Inativo";
                $ran_id = rand(time(), 100000000);
                $encrypt_pass = md5($senha);

                $sql2 = mysqli_query($conexao, "INSERT INTO usuarios (id_unico, nome, email, senha, img, tipo, status) 
                                  VALUES ({$ran_id}, '{$nome}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$tipo}', '{$status}')");
                if ($sql2) {
                  $sql3 = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '{$email}'");

                  if (mysqli_num_rows($sql3) > 0) {
                    $row = mysqli_fetch_assoc($sql3);
                    echo "Sucesso!";
                  }
                } else {
                  echo "Alguma coisa deu errado, tente novamente!";
                }
              }
            } else {
              echo "Por favor, coloque uma imagem compatível - jpeg, jpg, png";
            }
          } else {
            echo "Por favor, coloque uma imagem compatível - jpeg, jpg, png";
          }
        }
      } else {
        echo "$email não é um email válido";
      }
    }
  } else {
    echo "Todos os campos são necessários!";
  }
}