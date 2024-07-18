<?php


namespace Src\Core\Database;

use PDO;

final class MysqlDatabase
{
    private $pdo;

    public function __construct($connection, $host,$port,$database, $username, $password)
    {
        $dsn = "{$connection}:host={$host};port={$port};dbname={$database};";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function prepare(string $sql, array $data, string $entityName = null, bool $single = false)
    {
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        if ($entityName) 
         $stmt->setFetchMode(PDO::FETCH_CLASS, $entityName);
        if ($single) {
            return $stmt->fetch();
        }
        return $stmt->fetchAll();
    }

    public function query(string $sql, string $entityName, bool $single = false)
    {
        $stmt = $this->pdo->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $entityName);
        if ($single) {
            return $stmt->fetch();
        }
        return $stmt->fetchAll();
    }
}
