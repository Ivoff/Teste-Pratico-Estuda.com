<?php

namespace Database;

use PDO;
use PDOException;

class Connection{

    private $host;
    private $dbname;
    private $username;
    private $password;
    private $con;

    public static function con()
    {
        try
        {
            $con = new PDO("mysql:host=localhost;dbname=sca", "admin", "123");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        }catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
}