<?php
namespace Src\App;

use Dotenv\Dotenv;
use Src\Core\Security\SecurityDB;
use Src\Core\Database\MysqlDatabase;

class App
{
    private static $instance = null;
    private $database;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new App();
        }
        return self::$instance;
    }

    public function getDatabase(){
        if ($this->database === null) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();

            $this->database =new MysqlDatabase($_ENV['DB_CONNECTION'],$_ENV['DB_HOST'],$_ENV['DB_PORT'],$_ENV['DB_DATABASE'],$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        }
        return $this->database;
    }

    public function getModel($model)
    {
        $modelClass = "Src\\App\\Model\\" . ucfirst($model);
        $newModel = new $modelClass($this->getDatabase());
        $newModel->setDatabase($this->getDatabase());
        
        return $newModel;
    }

    public static function getSecurityDB(): SecurityDB
    {
        $instance = self::getInstance();
        return new SecurityDB($instance->getDatabase()->getPdo());
    }
}
