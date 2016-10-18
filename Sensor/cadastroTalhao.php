<?php

require_once 'config.php';

?><html>
      <head>
        <title>Cadastrar Talhões</title>
        <link href="css/cadastroTalhao.css" rel="stylesheet" type="text/css"/>
      </head>
        <div class='cadastroTalhao'>
            <form action="" method="post">
                <div class="cadastroLinha"><label for="coordX">Longitude: <span>*</span> <br><input type="text" name="coordX" value=""></label></div>
                <div class="cadastroLinha"><label for="email">Latitude: <span>*</span> <br><input type="text" name="coordY" value=""></label></div>
                <div class="divisaoLinha"></div>
                <div class="cadastroLinha"><label for="nome">Nome Talhão: <span>*</span> <br><input type="text" name="nome" value=""></label></div>
                <div class="cadastroLinha"><label for="area">Área: <span>*</span> <br><input type="text" name="area" value=""></label></div>
                <div class="divisaoLinha"></div>
                <div class="cadastroLinha"><label for="cultura">Tipo de Cultura: <span>*</span> <br><input type="text" name="tipoCultura" value=""></label></div>
                <div class="cadastroLinha"><label for="envioImagemTalhao">Imagem: <br><input type="file" name="imagem" id="envioImagemTalhao">
                <div class="divisaoLinha"></div><br/>
                <input type="hidden" name="submitted" value="1">
                <div><input type="submit" id="formsubmitbutton" value="Enviar"></p>
            </form>
        </div>
    </body>
</html>
