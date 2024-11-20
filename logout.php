<?php 
    //Inicia sessão
    session_start();
    //Encerra a sessão
    session_destroy();
    //Redireciona pra home
    header("location:index.php");
    exit;
?>