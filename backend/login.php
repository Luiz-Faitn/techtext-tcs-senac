<?php
session_start();
include_once "conexao.php";
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

if (!empty($nome) && !empty($senha)) {
    $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE nome = '{$nome}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($senha);
        $enc_pass = $row['senha'];

        if ($user_pass === $enc_pass) {
            $status = "Ativo";
            $sql2 = mysqli_query($conexao, "UPDATE usuarios SET status = '{$status}' WHERE id_unico = {$row['id_unico']}");
            if ($sql2) {
                $_SESSION['id_unico'] = $row['id_unico'];
                echo "Sucesso!";
            } else {
                echo "Alguma coisa deu errado. Por favor, tento novamente!";
            }
        } else {
            echo "Nome ou senha estão incorretos.";
        }
    } else {
        echo "$nome - Esse nome de usuário não existe!";
    }
} else {
    echo "Todos os campos devem estar preenchidos!";
}