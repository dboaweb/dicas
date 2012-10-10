<?php include_once 'example_include.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title></title>
    </head>
    <body>
        <h4>
            <?php
            echo $islogged ? "O usuário entrou no sistema" : "Usuário não entrou";
            ?>
        </h4>
        <form action="send.php" method="post">
            usuario:<input type="text" name="user" />
            senha: <input type="password" name="pass">
            <input type="submit" value="login" />
        </form>
    </body>
</html>
