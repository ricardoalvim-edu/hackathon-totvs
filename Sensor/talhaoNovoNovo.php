<?php

require_once 'config.php';

$object = new TalhaoController();

$item = $object->select();

$info = $object->selectInfo();

$irrObject = new IrrigacaoController();

?>

<link href="css/talhao.css" rel="stylesheet" type="text/css"/>
<link href="framework/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<script src="js/prefixfree.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='js/jquery.simpleWeather.min.js'></script>
<script src="js/index.js"></script>
<div class="infoTalhao">
    <div class="talhaoMapa">
        <img src="img/talhao_mapa_norte_01.png" alt="Mapa Talhao" class="imgTalhao"/>
    </div>
    <div class="infoDir">
        <div class="titleInfo">
            <h1><?php echo $item[0]['nomeTalhao']; ?></h1>
        </div>
        <div class="botaoIrrigacao">
            <form method="post">
                <button type="submit" name="irrigationSubmit">BOMBA DE ÁGUA</button>
                <?php
                    if(isset($_POST['irrigationSubmit'])){
                        $control = $irrObject->create();
                    }
                ?>
            </form>
        </div>
        <?php  if($control){ ?>
            <span class="avisoIrrigador">Irrigador Ligado</span>
            <?php }
                else{ ?>
                    <span class="avisoIrrigador">Irrigador Desligado</span>
                <?php } ?>
        <div class="clearfix"></div>
        <br/>
        <div class="blocoCultura">
            <span>Tipo de cultura: <?php echo $item[0]['tipoCultura']; ?></span>
        </div>
        <div class="blocoArea">
            <span>Area: <?php echo $item[0]['area']; ?> hectares</span>
        </div>
        <div class="blocoXcoord">
            <span>X: <strong><?php echo $item[0]['coorX'];?></strong></span>
            <input id="lat" value="<?php echo $item[0]['coorX']; ?>" type="hidden"/>
            <input id="lon" value='<?php echo $item[0]['coorY']; ?>' type="hidden"/>
        </div>
        <div class="blocoYcoord">
            <span>Y: <strong><?php echo $item[0]['coorY']; ?></strong></span>
        </div>
        <br/>
        <?php
            $temperatura = $info[0]['temperatura'];
            $umidade = $info[0]['umidade'];
            $progTemp = '';
            $progUmi = '';

            if ($temperatura >= 30){
              $progTemp = 'progress-bar-danger';
            }
            else if ($temperatura < 30){
              $progTemp = 'progress-bar-danger';
            }
            else if ($temperatura <= 18){
              $progTemp = 'progress-bar-warning';
            }
         ?>
        <div class="nivelUmidade">
            <h2>NIVEL DE UMIDADE</h2>
            <!-- BARRA DE UMIDADE -->
            <div class='content'>
              <div class="progress">
                    <div class="progress-bar progress-bar-striped active <?php echo $progUmi; ?>" role="progressbar" aria-valuenow="<?php echo $umidade * 10; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $umidade * 10; ?>%">
                        <span><?php
                            if($info[0]['umidade'] < 6.5){ echo "seco"; $progUmi = 'progress-bar-warning';}
                            else if($info[0]['umidade'] > 8.0) {echo "úmido"; $progUmi = 'progress-bar-danger';}
                            else{echo "normal";} ?></span>
                    </div>
              </div>
            </div>
        <div class="grauTemperatura">
            <h2>TEMPERATURA</h2>
            <!-- BARRA DE TEMPERATURA -->
            <div class='content' >
              <div class="progress">
                    <div class="progress-bar progress-bar-striped active <?php echo $progTemp; ?>" role="progressbar" aria-valuenow="<?php echo $temperatura; ?>" aria-valuemin="0" aria-valuemax="48" style="width: <?php echo $temperatura *2.3; ?>%">
                        <span><?php echo $temperatura; ?> ºC</span>
                    </div>
              </div>
            </div>
        </div>
        <div class="">
        <h2>CONDIÇÕES CLIMÁTICAS</h2>
          <spam id="tempoAgora"></spam>
        </div>

    </div>
    <div class="clearfix"></div>
    <br/>
</div>
<!--<div class="detalhesFinais">
    <p>A temperatura do dia no local vale <span id="tempDia"></span>, com possibilidade de <span id="previsaoTempo"></span>.</p>
</div>-->
