<?php
    if(!isset($_SESSION)){
       session_start();
    }
    session_destroy();
    header("Location: formLoginUsuario.php");

    // o botão de sair devia estar em todas as telas, mas deixei só no index de exemplo