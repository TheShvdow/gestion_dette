<?php

namespace Src\Core\Errors;

use Src\Core\Controllers\Controller;

class ErrorControlle extends Controller
{
    private $viewsPath;

    public function __construct($viewsPath = 'Errors/')
    {
        $this->viewsPath = $viewsPath;
    }

    public function loadView($code)
    {
        switch ($code) {
            case HttpCode::NotFound:
                $view = $this->viewsPath . '404';
                break;
            case HttpCode::Forbidden:
                $view = $this->viewsPath . '403';
                break;
            default:
                $view = $this->viewsPath . 'default.php';
                break;
        }
        $this->renderView($view);
    }
}
