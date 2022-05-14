<?php

include "conexao.php";

$razao_social  = $_POST['razao_social'];
$nome_fantasia = $_POST['nome_fantasia'];
$marca         = $_POST['marca'];

if($_POST['submit_cliente']) {
    $sql = "INSERT INTO cliente (razao_social, nome_fantasia, marca) VALUES ('$razao_social', '$nome_fantasia', '$marca') ";
} else {
    $sql = "UPDATE cliente SET razao_social='$razao_social', nome_fantasia='$nome_fantasia', marca='$marca'";
}

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {   
} else {
    echo "Erro: " . mysqli_error($conexao); 
}