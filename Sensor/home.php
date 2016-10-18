<?php

require_once 'config.php';

$login = new LoginController();

$talhao = new TalhaoController();

?>

<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        <link href="framework/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <title> Sensor | Administração</title>
    </head>
    <body>
        <div class='center-block'>
            <img src="img/logo_tbms.png" alt="Logo" class="logoImage"/>
            <div class='end-nav'></div>
            <nav class='box-options'>
              <li class='options'><a href="home.php?page=chooseTalhao" class='glyphicon glyphicon-home'> Início</a></li>
              <li class='options'><a href="home.php?page=cadastroTalhao" class='glyphicon glyphicon-plus'> Cadastro Talhão</a></li>
              <li class='options'><a href="home.php?page=talhaoNovo" class='glyphicon glyphicon-map-marker'> Talhão</a></li>
              <li class='options'><a href="home.php?page=logout" class='glyphicon glyphicon-log-out'> Sair</a></li>
            </nav>
            <div class='content'>

            </div>
    </body>
</html>

<?php
    if(isset($_GET['choose'])){

    }

    if(isset($_GET['page'])){
        switch ($_GET['page']) {
            case 'logout':
                $login->logoutAction();
                break;
            default:
                if (empty($_GET['page'])) {
                    require ('home.php');
                }

                elseif (file_exists($_GET['page'] . '.php')) {
                    require ($_GET['page'] . '.php');
                }

                else {
                    echo '<br></br>';
                    echo '<span style="margin-left:10%;" class="alert alert-warning" role="alert">Desculpe a página que está tentando acessar é invalida</span>';
                    echo '<br></br>';
                }

                break;
        }
    }
?>
