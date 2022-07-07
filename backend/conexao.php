<?php

$hostname = "localhost";
$usuario  = "root";
$senha    = "mysql";
$banco    = "mydb";

$conexao = new mysqli($hostname, $usuario, $senha, $banco);
if ($conexao->connect_errno) {
    echo "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
}