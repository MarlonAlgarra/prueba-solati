<?php
require_once(dirname(__FILE__) . '/../config.php');

$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

class Database
{
    private static $instance;
    private $connection;


    private function __construct()
    {
        global $dsn;
        global $user;
        global $password;
        // Configura la conexión a la base de datos
        $this->connection =new PDO($dsn, $user, $password); 
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

?>