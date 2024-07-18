<?php

namespace Src\Core\Files;

class Files
{
    protected $imagesType = ['image/jpeg', 'image/png', 'image/gif'];
    protected $dir;

    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    public function load($file)
    {
        if (in_array($file['type'], $this->imagesType)) {
            $uploadPath = $this->dir . '/' . basename($file['name']);
            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                return $uploadPath;
            } else {
                throw new \Exception("Failed to move uploaded file.");
            }
        } else {
            throw new \Exception("Unsupported file type.");
        }
    }
}
