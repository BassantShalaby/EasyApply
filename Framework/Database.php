<?php
namespace Framework;
use PDO;
use PDOException;
use Exception;
class Database
{
    public $connection;

    // Constructor for Database class

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->connection = new PDO($dsn, $config["username"], $config["password"]);
            echo 'connected';
        } catch (PDOException $error) {
            throw new Exception("Database connetion failed: {$error->getMessage()}");
        }
    }
}