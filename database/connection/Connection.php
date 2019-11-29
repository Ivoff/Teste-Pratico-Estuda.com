<?php

namespace Database;

use PDO;
use PDOException;

class Connection {
    public static function connect($host, $dbname, $user, $password){
        try
        {
            $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $con->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
            return $con;
        }catch (PDOException $e)
        {
            $e->getMessage();
            die();
        }
    }
}
