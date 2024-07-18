<?php
namespace Src\Core\Auth;

interface AuthorizeInterface {
    public function saveUser($email, $password);
    public function getUserLogged();
    public function isLogged();
    public function hasRole($role);
    public function logout();
}
