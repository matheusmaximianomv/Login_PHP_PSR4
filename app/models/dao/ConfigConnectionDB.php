<?php
namespace App\Models\BD;

class ConfigConnectionDB {

    private static $configConnectionDB;
    private $connection;

    private function __construct($host, $name, $user, $password) {
        try {
            $this->connection = new \PDO(
                "mysql:host=$host;dbname=$name;charset=utf8",
                $user,
                $password
            );

            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function getInstance($host, $name, $user, $password) {
        if (!isset(self::$configConnectionDB)) {
            self::$configConnectionDB = new ConfigConnectionDB($host, $name, $user, $password);
        }

        return self::$configConnectionDB;
    }

    public function getConnection() : \PDO {
        return $this->connection;
    }
}