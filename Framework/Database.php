<?php

namespace Framework;

use PDO;
use PDOException;
use Exception;

class Database
{
    public $connection;

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
        try {
            $this->connection = new PDO($dsn, $config["username"], $config["password"]);
        } catch (PDOException $error) {
            throw new Exception("Database connetion failed: {$error->getMessage()}");
        }
    }

    public function query($query, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $error) {
            throw new Exception("Query failed to execute: {$error->getMessage()}");
        }
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}