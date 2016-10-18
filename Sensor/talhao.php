<?php

require_once 'config.php';

$obj = new TalhaoController();

if(isset($_POST['teste'])){
    echo $_POST['teste'];
}

?>

