<?php
    // eu acho que esse arquivo poderia estar no formLoginUsuario, mas eu separei pra seguir o padrão.
    // melhor juntar os 2
    include "conexao.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(isset($email) || isset($senha)){
       
       if(strlen($email) == 0){
          echo "Preencha seu e-mail!";

       }else if(strlen($senha) == 0){
          echo "Preencha sua senha!";

       }else{
          $emailLimpo = $conexao->real_escape_string($email);
          $senhaLimpa = $conexao->real_escape_string($senha);

          $sql = "SELECT idUsuario, email, senha 
                  FROM usuario
                  WHERE email='$emailLimpo' AND senha='$senhaLimpa'";
          
          $resultado = mysqli_query($conexao, $sql) or die("Erro: " . mysqli_error($conexao));
          
          $quantidade = $resultado->num_rows;

          if($quantidade == 1){
             $user = $resultado->fetch_assoc();

             if(!isset($_SESSION)){
                session_start();
             }

              $_SESSION['user'] = $user['idUsuario'];
              $_SESSION['email'] = $user['email'];
              $_SESSION['nivel'] = $user['nivel'];
              header("Location: ../index/index.php");
          }else{
              echo "E-mail ou senha inválidos!";
          }
       }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>TECHTEXT</h1>
    <h2>Entre na sua conta</h2>

    <form method="POST"> 
        
        E-mail: <input type="email" name="email" maxlength="100" placeholder="Digite seu e-mail"><br><br>
        Senha: <input type="password" name="senha" maxlength="15" placeholder="Digite sua senha"><br><br>

        <input type="submit" value="Entrar"><br><br>
    </form>
</body>
</html>