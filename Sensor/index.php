<?php

require_once 'config.php';

session_start();

$login = new LoginController();

?>

<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
       
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <link href="framework/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="">
        <title> Sensor | Administração</title>
    </head>
    <body class="login">
	<div class="box">          
            <div class="insideBox">
                <img src="img/logo_tbms.png" alt="Logo" class="logoImage">
                <form method="post">
                    <label class="loginLabel">Usuário: </label>
                    <input class = "loginInput" type="text"  placeholder="Digite o seu usuário" name="username" required="required"/>
                    <a class="loginLabelPassword">Esqueceu?</a>
                    <label class="loginLabel">Senha: </label>
                    <input class = "loginInput" type="password"  placeholder="Digite a sua senha" name="password" required="required"/>
                    <button type="submit" name="loginButton" class="loginButtonOnePage">LOG IN</button>
                    <?php
                        if(isset($_POST['loginButton'])){
                            $login->loginAction();
                        }
                    ?>
		</form>
            </div>
	</div>
    </body>
</html>
<?PHP ob_end_flush(); ?>