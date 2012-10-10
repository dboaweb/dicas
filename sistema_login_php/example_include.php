<?php
    session_start();
    include_once 'Login.php';
    
    //instancia o login passando os dados do banco para ele
    $loginObj = new Login('mysql:host=localhost;dbname=test', 'root','');
    $islogged = $loginObj->isLogged();
?>
