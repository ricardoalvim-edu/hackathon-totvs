<?php

require_once 'config.php';

?>

<!doctype html>
<html lang="en" class="no-js">
    <head>
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
       
        <link href="css/talhao.css" rel="stylesheet" type="text/css"/>
        <link href="framework/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <title> Talhao </title>
    </head>
    <body>
        <div class="talhaoMapa">
            <img src="img/logo_tbms.png" alt="Mapa Talhao" class="imgTalhao"/>
        </div>
        <div class="info">
            <h1>
                <?php foreach ($obj -> selectAll() as $key => $value) {
                    echo $value['id'];
                } ?>
            </h1>
            <div class="blocoCultura">
                <span>Tipo de cultura: <strong><?php foreach ($obj -> selectAll() as $key => $value) {
                      echo $value['cultura']; } ?></strong>
                </span>
            </div>
            <div class="blocoArea">
                <span>Area: <strong><?php foreach ($obj -> selectAll() as $key => $value) {
                      echo $value['area']; } ?> hectares</strong>
                </span>
            </div>
            <div class="blocoXcoord">
                <span>X: <strong><?php foreach ($obj -> selectAll() as $key => $value) {
                      echo $value['coordX']; } ?></strong>
                </span>
            </div>
            <div class="blocoYcoord">
                <span>Y: <strong><?php foreach ($obj -> selectAll() as $key => $value) {
                      echo $value['coordY']; } ?></strong>
                </span>
            </div>
        <div>
        <div class="nivelUmidade">
            <h2>NIVEL DE UMIDADE</h2>
            <?php
                foreach ($obj -> selectAll() as $key => $value) {
                    $valorUmidade $value['nivelUmidade'];
                }
            // BARRA DE UMIDADE
            ?><span>Estado atual: <strong><?php if($valorUmidade < 5.5) {
                echo 'Seco'; else if($valorUmidade > 8.25) {
                    echo 'Umido'; else {
                        echo 'Normal';
                    }
                }
            } ?></strong>
        </div>
            <h2>TEMPERATURA</h2>
        <div class="nivelTemperatura">
            <?php
                foreach ($obj -> selectAll() as $key => $value) {
                    $valorTemperatura $value['nivelTemperatura'];
                }
            // BARRA DE TEMPERATURA
            ?><span>Estado atual: <strong><?php if($nivelTemperatura < 18) {
                echo 'Frio'; else {
                    echo 'Quente';
                }
            } ?></strong>
        </div>
        <div class="detalhesFinais">
            <p>A temperatura do dia no local vale <span id="tempDia"></span>, com possibilidade de <span id="previsaoTempo"></span>.</p>
        </div>
    </body>
</html>
<?PHP ob_end_flush(); ?>
