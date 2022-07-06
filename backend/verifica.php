<?php
    if(!isset($_SESSION)){
            session_start();
        }

    if(!isset($_SESSION['user'])){
       die("Você não pode acessar esta página porque não está logado! 
           <p><a href='../backend/formLoginUsuario.php'>Entrar</p>");
    }

    // esse arquivo teria que estar em todas as telas, para validar se o usuário está logado,
    // e manter a sessão ativa