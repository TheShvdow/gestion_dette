<?php

namespace Src\App\Models;


use Src\Core\Model\Model;

class RoleModel extends Model{
    protected $table = 'Role';
    
    public function __construct($database) {
        parent::__construct($database);
    }
}