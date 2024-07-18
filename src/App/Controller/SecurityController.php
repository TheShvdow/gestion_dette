<?php
namespace Src\App\Controller;

use Src\Core\Sessions\Session;
use Src\Core\Controllers\Controller;

class SecurityController extends Controller {
    public function showLoginForm()
    {
        $this->renderView('Connexion/connexion');
    }
    
    public function login()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        var_dump($email, $password);

        if ($this->authorize->saveUser($email, $password)) {
            Session::set('user', $email);
            $this->redirect('Dettes/suivieEtEnregistrer');
        } else {
            $this->redirect('/');
            echo 'echec de la connexion';
        }
    }

    public function logout()
    {
        $this->authorize->logout();
        Session::close();
        $this->redirect('/');
    }
}