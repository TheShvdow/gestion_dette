<?php
namespace Src\App\Model;

use Src\Core\Model\Model;

class UserModel extends Model {
    public function login($username, $password) {
        $sql = "SELECT * FROM Users WHERE email = :email";
        $user = $this->database->prepare($sql, ['email' => $username], \Src\App\Entity\UsersEntity::class, true);
        if ($user && password_verify($password, $user->password)) {
            return true;
        }
        return false;
    }

   /*  public function getRole($username) {
        $sql = "SELECT r.libelle FROM Users u JOIN Role r ON u.role_id = r.id WHERE u.email = :email";
        $result = $this->database->prepare($sql, ['email' => $username], \Src\App\Entity\UserEntity::class, true);
        return $result->libelle ?? null;
    } */
}
