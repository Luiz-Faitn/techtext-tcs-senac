<?php
session_start();
include_once "conexao.php";
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
if (!empty($nome) && !empty($senha)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE nome = '{$nome}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($senha);
        $enc_pass = $row['senha'];
        if ($user_pass === $enc_pass) {
            $status = "Active now";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if ($sql2) {
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            } else {
                echo "Something went wrong. Please try again!";
            }
        } else {
            echo "nome or senha is Incorrect!";
        }
    } else {
        echo "$nome - This nome not Exist!";
    }
} else {
    echo "All input fields are required!";
}