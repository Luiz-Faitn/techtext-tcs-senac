<?php

include "conexao.php";

$razao_social  = $_POST['razao_social'];
$nome_fantasia = $_POST['nome_fantasia'];
$marca         = $_POST['marca'];

if ($_POST['cod']) {
    $sql = "UPDATE cliente SET razao_social='$razao_social', nome_fantasia='$nome_fantasia', marca='$marca' WHERE idCliente=$_POST[cod] ";
} else {
    $sql = "INSERT INTO cliente (razao_social, nome_fantasia, marca) VALUES ('$razao_social', '$nome_fantasia', '$marca') ";
}

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    header("location: listar_Cliente.php");
} else {
    echo "Erro: " . mysqli_error($conexao); 
}