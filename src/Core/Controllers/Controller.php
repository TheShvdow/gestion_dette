<?php

namespace Src\Core\Controllers;

use Src\Core\Auth\Authorize;
use Src\Core\Sessions\Session;
use Src\Core\Validators\Validator;
use Src\Core\Files\Files;

abstract class Controller implements ControllerInterface {
    protected $session;
    protected $authorize;
    protected $file;
    protected $validator;

    public function __construct()
    {
        $this->session = new Session();
        $this->authorize = new Authorize();
        $this->file = new Files(ROOT . 'public/uploads');
        $this->validator = new Validator();
    }

    public function renderView(string $view, array $data = [])
    {
        // Extraire les données pour les rendre disponibles dans la vue.
        extract($data);

        // Inclure le fichier de vue.
        $viewPath = ROOT . 'Views/' . $view . '.html.php';

        if (file_exists($viewPath)) {
            include_once $viewPath;
        } else {
            throw new \Exception("La vue {$view} n'existe pas.");
        }
    }
    
    public function redirect(string $url)
    {
        header("Location: {$url}");
        exit;
    }

    public function handleFileUpload()
    {
        $photo = null;

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $photoTmpPath = $_FILES['photo']['tmp_name'];
            $photoName = $_FILES['photo']['name'];
            $uploadPath = ROOT . 'public/uploads/' . $photoName;

            if (!file_exists('uploads')) {
                mkdir('uploads', 0777, true);
            }

            if (move_uploaded_file($photoTmpPath, $uploadPath)) {
                $photo = $photoName;
            } else {
                echo "Error moving the uploaded file.";
            }
        }

        return $photo;
    }

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function toJson($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public function fromJson()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
}
