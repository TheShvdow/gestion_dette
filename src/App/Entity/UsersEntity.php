<?php
namespace Src\App\Entity;

use Src\Core\Entity\Entity;

class UsersEntity extends Entity
{
    protected $table = 'Users';

    private string $Id_user;
    private string $role;
    private string $email;
    private string $password;
    private int $clientID;
}