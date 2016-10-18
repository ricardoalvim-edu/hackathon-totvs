<?php

class ConnectDB {

    public static function conectaDB() {
        try {
            return  new PDO("mysql:host=".SERVER.";dbname=".DBNAME."", USER, PASS);
        }
        
        catch (PDOException $e) {
            echo "<pre>";
            print_r($e->getMessage());
        }
    }

    public static function disconectaDB($connection) {
        unset($connection);
    }
}

?>

