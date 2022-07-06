<?php

include "conexao.php";

$email  = $_POST['email'];
$senha  = $_POST['senha'];
$acesso = $_POST['acesso'];

$sql = "INSERT INTO usuario (email, senha, nivel) VALUES ('$email', '$senha', '$acesso')";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {   
    header('location: ../Frontend/listar_usuario.php');
} else {
    echo "Erro: " . mysqli_error($conexao);
}