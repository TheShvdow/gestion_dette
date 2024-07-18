<?php

namespace Src\Core\Controllers;

interface ControllerInterface {
    public function renderView(string $view, array $data = []);
    public function redirect(string $url);
    public function handleFileUpload();
    public function hashPassword($password);
    public function toJson($data);
    public function fromJson();
}
