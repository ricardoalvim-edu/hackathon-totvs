<?php

class GlobalFunction{
    public static function redirect($url) {
        $clean = explode(" ", $url);
        echo "<meta http-equiv='refresh' content='0;url={$clean[1]}'>";
    }
}

?>