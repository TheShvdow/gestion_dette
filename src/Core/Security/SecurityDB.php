<?php
namespace Src\Core\Security;

use \PDO;

class SecurityDB
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUser(int $userId): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM Users WHERE id = :id');
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}
