<?php

namespace Database;

use PDO;
use PDOException;

class Db {
    public static function connect($host, $dbname, $user, $password){
        try
        {
            return new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        }catch (PDOException $e)
        {
            $e->getMessage();
            die();
        }
    }
}
