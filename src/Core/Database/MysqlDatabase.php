<?php


namespace Src\Core\Database;

use PDO;
use Symfony\Component\Yaml\Yaml;



final class MysqlDatabase
{
    private $pdo;
    //$connection, $host,$port,$database, $username, $password
    public function __construct( )
    {
        $yaml = Yaml::parseFile('/var/www/gestion_dette/config.yaml');
        $dsn =  $yaml['DB_DSN'];
        $username = $yaml['DB_USER'];
        $password = $yaml['DB_PASS'];
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
