<?php
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
              header("Location: ../index.php");
          }else{
              echo "Falha ao logar! Login ou senha incorretos!";
          }
       }
    }
?>