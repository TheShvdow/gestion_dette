<?php
namespace Src\Core\Auth;

use Src\App\App;
use Src\Core\Sessions\Session;

class Authorize implements AuthorizeInterface {
    private $users = [];
    private $loggedInUser = null;

    public function __construct() {
    }

    public function saveUser($email, $password) {
        if (isset($this->users[$email]) && password_verify($password, $this->users[$email]['password'])) {
            $this->loggedInUser = $email;
            Session::set('Utilisateur', $email);
            return true;
        }
        return false;
    }

    public function getUserLogged() {
        return $this->loggedInUser;
    }

    public function isLogged() {
        return Session::isset('Utilisateur');
    }

    public function hasRole($role) {
        $email = Session::get('Utilisateur');
        if ($email !== null && isset($this->users[$email])) {
            return in_array($role, $this->users[$email]['roles']);
        }
        return false;
    }

    public function logout() {
        Session::close();
        $this->loggedInUser = null;
    }
}
