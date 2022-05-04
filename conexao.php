<?php
    error_reporting(E_ALL ^E_NOTICE);

    $conexao = mysqli_connect("localhost", "root", "mysql", "mydb");
    
    if ($conexao == false) {
        die("Erro na conexão: " . mysqli_connect_error());
    }