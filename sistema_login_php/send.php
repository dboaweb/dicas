<?php
    include_once 'example_include.php';
    $logged = $loginObj->logar($_POST['user'], $_POST['pass']);
    if($logged){
        header('Location: index.php');
    }else{
        echo 'Erro ao fazer o login';
    }
?>
