<?php

namespace App\Lib;

use PDO;
use PDOException;
use Exception;

class Conexao{

    private $conectando;

    public function __consturct(){}

    public static function getConnection()
    {

        $pdoconfig = (DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME);
        return $pdo = new PDO($pdoconfig, DB_USER, DB_PASSWORD);
    }
}

?>