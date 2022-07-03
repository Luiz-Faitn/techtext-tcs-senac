<?php
include "conexao.php";
		$nome = $_POST['nome'];
		$mensagem = $_POST['mensagem'];

        $sql = "INSERT INTO chat (nome, mensagem) VALUES ('$nome', '$mensagem')";

        $resultado = mysqli_query($sql, $conexao);

      if ($resultado) {   
          header('../index.php');
      } else {
          echo "Erro: " . mysqli_error($conexao);
      }
